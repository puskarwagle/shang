<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;
use App\Http\Controllers\ExploreTechsController;
use App\Http\Controllers\LoginController;

// Welcome with HomeController class
Route::get('/', [HomeController::class, 'layout']);
Route::get('/sections', [HomeController::class, 'sections']);

// this is the dashnboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/login', function () {
  return view('auth.login');
})->name('login.form');

// Route::get('/cms', function () {
//   return view('auth.login');
// })->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');
Route::get('/allusers', [LoginController::class, 'showUsers']);


//Route::prefix('cms')->middleware(['auth'])->group(function () {
// these are my service section routes
  Route::get('/service', [ServicesController::class, 'index'])->name('service.index');
  Route::get('/service/create', [ServicesController::class, 'create'])->name('service.create');
  Route::post('/service', [ServicesController::class, 'store'])->name('service.store');
  Route::get('/service/display', [ServicesController::class, 'display'])->name('service.display');
  Route::delete('/service/{id}', [ServicesController::class, 'destroy'])->name('service.destroy');
  Route::put('/service/{id}', [ServicesController::class, 'update'])->name('service.update');
// these are my recentWorks section routes
  Route::get('/recentWorks', [RecentWorksController::class, 'index'])->name('recentWorks.index');
  Route::get('/recentWorks/create', [RecentWorksController::class, 'create'])->name('recentWorks.create');
  Route::post('/recentWorks', [RecentWorksController::class, 'store'])->name('recentWorks.store');
  Route::get('/recentWorks/display', [RecentWorksController::class, 'display'])->name('recentWorks.display');
  Route::delete('/recentWorks/{id}', [RecentWorksController::class, 'destroy'])->name('recentWorks.destroy');
  Route::put('/recentWorks/{id}', [RecentWorksController::class, 'update'])->name('recentWorks.update');
// these are my overview section services
  Route::get('/exploreTechs', [exploreTechsController::class, 'index'])->name('exploreTechs.index');
  Route::get('/exploreTechs/create', [exploreTechsController::class, 'create'])->name('exploreTechs.create');
  Route::post('/exploreTechs', [exploreTechsController::class, 'store'])->name('exploreTechs.store');
  Route::get('/exploreTechs/display', [exploreTechsController::class, 'display'])->name('exploreTechs.display');
  Route::delete('/exploreTechs/{id}', [exploreTechsController::class, 'destroy'])->name('exploreTechs.destroy');
  Route::put('/exploreTechs/{id}', [exploreTechsController::class, 'update'])->name('exploreTechs.update');
//});


