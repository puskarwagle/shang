<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

// Route::get('/', function () {
    // return view('welcome');
   // return view('welcome', compact('services'));
// });
// Route::get('/', 'ServiceController@welcome');

Route::get('/', [ServiceController::class, 'welcome']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('auth.login');
});

//these are my service section routes
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/display', [ServiceController::class, 'display'])->name('service.display');

Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');