<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'dashboard'], function () {
  Route::get('/','DashboardController@index')->name('dashboard.index');
  Route::get('/profile','DashboardController@profile')->name('dashboard.profile');
  Route::get('/setting','DashboardController@setting')->name('dashboard.setting');
  Route::get('/account_lock','DashboardController@account_lock')->name('dashboard.account_lock');
  Route::get('/privilege/{id}','DashboardController@privileges')->name('dashboard.privilege');
  Route::post('/privilege/update','DashboardController@update_priv')->name('privilege.update');
  Route::resource('/train','TrainController');
  Route::get('/train/edit/{id}','TrainController@edit');
  Route::get('/train/remove/{id}','TrainController@remove');
  Route::resource('/station','StationController');
  Route::get('/station/edit/{id}','StationController@edit');
  Route::get('/station/remove/{id}','StationController@remove');
  Route::resource('/route','RouteController');
  Route::get('/route/edit/{id}','RouteController@edit');
  Route::get('/route/remove/{id}','RouteController@remove');
  Route::resource('/trainroute','TrainRouteController');
  Route::get('/trainroute/edit/{id}','TrainRouteController@edit');
  Route::get('/trainroute/remove/{id}','TrainRouteController@remove');
  Route::resource('/banner','BannerController');
  Route::get('/banner/edit/{id}','BannerController@edit');
  Route::get('/banner/remove/{id}','BannerController@remove');
  Route::resource('/menu','MenuController');
  Route::resource('/role','RoleController');
  Route::get('/role/edit/{id}','RoleController@edit');
  Route::resource('/sidebar','SidebarMenuController');
  Route::get('/sidebar/remove/{id}','SidebarMenuController@destroy');
  Route::post('/profile/update','UserController@update');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
