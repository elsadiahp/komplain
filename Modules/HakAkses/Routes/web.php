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

Route::prefix('hakakses')->group(function() {
    Route::get('/', 'HakAksesController@index')->name('HakAkses.index');
    Route::get('/view-permission/{id}', 'HakAksesController@ViewRoleWithPermission')->name('role.permission.view');
    Route::get('/view-permission/{idRole}', 'HakAksesController@SaveRoleWithPermission')->name('role.permission.save');
});
