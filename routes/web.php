<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Mainpage;

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Admin\Upcomingeventdata\ExcelUploadComponent;
use App\Http\Livewire\Admin\Upcomingeventdata\Calendar;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/', 'login');

Route::get('/', [Mainpage::class, 'index'])->name('index');
Route::get('/calendardata', [Mainpage::class, 'calendardata'])->name('calendardata');


Route::get('home', function(){

    if(auth()->user()->can('admin:dashboard:view')){
      return redirect()->route('admin.dashboard');
    }

    elseif(auth()->user()->can('user:dashboard:view')){
      return redirect()->route('user.dashboard');
    }
});


Route::get('/startups', function(){
    return view('loginpage');
})->name('startups');


Route::get('/event/{event}', [Mainpage::class, 'show'])->name('event.show');

Route::get('/apply/{event}', [Mainpage::class, 'apply'])->name('apply.apply')->middleware('auth');

Route::post('/apply/{id}', [Mainpage::class, 'submitdata'])->name('submit_application')->middleware('auth');



Route::get('logout', [LoginController::class, 'logout']);

Route::get('storage/uploads/{file}', function($file){
  $url = Storage::disk('local')->response('/public/uploads/'.$file, Carbon::now()->addMinutes(5));
  return $url;
  // return redirect($url);
})->name('storage.upload');



// routes/web.php


// Route::get('/upload-excel', ExcelUploadComponent::class)->name('upload.excel');


