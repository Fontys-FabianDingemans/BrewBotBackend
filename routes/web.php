<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/download', [HomeController::class, 'download']);

Route::group(['prefix' => 'download'], function () {
    Route::get('/app', [DownloadController::class, 'app'])->name('download.app');
});
