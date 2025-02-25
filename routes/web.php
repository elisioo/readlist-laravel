<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Protect dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Protect profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Protect Readlist routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('readlist', ReadlistController::class)->only(['index', 'store', 'destroy', 'update']);
});


require __DIR__ . '/auth.php';