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

Route::group(['middleware' => 'auth', 'prefix' => 'users'], function() {
    
    //ROLES
    Route::get('/roles', 'RolesController@index',['middleware' => ['permission:role-list|role-create|role-edit|role-delete']])->name('role.index');
    Route::get('/roles/create', 'RolesController@create',['middleware' => ['permission:role-create']])->name('role.create');
	Route::post('/roles/store','RolesController@store',['middleware' => ['permission:role-create']])->name('role.store');
    Route::get('/roles/show/{id}','RolesController@show')->name('roles.show');
    Route::get('/roles/edit/{id}','RolesController@edit',['middleware' => ['permission:role-edit']])->name('role.edit');
	Route::post('/roles/update/{id}','RolesController@update',['middleware' => ['permission:role-edit']])->name('role.update');
    Route::delete('/roles/destroy/{id}','RolesController@destroy',['middleware' => ['permission:role-delete']])->name('role.destroy');

    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/craete', 'UserController@create')->name('users.create');
});
