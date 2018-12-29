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

Route::prefix('bagian')->group(function() {
    Route::get('/', 'BagianController@index')->name('bagian.index');

    Route::get('/create', 'BagianController@create')->name('tambah.bagian');
    Route::post('/store', 'BagianController@store')->name('simpan.bagian');

    Route::get('/edit/{id}', 'BagianController@edit')->name('edit.bagian');
    Route::put('/update/{id}', 'BagianController@update')->name('update.bagian');

    Route::delete('/destroy/{id}', 'BagianController@destroy')->name('destroy.bagian');
});
