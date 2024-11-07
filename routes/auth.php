<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\StartupController;
use App\Http\Controllers\Mainpage;



Route::get('login', [LoginController::class, 'login_page'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

Route::get('login/startup', [StartupController::class, 'login_page'])->name('login.startup');
Route::get('login/startup/callback', [StartupController::class, 'authenticate'])->name('login.startup.callback');


Route::get('password/forgot', [LoginController::class, 'forgot_page'])->name('password.forgot');
Route::post('password/forgot', [LoginController::class, 'send_reset_link']);

Route::get('password/reset', [LoginController::class, 'reset_page'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'reset_password']);




