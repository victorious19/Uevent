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
Route::group(['prefix' => 'company'], function() {
    Route::get('{company_id}', 'App\Http\Controllers\CompanyController@get');
});
Route::group(['prefix' => 'theme'], function() {
    Route::get('', 'App\Http\Controllers\ThemeController@get_all');
});
Route::group(['prefix' => 'events'], function() {
    Route::get('', 'App\Http\Controllers\EventController@get_all');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::group(['prefix' => 'events'], function() {
        Route::get('', 'App\Http\Controllers\EventController@get_all');
        Route::patch('{event_id}', 'App\Http\Controllers\EventController@change');
        Route::delete('{event_id}', 'App\Http\Controllers\EventController@delete');
    });
    Route::group(['prefix' => 'theme'], function() {
        Route::post('', 'App\Http\Controllers\ThemeController@create');
        Route::delete('{theme_id}', 'App\Http\Controllers\ThemeController@create');
    });
    Route::group(['prefix' => 'company'], function() {
        Route::post('', 'App\Http\Controllers\CompanyController@create');
        Route::patch('{company_id}', 'App\Http\Controllers\CompanyController@change');
        Route::delete('{company_id}', 'App\Http\Controllers\CompanyController@delete');
    });
});
