<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome');
    Route::view('/login', 'auth.login');
    Route::view('/register', 'auth.register');
});

Route::middleware(['jwt.auth'])->group(function () {
    // DASHBOARD
    Route::view('/dashboard', 'dashboard.index');
    Route::view('/dashboard/product', 'dashboard.products.index');
    Route::view('/dashboard/product/create', 'dashboard.products.create');
    Route::view('/dashboard/product/edit', 'dashboard.products.edit');
    
});
