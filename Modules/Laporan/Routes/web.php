<?php
Route::prefix('laporan')->group(function() {
    Route::get('/', 'LaporanController@index')->name('laporan.index');
    Route::get('/chartarea', 'LaporanController@area')->name('laporan.area');
    Route::get('/chartkategori', 'LaporanController@kategori')->name('laporan.kategori');
    Route::get('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::post('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::get('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::post('/chart/bulan', 'LaporanController@chart_bulan')->name('chart.bulan');
    Route::get('/chart/kategori', 'LaporanController@chart_kategori')->name('chart.kategori');
    Route::post('/chart/kategori', 'LaporanController@chart_kategori')->name('chart.kategori');
});
