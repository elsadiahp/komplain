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

Route::group(['middleware' => 'auth', 'prefix' => 'detkomplain'], function() {
    Route::get('/', 'DetkomplainController@index')->name('detkomplain.index');
    Route::get('create', 'DetkomplainController@create')->name('tambah.detkomplain');
    Route::get('store', 'DetkomplainController@store')->name('save.detkomplain');
});
