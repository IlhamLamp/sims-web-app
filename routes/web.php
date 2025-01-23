<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::middleware('jwt.auth')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::get('/dashboard/product', function () {
        return view('dashboard.products.index');
    });
    Route::get('/dashboard/product/create', function () {
        return view('dashboard.products.create');
    });
    Route::get('/dashboard/product/edit', function () {
        return view('dashboard.products.edit');
    });
});
