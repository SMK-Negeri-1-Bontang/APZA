<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::get('/absen/create', [AbsenController::class, 'create'])->name('absen.create');
    Route::post('/absen', [AbsenController::class, 'store'])->name('absen.store');
    Route::get('/absen/{absen}', [AbsenController::class, 'show'])->name('absen.show');
    Route::get('/absen/{absen}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::patch('/absen/{absen}', [AbsenController::class, 'update'])->name('absen.update');
    Route::delete('/absen/{absen}', [AbsenController::class, 'destroy'])->name('absen.destroy');
});

require __DIR__.'/auth.php';
