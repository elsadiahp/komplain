<?php

Route::group(['middleware' => 'auth', 'prefix' => 'laporan'], function() {
    Route::get('/', 'LaporanController@index')->name('laporan.index');
    Route::get('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::post('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::get('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::post('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::get('/chart/kategori', 'LaporanController@chart_kategori')->name('chart.kategori');
    Route::post('/chart/kategori', 'LaporanController@chart_kategori')->name('chart.kategori');
    Route::get('/chart/area', 'LaporanController@area')->name('laporan.area');
    Route::post('/chart/area', 'LaporanController@area')->name('laporan.area');
    Route::get('/chartKategori', 'LaporanController@kategori')->name('laporan.kategori');
    Route::post('/chartKategori', 'LaporanController@kategori')->name('laporan.kategori');
});
