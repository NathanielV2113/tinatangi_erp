<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/otp', function () {
    return view('otp');
})->name('otp');