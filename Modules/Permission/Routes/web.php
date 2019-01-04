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

Route::prefix('permission')->group(function() {
    Route::get('/', 'PermissionController@index')->name('permission.index');
    Route::get('/create', 'PermissionController@create')->name('permission.create');
    Route::post('/store', 'PermissionController@store')->name('permission.store');

    Route::get('/edit/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::put('/update/{id}', 'PermissionController@update')->name('permission.update');

    Route::delete('/destroy/{id}', 'PermissionController@destroy')->name('permission.destroy');

});
