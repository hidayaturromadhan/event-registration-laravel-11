<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;


// Pengunjung Routes
Route::prefix('/')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
});


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Autentikasi login dan Logout Admin
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'autentikasi']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Event Routes
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');
   
    // Peserta Routes
    Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::post('/peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('/peserta/delete/{id}', [PesertaController::class, 'delete'])->name('peserta.delete');
});
