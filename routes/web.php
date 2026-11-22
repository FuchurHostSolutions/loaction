<?php

use App\Http\Controllers\Admin\AudienceController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CompetencyController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'submitConsultation'])
    ->middleware('throttle:5,1')
    ->name('consultation.submit');

/*
|--------------------------------------------------------------------------
| Custom Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Auth
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Consultations (CRM Leads)
        Route::get('/consultations', [AdminConsultationController::class, 'index'])->name('consultations.index');
        Route::get('/consultations/{id}', [AdminConsultationController::class, 'show'])->name('consultations.show');
        Route::patch('/consultations/{id}/status', [AdminConsultationController::class, 'updateStatus'])->name('consultations.updateStatus');
        Route::delete('/consultations/{id}', [AdminConsultationController::class, 'destroy'])->name('consultations.destroy');

        // Master Data CRUD
        Route::resource('services', ServiceController::class);
        Route::resource('audiences', AudienceController::class);
        Route::resource('competencies', CompetencyController::class);
        Route::resource('testimonials', TestimonialController::class);

        // Activity & System Logs
        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
        Route::post('/logs/purge', [LogController::class, 'purgeActivity'])->name('logs.purge');
        Route::post('/logs/clear-system', [LogController::class, 'clearSystemLog'])->name('logs.clearSystem');
    });
});
