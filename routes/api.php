<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\MeController;
use App\Http\Controllers\Front\AuthController;
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

Route::middleware('api.acceptjson')->group(function () {
    Route::controller(AuthController::class)
        ->prefix('/auth')->group(function () {
            Route::post('register', 'register');
            Route::post('login', 'login');
        });

    Route::middleware('auth:api')->group(function () {
        Route::controller(MeController::class)
            ->prefix('me')->group(function () {
                Route::get('', 'getMe');
                Route::put('', 'updateMe');
            });
    });
});


