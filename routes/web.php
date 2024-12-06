<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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

