<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DancerApiController;
use App\Http\Controllers\StyleApiController;
use App\Http\Controllers\EventApiController;
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

Route::get('/dancers', [DancerApiController::class, 'index']);
Route::get('/dancers/{dancer}', [DancerApiController::class, 'view']);
Route::post('/dancers', [DancerApiController::class, 'store']);
Route::patch('/dancers/{dancer}',[DancerApiController::class, 'update']);
Route::put('/dancers/{dancer}',[DancerApiController::class, 'update']);
Route::delete('/dancers/{dancer}', [DancerApiController::class, 'destroy']);

Route::get('/styles', [StyleApiController::class, 'index']);
Route::get('/styles/{style}', [StyleApiController::class, 'view']);
Route::post('/styles', [StyleApiController::class, 'store']);
Route::patch('/styles/{style}',[StyleApiController::class, 'update']);
Route::put('/styles/{style}',[StyleApiController::class, 'update']);
Route::delete('/styles/{style}', [StyleApiController::class, 'destroy']);


Route::get('/events', [EventApiController::class, 'index']);
Route::get('/events/{event}', [EventApiController::class, 'view']);
Route::post('/events', [EventApiController::class, 'store']);
Route::patch('/events/{event}',[EventApiController::class, 'update']);
Route::put('/events/{event}',[EventApiController::class, 'update']);
Route::delete('/events/{event}', [EventApiController::class, 'destroy']);
