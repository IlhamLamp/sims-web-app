<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::middleware(['jwt.auth'])->group(function () {
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
