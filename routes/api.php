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
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', 'API\AuthController@register');
        Route::post('/login', 'API\AuthController@login');
        Route::get('/logout', 'API\AuthController@logout')->middleware('auth:api');
        Route::get('/details', 'API\AuthController@details')->middleware('auth:api');
    });
});
