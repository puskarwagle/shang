<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;
use App\Http\Controllers\ExploreTechsController;
use App\Http\Controllers\HeaderProductsController;
use App\Http\Controllers\HeaderServicesController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\LoginController;

// Welcome with HomeController class
Route::get('/', [HomeController::class, 'layout']);

//Route::get('/info', [HomeController::class, 'content']);

Route::get('/info', function () {
  return view('contents.informatics');
});

// These are routes through homecontroller
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/dataCenterServices', [HomeController::class, 'dataCenterServices'])->name('dataCenterServices');
Route::get('/internship', [HomeController::class, 'internship'])->name('internship');
Route::get('/mission', [HomeController::class, 'mission'])->name('mission');
Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//pages routes

Route::get('/login', function () {
  return view('auth.login');
})->name('login.form');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');
Route::get('/allusers', [LoginController::class, 'showUsers']);


//Route::prefix('cms')->middleware(['auth'])->group(function () {
// these are my service section routes
  Route::get('/service', [ServicesController::class, 'index'])->name('service.index');
  Route::get('/service/create', [ServicesController::class, 'create'])->name('service.create');
  Route::post('/service', [ServicesController::class, 'store'])->name('service.store');
  Route::delete('/service/{id}', [ServicesController::class, 'destroy'])->name('service.destroy');
  Route::put('/service/{id}', [ServicesController::class, 'update'])->name('service.update');
// these are my recentWorks section routes
  Route::get('/recentWorks', [RecentWorksController::class, 'index'])->name('recentWorks.index');
  Route::get('/recentWorks/create', [RecentWorksController::class, 'create'])->name('recentWorks.create');
  Route::post('/recentWorks', [RecentWorksController::class, 'store'])->name('recentWorks.store');
  Route::delete('/recentWorks/{id}', [RecentWorksController::class, 'destroy'])->name('recentWorks.destroy');
  Route::put('/recentWorks/{id}', [RecentWorksController::class, 'update'])->name('recentWorks.update');
// these are my overview section services
  Route::get('/exploreTechs', [exploreTechsController::class, 'index'])->name('exploreTechs.index');
  Route::get('/exploreTechs/create', [exploreTechsController::class, 'create'])->name('exploreTechs.create');
  Route::post('/exploreTechs', [exploreTechsController::class, 'store'])->name('exploreTechs.store');
  Route::delete('/exploreTechs/{id}', [exploreTechsController::class, 'destroy'])->name('exploreTechs.destroy');
  Route::put('/exploreTechs/{id}', [exploreTechsController::class, 'update'])->name('exploreTechs.update');
// these are my headerMain Products links
  Route::get('/headerProducts', [headerProductsController::class, 'index'])->name('headerProducts.index');
  Route::get('/headerProducts/create', [headerProductsController::class, 'create'])->name('headerProducts.create');
  Route::post('/headerProducts', [headerProductsController::class, 'store'])->name('headerProducts.store');
  Route::delete('/headerProducts/{id}', [headerProductsController::class, 'destroy'])->name('headerProducts.destroy');
  Route::put('/headerProducts/{id}', [headerProductsController::class, 'update'])->name('headerProducts.update');
// these are my headerMain Services links
  Route::get('/headerServices', [headerServicesController::class, 'index'])->name('headerServices.index');
  Route::get('/headerServices/create', [headerServicesController::class, 'create'])->name('headerServices.create');
  Route::post('/headerServices', [headerServicesController::class, 'store'])->name('headerServices.store');
  Route::delete('/headerServices/{id}', [headerServicesController::class, 'destroy'])->name('headerServices.destroy');
  Route::put('/headerServices/{id}', [headerServicesController::class, 'update'])->name('headerServices.update');
// these are my overview routes 
  Route::get('/overviews', [OverviewController::class, 'index'])->name('overviews.index');
  Route::get('/overviews/create', [OverviewController::class, 'create'])->name('overviews.create');
  Route::post('/overviews', [OverviewController::class, 'store'])->name('overviews.store');
  Route::delete('/overviews/{id}', [OverviewController::class, 'destroy'])->name('overviews.destroy');
  Route::put('/overviews/{id}', [OverviewController::class, 'update'])->name('overviews.update');
// these are my ourclients routes
  Route::get('/ourClients', [OurClientController::class, 'index'])->name('ourClients.index');
  Route::get('/ourClients/create', [OurClientController::class, 'create'])->name('ourClients.create');
  Route::post('/ourClients', [OurClientController::class, 'store'])->name('ourClients.store');
  Route::delete('/ourClients/{id}', [OurClientController::class, 'destroy'])->name('ourClients.destroy');
  Route::put('/ourClients/{id}', [OurClientController::class, 'update'])->name('ourClients.update');
  //});

