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

Route::group(['middleware' => 'auth', 'prefix' => 'roles'], function() {
    Route::get('/', 'RolesController@index',['middleware' => ['permission:role-list|role-create|role-edit|role-delete']])->name('roles.index');
    Route::get('/create', 'RolesController@create',['middleware' => ['permission:role-create']])->name('roles.create');
	Route::post('/store','RolesController@store',['middleware' => ['permission:role-create']])->name('roles.store');
    Route::get('/show/{id}','RolesController@show')->name('roles.show');
    Route::get('/edit/{id}','RolesController@edit',['middleware' => ['permission:role-edit']])->name('roles.edit');
	Route::post('/update/{id}','RolesController@update',['middleware' => ['permission:role-edit']])->name('roles.update');
    Route::delete('/destroy/{id}','RolesController@destroy',['middleware' => ['permission:role-delete']])->name('roles.destroy');
    
});
