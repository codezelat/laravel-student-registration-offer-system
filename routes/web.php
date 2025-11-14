<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;

// Landing Page - Question Page
Route::get('/', [RegistrationController::class, 'landing'])->name('landing');

// Diploma Selection Page
Route::get('/select-diploma', [RegistrationController::class, 'selectDiploma'])->name('select.diploma');

// Registration Form Page
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// Success Page (kept for backward compatibility)
Route::get('/registration-success', [RegistrationController::class, 'success'])->name('registration.success');

// Payment Routes
Route::get('/payment/options/{student}', [PaymentController::class, 'paymentOptions'])->name('payment.options');
Route::get('/payment/upload-slip/{student}', [PaymentController::class, 'showUploadSlip'])->name('payment.upload-slip');
Route::post('/payment/store-slip', [PaymentController::class, 'storeSlip'])->name('payment.store-slip');
Route::post('/payment/payhere', [PaymentController::class, 'payhere'])->name('payment.payhere');
Route::get('/payment/payhere-success/{student}', [PaymentController::class, 'payhereSuccess'])->name('payment.payhere-success');
Route::post('/payment/notify', [PaymentController::class, 'payhereNotify'])->name('payment.notify');
Route::get('/payment/success', function () {
    return redirect()->route('landing');
})->name('payment.success');
