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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::group(['prefix' => 'events'], function() {
        Route::get('', 'App\Http\Controllers\EventController@get_all');
        Route::post('', 'App\Http\Controllers\EventController@create');
    });
    Route::group(['prefix' => 'theme'], function() {
        Route::get('', 'App\Http\Controllers\ThemeController@create');
    });
    Route::group(['prefix' => 'company'], function() {
        Route::get('', 'App\Http\Controllers\CompanyController@create');
    });
});
