<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageOptimizer extends Component
{
    use WithFileUploads;

    public $image;
    public $downloadUrl;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:204800', // 200MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.image-optimizer')
            ->layout('components.layouts.app');
    }
    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:204800', // 200MB Max
        ]);

        $filePath = $this->image->getRealPath();
        $image = ImageManager::imagick()->read($filePath);

        // Get original file size
        $originalSize = filesize($filePath);

        // Target size (20% less)
        $targetSize = $originalSize * 0.8;

        // Start with quality 90 and reduce until under target
        $quality = 90;
        $encoded = $image->encodeByExtension('jpg', $quality);

        while (strlen($encoded) > $targetSize && $quality > 10) {
            $quality -= 5;
            $encoded = $image->encodeByExtension('jpg', $quality);
        }

        $fileName = time() . '.jpg';

        // Clean up storage before saving new file
        $this->cleanupStorage();

        Storage::disk('public')->put($fileName, $encoded);

        $this->downloadUrl = Storage::disk('public')->url($fileName);

        // Clean up the temporary file
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $this->reset('image');
    }

    /**
     * Clean up storage to keep it under 1GB
     */
    private function cleanupStorage()
    {
        $disk = Storage::disk('public');
        $maxSizeBytes = 1024 * 1024 * 1024; // 1GB in bytes

        // Get all files with their details
        $files = collect($disk->allFiles())
            ->filter(function ($file) use ($disk) {
                // Only process image files (optional - adjust extensions as needed)
                return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            })
            ->map(function ($file) use ($disk) {
                return [
                    'path' => $file,
                    'size' => $disk->size($file),
                    'timestamp' => $disk->lastModified($file)
                ];
            })
            ->sortBy('timestamp'); // Sort by oldest first

        // Calculate total size
        $totalSize = $files->sum('size');

        // If under limit, no cleanup needed
        if ($totalSize < $maxSizeBytes) {
            return;
        }

        // Delete oldest files until we're under the limit
        $sizeToRemove = $totalSize - $maxSizeBytes;
        $removedSize = 0;

        foreach ($files as $file) {
            if ($removedSize >= $sizeToRemove) {
                break;
            }

            try {
                $disk->delete($file['path']);
                $removedSize += $file['size'];

                // Log the deletion (optional)
                Log::info("Deleted old file: {$file['path']} ({$this->formatBytes($file['size'])})");
            } catch (\Exception $e) {
                // Log error but continue with cleanup
                Log::error("Failed to delete file: {$file['path']} - " . $e->getMessage());
            }
        }

        // Log cleanup summary
        Log::info("Storage cleanup completed. Removed {$this->formatBytes($removedSize)} of data.");
    }

    /**
     * Format bytes into human readable format
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }
}