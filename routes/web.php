<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'submitConsultation'])->name('consultation.submit');
Route::post('/kontak', [KontakController::class, 'submitConsultation'])->name('consultation.submit');
