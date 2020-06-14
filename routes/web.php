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
Route::any('admin/login', 'Admin\LoginController@login');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'isLogin'],function (){
    Route::get('index', 'LoginController@index');

    Route::get('welcome', 'LoginController@welcome');

    Route::get('logout', 'LoginController@logout');
});