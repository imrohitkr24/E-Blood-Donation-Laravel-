<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/students', [StudentController::class, 'index']);

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Unified dashboard routing
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'donor') return redirect()->route('donor.dashboard');
        if ($user->role === 'recipient') return redirect()->route('recipient.dashboard');
        if ($user->role === 'admin') return redirect()->route('admin.dashboard');
        return view('dashboard');
    })->name('dashboard');

    // Donor routes
    Route::get('/donor/dashboard', [\App\Http\Controllers\DonorController::class, 'dashboard'])->name('donor.dashboard');
    Route::post('/donor/availability', [\App\Http\Controllers\DonorController::class, 'updateAvailability'])->name('donor.availability');

    // Recipient routes
    Route::get('/recipient/dashboard', [\App\Http\Controllers\RecipientController::class, 'dashboard'])->name('recipient.dashboard');
    Route::post('/recipient/request', [\App\Http\Controllers\RecipientController::class, 'createRequest'])->name('recipient.request');
    Route::get('/recipient/search', [\App\Http\Controllers\RecipientController::class, 'searchDonors'])->name('recipient.search');

    // Admin routes
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});