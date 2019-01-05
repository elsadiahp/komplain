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

Route::group(['middleware' => 'auth', 'prefix' => 'permission'], function() {
    Route::get('/', 'PermissionController@index',['middleware' => ['permission:role-list|role-create|role-edit|role-delete']])->name('permission.index');
    Route::get('/create', 'PermissionController@create',['middleware' => ['permission:role-create']])->name('permission.create');
	Route::post('/store','PermissionController@store',['middleware' => ['permission:role-create']])->name('permission.store');
    Route::get('/show/{id}','PermissionController@show')->name('permission.show');
    Route::get('/edit/{id}','PermissionController@edit',['middleware' => ['permission:role-edit']])->name('permission.edit');
	Route::post('/update/{id}','PermissionController@update',['middleware' => ['permission:role-edit']])->name('permission.update');
    Route::delete('/destroy/{id}','PermissionController@destroy',['middleware' => ['permission:role-delete']])->name('permission.destroy');
    
});