<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login'); // Menampilkan file resources/views/auth/login.blade.php
})->name('login');
