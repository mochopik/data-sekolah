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

Route::post('login', 'Api\RegisterController@login');
Route::post('register', 'Api\RegisterController@register'); 
Route::get('data', 'Api\SekolahController@data');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'Api\RegisterController@details');

    Route::resource('sekolah', 'Api\SekolahController');
});