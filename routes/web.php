<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;

// Welcome with HomeController class
Route::get('/', [HomeController::class, 'welcome']);


Route::get('/login', function () {
  return view('auth.login');
})->name('login');
Route::get('/cms', function () {
  return view('auth.login');
})->name('login');

Route::prefix('cms')->middleware(['auth'])->group(function () {
//these are my service section routes
  Route::get('/service', [ServicesController::class, 'index'])->name('service.index');
  Route::get('/service/create', [ServicesController::class, 'create'])->name('service.create');
  Route::post('/service', [ServicesController::class, 'store'])->name('service.store');
  Route::get('/service/display', [ServicesController::class, 'display'])->name('service.display');
  Route::delete('/service/{id}', [ServicesController::class, 'destroy'])->name('service.destroy');
  Route::put('/service/{id}', [ServicesController::class, 'update'])->name('service.update');

//these are my recentWorks section routes
  Route::get('/recentWorks', [RecentWorksController::class, 'index'])->name('recentWorks.index');
  Route::get('/recentWorks/create', [RecentWorksController::class, 'create'])->name('recentWorks.create');
  Route::post('/recentWorks', [RecentWorksController::class, 'store'])->name('recentWorks.store');
  Route::get('/recentWorks/display', [RecentWorksController::class, 'display'])->name('recentWorks.display');
  Route::delete('/recentWorks/{id}', [RecentWorksController::class, 'destroy'])->name('recentWorks.destroy');
  Route::put('/recentWorks/{id}', [RecentWorksController::class, 'update'])->name('recentWorks.update');
});

/*
Route::get('/', function () {
  return view('welcome');
  return view('welcome', compact('services'));
});
Route::get('/', 'ServiceController@welcome');
Route::get('/test', function () {
  return view('test');
});
*/

