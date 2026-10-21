<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])
->middleware('throttle:3,1')
->name('login.submit');
Route::middleware('jwt.cookie')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::redirect('/', '/login');

Route::middleware('jwt.cookie')->group(function () {
    Route::resource('contacts', ContactController::class)
        ->except(['show']);
});

