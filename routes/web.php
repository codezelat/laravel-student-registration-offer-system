<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

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
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/student/{id}', [AdminController::class, 'view'])->name('admin.student.view');
Route::get('/admin/student/{id}/edit', [AdminController::class, 'edit'])->name('admin.student.edit');
Route::put('/admin/student/{id}', [AdminController::class, 'update'])->name('admin.student.update');
Route::delete('/admin/student/{id}', [AdminController::class, 'destroy'])->name('admin.student.destroy');
