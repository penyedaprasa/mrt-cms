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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/banner','API\BannerController@index');
Route::get('/menu','API\MenuController@index');
Route::get('/station','API\StationController@index');
Route::get('/schedule/{station}','API\ScheduleController@index');
Route::get('/schedule/{station}/hour/{hour}','API\ScheduleController@hours');