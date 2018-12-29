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

Route::prefix('kategoridetail')->group(function() {
    Route::get('/', 'KategoriDetailController@index')->name('dkategori.index');

    Route::get('/create', 'KategoriDetailController@create')->name('tambah.dkategori');
    Route::post('/store', 'KategoriDetailController@store')->name('simpan.dkategori');

    Route::get('/edit/{id}', 'KategoriDetailController@edit')->name('edit.dkategori');
    Route::put('/update/{id}', 'KategoriDetailController@update')->name('update.dkategori');

    Route::delete('/delete/{id}', 'KategoriDetailController@destroy')->name('destroy.dkategori');
});
