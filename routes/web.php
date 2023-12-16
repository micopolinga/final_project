<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DancerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StyleController;
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

Route::get('/', [SiteController::class, 'welcome']);


Route::get('/dancer', [DancerController::class, 'dancer'])->name('dancer');
Route::get('/dancer/create', [DancerController::class,'create']);
Route::post('/dancer/create',[DancerController::class,'store']);
Route::get('/dancer/{dancer}', [DancerController::class, 'edit']);
Route::post('/dancer/{dancer}', [DancerController::class, 'update']);
Route::delete('/dancer/delete/{dancer}', [DancerController::class, 'delete']);






Route::get('/style', [StyleController::class, 'style'])->name('style');
Route::get('/style/create', [StyleController::class,'create']);
Route::post('/style/create',[StyleController::class,'store']);
Route::get('/style/{style}', [StyleController::class, 'edit']);
Route::post('/style/{style}', [StyleController::class, 'update']);
Route::delete('/style/delete/{style}', [StyleController::class, 'delete']);



Route::get('/event', [EventController::class, 'event'])->name('event');
Route::get('/event/create', [EventController::class,'create']);
Route::post('/event/create',[EventController::class,'store']);
Route::get('/event/{event}', [EventController::class, 'edit']);
Route::post('/event/{event}', [EventController::class, 'update']);
Route::delete('/event/delete/{event}', [EventController::class, 'delete']);







