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
  Route::resource('/train','TrainController');
  Route::resource('/station','StationController');
  Route::resource('/route','RouteController');
  Route::resource('/trainroute','TrainRouteController');
  Route::resource('/banner','BannerController');
  Route::resource('/menu','MenuController');
  Route::resource('/role','RoleController');
  Route::get('/role/edit/{id}','RoleController@edit');
  Route::resource('/sidebar','SidebarMenuController');
  Route::get('/sidebar/remove/{id}','SidebarMenuController@destroy');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
