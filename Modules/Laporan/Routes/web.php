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

Route::prefix('laporan')->group(function() {
    Route::get('/', 'LaporanController@index')->name('laporan.index');
    Route::get('/chart', 'LaporanController@chart')->name('laporan.chart');
});
