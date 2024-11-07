<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Dashboard\DashboardPage;
use App\Http\Livewire\User\Events\MyapplicationPage;
use App\Http\Livewire\User\Events\ApplicationShow;




Route::get('/dashboard', DashboardPage::class)->middleware('can:user:dashboard:view')->name('dashboard');
Route::get('/application', MyapplicationPage::class)->middleware('can:user:applications:view')->name('application');
Route::get('/application/{application}', ApplicationShow::class)->middleware('can:user:applications:view')->name('application.show');

