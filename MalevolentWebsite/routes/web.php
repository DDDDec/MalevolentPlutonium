<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('homepage'); })->name('Homepage');

Route::get('/store', function () { return view('store'); })->name('Store');

Route::get('/login', function () { return view('login'); })->name('Login');
Route::get('/register', function () { return view('register'); })->name('Register');
Route::get('/forgot', function () { return view('forgot'); })->name('Forgot Password');
Route::get('/profile', function () { return view('profile'); })->name('Profile');
