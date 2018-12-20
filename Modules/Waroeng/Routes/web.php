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

Route::prefix('waroeng')->group(function() {
    Route::get('/', 'WaroengController@index')->name('waroeng.index');
<<<<<<< HEAD
    Route::get('/tambah', 'WaroengController@create')->name('tambah.waroeng');
    Route::post('/store', 'WaroengController@store')->name('simpan.waroeng');

    Route::get('/edit/{waroeng_id}', 'WaroengController@edit')->name('edit.waroeng');
    Route::put('/update/{waroeng_id}', 'WaroengController@update')->name('update.waroeng');

    Route::delete('/destroy/{waroeng_id}', 'WaroengController@destroy')->name('destroy.waroeng');
=======
>>>>>>> elsa
});
