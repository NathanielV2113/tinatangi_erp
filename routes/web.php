<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/otp', function () {
    return view('auth.otp');
})->name('otp');

Route::get('/admin', [AuthController::class, 'home']
)->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin');

Route::controller(AuthController::class)->group(function (){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.auth');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.auth');
    Route::post('logout', 'destroy')->name('logout');

});