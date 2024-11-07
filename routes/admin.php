<?php

use App\Http\Livewire\Admin\Role\RolePage;
use App\Http\Livewire\Admin\User\UserPage;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Dashboard\DashboardPage;
use App\Http\Livewire\Admin\Events\EventsPage;
use App\Http\Livewire\Admin\Events\ApplicationPage;
use App\Http\Livewire\Admin\Events\ApplicationShow;
use App\Http\Livewire\Admin\Events\SelectedPage;
use App\Http\Livewire\Admin\Events\RejectedPage;
use App\Http\Livewire\Admin\Events\ViewapplicationPage;








Route::get('/users', UserPage::class)->middleware('can:admin:users:view')->name('users');
Route::get('/roles', RolePage::class)->middleware('can:admin:roles:view')->name('roles');

Route::get('/dashboard', DashboardPage::class)->middleware('can:admin:dashboard:view')->name('dashboard');

Route::get('/events', EventsPage::class)->middleware('can:admin:events:view')->name('events');

Route::get('/application', ApplicationPage::class)->middleware('can:admin:application:view')->name('application');

Route::get('/application/{application}', ApplicationShow::class)->middleware('can:admin:application:view')->name('application.show');

Route::get('/selected', SelectedPage::class)->middleware('can:admin:application:view')->name('selected');

Route::get('/rejected', RejectedPage::class)->middleware('can:admin:application:view')->name('rejected');


Route::get('/viewapplication/{event}', ViewapplicationPage::class)->middleware('can:admin:application:view')->name('viewapplication.show');





