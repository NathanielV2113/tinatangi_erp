<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/otp', function () {
    return view('auth.otp');
})->name('otp');