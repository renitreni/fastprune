<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mostafaznv\PdfOptimizer\PdfOptimizer as PdfOptimizerTool;

class PdfOptimizer extends Component
{
    use WithFileUploads;

    public $file;
    public $downloadUrl;

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|mimes:pdf|max:204800', // 200MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.pdf-optimizer')
            ->layout('components.layouts.app');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|file|mimes:pdf|max:204800', // 200MB Max
        ]);

        $fileName = time() . '.pdf';
        $optimizedPath = storage_path('app/public/' . $fileName);

        $optimizer = new PdfOptimizerTool();
        $optimizer->optimize($this->file->getRealPath(), $optimizedPath);

        $this->downloadUrl = Storage::disk('public')->url($fileName);

        $this->reset('file');
    }
}