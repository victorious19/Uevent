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


//ДЛЯ НЕАВТОРИЗИРОВАННЫХ
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'App\Http\Controllers\AuthController@login');         //авторизация пользователя
    Route::post('register', 'App\Http\Controllers\AuthController@register');   //регистрация пользователя
});
Route::group(['prefix' => 'company'], function() {
    Route::get('{company_id}', 'App\Http\Controllers\CompanyController@get');  //инфа о компании по id
});
Route::group(['prefix' => 'theme'], function() {
    Route::get('', 'App\Http\Controllers\ThemeController@get_all');            //все темы
});
Route::group(['prefix' => 'events'], function() {
    Route::get('', 'App\Http\Controllers\EventController@get_all');            //все события
});


//ДЛЯ АВТОРИЗИРОВАННЫХ
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::group(['prefix' => 'events'], function() {
        Route::patch('{event_id}', 'App\Http\Controllers\EventController@change');   //изменить событие
        Route::delete('{event_id}', 'App\Http\Controllers\EventController@delete');  //удалить событие
    });
    Route::group(['prefix' => 'theme'], function() {
        Route::post('', 'App\Http\Controllers\ThemeController@create');              //создать тему
        Route::delete('{theme_id}', 'App\Http\Controllers\ThemeController@create');  //удалить тему
    });
    Route::group(['prefix' => 'company'], function() {
        Route::post('', 'App\Http\Controllers\CompanyController@create');               //создать компанию
        Route::patch('{company_id}', 'App\Http\Controllers\CompanyController@change');  //изменить компанию
        Route::delete('{company_id}', 'App\Http\Controllers\CompanyController@delete'); //удалить компанию
    });
});
