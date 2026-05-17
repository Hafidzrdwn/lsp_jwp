<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

// redirect home url to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// AUTH ROUTE
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// APP ROUTE
Route::middleware(['auth'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MANAJEMEN PEGAWAI
    Route::resource('employees', EmployeeController::class);
});
