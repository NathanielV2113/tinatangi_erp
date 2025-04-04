<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/otp', function () {
    return view('auth.otp');
})->name('otp');

Route::controller(AuthController::class)->group(function (){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.auth');
});