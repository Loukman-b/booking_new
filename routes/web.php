<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Termwind\Components\Raw;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/booking/start/{package}', [App\Http\Controllers\BookingController::class, 'start'])->name('booking.start');
Route::get('/booking/download/{booking}', [App\Http\Controllers\BookingController::class, 'download'])->name('booking.download');

require __DIR__.'/settings.php';
