<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// Landing Page - Question Page
Route::get('/', [RegistrationController::class, 'landing'])->name('landing');

// Diploma Selection Page
Route::get('/select-diploma', [RegistrationController::class, 'selectDiploma'])->name('select.diploma');

// Registration Form Page
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// Success Page
Route::get('/registration-success', [RegistrationController::class, 'success'])->name('registration.success');
