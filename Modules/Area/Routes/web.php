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

Route::prefix('area')->group(function() {
    Route::get('/', 'AreaController@index')->name('area.index');
    Route::get('/create', 'AreaController@create')->name('area.create');
    Route::post('/store', 'AreaController@store')->name('area.store');
    Route::get('/edit/{id}', 'AreaController@edit')->name('area.edit');
    Route::patch('/update/{id}', 'AreaController@update')->name('area.update');
    Route::delete('/delete/{id}', 'AreaController@destroy')->name('area.destroy');
});
