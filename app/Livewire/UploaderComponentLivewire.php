<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploaderComponentLivewire extends Component
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
        Storage::disk('public')->put($fileName, $encoded);

        $this->downloadUrl = Storage::disk('public')->url($fileName);

        // Clean up the temporary file
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $this->reset('image');
    }

    public function render()
    {
        return view('livewire.uploader-component-livewire');
    }
}
