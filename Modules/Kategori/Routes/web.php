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

Route::group(['middleware' => 'auth', 'prefix' => 'kategori'], function() {
    Route::get('/', 'KategoriController@index')->name('kategori.index');
    Route::get('/create', 'KategoriController@create')->name('tambah.kategori');
    Route::post('/store', 'KategoriController@store')->name('simpan.kategori');
    Route::get('/edit/{id_kategori}', 'KategoriController@edit')->name('edit.kategori');
    Route::put('/update/{id_kategori}', 'KategoriController@update')->name('update.kategori');
    Route::delete('/destroy/{id_kategori}', 'KategoriController@destroy')->name('destroy.kategori');
});
