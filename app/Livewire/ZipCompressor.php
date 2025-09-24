<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Zip;

class ZipCompressor extends Component
{
    use WithFileUploads;

    public $file;
    public $downloadUrl;

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|max:204800', // 200MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.zip-compressor')
            ->layout('components.layouts.app');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|file|max:204800', // 200MB Max
        ]);

        $fileName = time() . '.zip';
        $zipPath = storage_path('app/public/' . $fileName);

        $zip = Zip::create($zipPath);
        $zip->add($this->file->getRealPath(), $this->file->getClientOriginalName());
        $zip->close();

        $this->downloadUrl = Storage::disk('public')->url($fileName);

        $this->reset('file');
    }
}