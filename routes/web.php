<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// My MyHomeController
use App\Http\Controllers\MyHomeController;
// CMS
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;
use App\Http\Controllers\ExploreTechsController;
use App\Http\Controllers\HeaderProductsController;
use App\Http\Controllers\HeaderServicesController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\CardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome with HomeController class
Route::get('/', [MyHomeController::class, 'welcome']);

// Came default with the app
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [MyHomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// These are routes through homecontroller
Route::get('/about', [MyHomeController::class, 'about'])->name('about');
Route::get('/dataCenterServices', [MyHomeController::class, 'dataCenterServices'])->name('dataCenterServices');
Route::get('/internship', [MyHomeController::class, 'internship'])->name('internship');
Route::get('/mission', [MyHomeController::class, 'mission'])->name('mission');
Route::get('/products', [MyHomeController::class, 'products'])->name('products');


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
  // these are my cards routes
    Route::get('/cards', [CardController::class, 'index'])->name('cards.index');
    Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::delete('/cards/{id}', [CardController::class, 'destroy'])->name('cards.destroy');
    Route::put('/cards/{id}', [CardController::class, 'update'])->name('cards.update');
  //});


