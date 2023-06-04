<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers // CMS
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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::get('/service', [ServicesController::class, 'apiindex']);
Route::get('/recentWorks', [RecentWorksController::class, 'apiindex']);
Route::get('/exploreTechs', [exploreTechsController::class, 'apiindex']);
Route::get('/headerProducts', [headerProductsController::class, 'apiindex']);
Route::get('/headerServices', [headerServicesController::class, 'apiindex']);
Route::get('/overviews', [OverviewController::class, 'apiindex']);
Route::get('/ourClients', [OurClientController::class, 'apiindex']);
Route::get('/cards', [CardController::class, 'apiindex']);