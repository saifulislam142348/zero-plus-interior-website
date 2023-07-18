<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return 'Frontend will be appear here';
})->name('home');

Route::get('/login', function () {
    return redirect()->route('home');
});

Route::get('/register', function () {
    return redirect()->route('home');
});
