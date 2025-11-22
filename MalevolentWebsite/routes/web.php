<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('homepage'); })->name('Homepage');

Route::get('/round', function () { return view('round'); })->name('Round Leaderboard');
Route::get('/server', function () { return view('server'); })->name('Server Leaderboards');
Route::get('/player', function () { return view('player'); })->name('Player Leaderboards');
Route::get('/search', function () { return view('search'); })->name('Player Seach');

Route::get('/tickets', function () { return view('tickets'); })->name('Tickets');
Route::get('/commands', function () { return view('commands'); })->name('Commands');
Route::get('/guides', function () { return view('guides'); })->name('Guides');

Route::get('/store', function () { return view('store'); })->name('Store');

Route::get('/login', function () { return view('login'); })->name('Login');
Route::get('/register', function () { return view('register'); })->name('Register');
Route::get('/forgot', function () { return view('forgot'); })->name('Forgot Password');
