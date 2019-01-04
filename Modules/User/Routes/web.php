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

Route::group(['middleware' => 'auth', 'prefix' => 'users'], function() {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/craete', 'UserController@create')->name('users.create');
});
