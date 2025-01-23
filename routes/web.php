<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\DashboardViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthViewController;

// Route::middleware('guest')->group(function () {
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('welcome');
//     Route::get('/login', [AuthViewController::class, 'login'])->name('login');
//     Route::get('/register', [AuthViewController::class, 'register'])->name('register');
// });

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome');
    Route::view('login', 'auth.login');
    Route::view('register', 'auth.register');
});

Route::middleware(['jwt.auth'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardViewController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::get('/dashboard/product', function () {
        return view('dashboard.products.index');
    })->name('products');
    
    Route::get('/dashboard/product/create', function () {
        return view('dashboard.products.create');
    })->name('create');
    
    Route::get('/dashboard/profile', function () {
        return view('dashboard.profile.index');
    })->name('profile');
});
