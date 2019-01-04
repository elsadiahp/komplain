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

Route::group(['middleware' => 'auth', 'prefix' => 'komplain'], function() {
    Route::get('/', 'KomplainController@index')->name('komplain.index');
    Route::get('/create', 'KomplainController@create')->name('komplain.create');
    Route::post('/store', 'KomplainController@store')->name('komplain.store');
    Route::get('/edit/{id}', 'KomplainController@edit')->name('komplain.edit');
    Route::post('/update/{id}', 'KomplainController@update')->name('komplain.update');
    Route::post('/status/{id}', 'KomplainController@status')->name('komplain.status');
    Route::delete('/delete/{id}', 'KomplainController@destroy')->name('komplain.destroy');

    Route::get('/json-waroeng','KomplainController@waroeng')->name('komplain.select');
});
