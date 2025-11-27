<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

// Landing Page - Diploma Selection (New Home)
Route::get('/', [RegistrationController::class, 'selectDiploma'])->name('select.diploma');

// Eligibility Check Page (Formerly Landing)
Route::get('/check-eligibility', [RegistrationController::class, 'landing'])->name('landing');

// Registration Form Page
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// Success Page (kept for backward compatibility)
Route::get('/registration-success', [RegistrationController::class, 'success'])->name('registration.success');

// Payment Routes
Route::get('/payment/options', [PaymentController::class, 'paymentOptions'])->name('payment.options');
Route::get('/payment/upload-slip', [PaymentController::class, 'showUploadSlip'])->name('payment.upload-slip');
Route::post('/payment/store-slip', [PaymentController::class, 'storeSlip'])->name('payment.store-slip');
Route::post('/payment/payhere', [PaymentController::class, 'payhere'])->name('payment.payhere');
Route::get('/payment/payhere-success', [PaymentController::class, 'payhereSuccess'])->name('payment.payhere-success');
Route::post('/payment/notify', [PaymentController::class, 'payhereNotify'])->name('payment.notify');
Route::get('/payment/success', function () {
    return redirect()->route('landing');
})->name('payment.success');

// Admin Routes
Route::get('/superadminloginsitc', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/superadminloginsitc', [AdminController::class, 'login'])->name('admin.authenticate');
Route::get('/sitc-admin-area/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/sitc-admin-area/export', [AdminController::class, 'export'])->name('admin.export');
Route::post('/sitc-admin-area/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/sitc-admin-area/student/{id}', [AdminController::class, 'view'])->name('admin.student.view');
Route::get('/sitc-admin-area/student/{id}/edit', [AdminController::class, 'edit'])->name('admin.student.edit');
Route::put('/sitc-admin-area/student/{id}', [AdminController::class, 'update'])->name('admin.student.update');
Route::delete('/sitc-admin-area/student/{id}', [AdminController::class, 'destroy'])->name('admin.student.destroy');
