<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\TapController;
use App\Http\Middleware\ApiAuthentication;
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

Route::group(['prefix' => 'user'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::group(['middleware' => ApiAuthentication::class], function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::patch('/me', [AuthController::class, 'update']);
        Route::delete('/me', [AuthController::class, 'delete']);
        Route::delete('/token', [AuthController::class, 'deleteToken']);

        Route::group(['prefix' => 'tap'], function () {
            Route::post('/scan', [TapController::class, 'scan']);
            Route::get('/activate', [TapController::class, 'activate']);
        });

        Route::group(['prefix' => 'beer'], function () {
            Route::post('/', [BeerController::class, 'create']);
            Route::get('/last', [BeerController::class, 'getLast']);
            Route::get('/consumptions', [BeerController::class, 'getConsumptions']);
        });
    });
});
