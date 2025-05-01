<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

// Route untuk halaman depan
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// LOGIN
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

// REGISTER
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

// LUPA PASSWORD 
Route::get('password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');


Route::post('logout', function () { Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // User Management Routes
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Role Management Routes
    Route::resource('roles', RoleController::class)->except(['show']);
    // Permission Management Routes
    Route::resource('permissions', PermissionController::class);

});

// DASHBOARD
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');