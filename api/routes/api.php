<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('zipcode/{zipcode}', [\App\Http\Controllers\SearchController::class, 'zipcode']);
Route::get('street', [\App\Http\Controllers\SearchController::class, 'street']);
Route::apiResource('addresses', \App\Http\Controllers\AddressController::class);
