<?php

use Illuminate\Http\Request;

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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
    Route::get('todos', 'TodoController@index');
    Route::get('todos/{id}', 'TodoController@show');
    Route::post('todos', 'TodoController@store');
    Route::put('todos/{id}', 'TodoController@update');
    Route::delete('todos/{id}', 'TodoController@destroy');
});
