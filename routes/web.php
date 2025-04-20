<?php

use App\Http\Controllers\JurusanController;
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

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/register', [UserController::class, 'create'])->name('register');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::get('/absen/create', [AbsenController::class, 'create'])->name('absen.create');
    Route::post('/absen', [AbsenController::class, 'store'])->name('absen.store');
    Route::get('/absen/{absen}', [AbsenController::class, 'show'])->name('absen.show');
    Route::get('/absen/edit/{user_id}', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::patch('/absen/update/{user_id}', [AbsenController::class, 'update'])->name('absen.update');
    Route::delete('/absen/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::patch('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

require __DIR__.'/auth.php';
