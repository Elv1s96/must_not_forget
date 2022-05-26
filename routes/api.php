<?php

use App\Http\Controllers\GetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/get', [GetController::class,'get']);
    Route::get('/telegram', [\App\Http\Controllers\telegramController::class,'index']);
    Route::get('/telegram/sendFile', [\App\Http\Controllers\telegramController::class,'sendFile']);
    Route::get('/telegram/testEvent', [\App\Http\Controllers\telegramController::class,'testEvent']);
});
