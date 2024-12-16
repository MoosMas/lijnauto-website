<?php

use App\Http\Controllers\Api\v1\CarController;
use App\Http\Controllers\Api\v1\LogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->middleware('bearer.token')->group(function() {
    Route::apiResource('cars', CarController::class)->except('destroy');
    Route::apiResource('logs', LogController::class)->except(['destroy', 'update']);
});
