<?php

use App\Http\Controllers\HomeController;
use App\Livewire\ImageOptimizer;
use App\Livewire\JsCssMinifier;
use App\Livewire\PdfOptimizer;
use App\Livewire\ZipCompressor;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/image', ImageOptimizer::class)->name('image');
Route::get('/zip', ZipCompressor::class)->name('zip');
Route::get('/pdf', PdfOptimizer::class)->name('pdf');
Route::get('/minify', JsCssMinifier::class)->name('minify');
