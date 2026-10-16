<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Kalau buka halaman utama, langsung arahkan ke /books
Route::redirect('/', '/books');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');