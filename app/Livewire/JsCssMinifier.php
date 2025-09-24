<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use MatthiasMullie\Minify;

class JsCssMinifier extends Component
{
    use WithFileUploads;

    public $file;
    public $downloadUrl;
    public $error;

    public function updatedFile()
    {
        $this->error = null;
        
        $this->validate([
            'file' => 'required|file|mimes:js,css|max:204800', // 200MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.js-css-minifier')
            ->layout('components.layouts.app');
    }

    public function save()
    {
        try {
            $this->error = null;
            
            $this->validate([
                'file' => 'required|file|mimes:js,css|max:204800', // 200MB Max
            ]);

            $content = file_get_contents($this->file->getRealPath());
            $extension = $this->file->getClientOriginalExtension();
            
            // Determine file type and minify accordingly
            if (strtolower($extension) === 'css') {
                $minifier = new Minify\CSS($content);
            } elseif (strtolower($extension) === 'js') {
                $minifier = new Minify\JS($content);
            } else {
                throw new \Exception('Unsupported file type');
            }

            $minifiedContent = $minifier->minify();

            // Generate filename with original name prefix
            $originalName = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . '_minified_' . time() . '.' . $extension;

            Storage::disk('public')->put($fileName, $minifiedContent);

            $this->downloadUrl = Storage::disk('public')->url($fileName);

            $this->reset('file');
            
            session()->flash('success', 'File minified successfully!');
            
        } catch (\Exception $e) {
            $this->error = 'Error minifying file: ' . $e->getMessage();
        }
    }

    public function clearDownload()
    {
        $this->downloadUrl = null;
    }
}