<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@index');

Route::get('/home', function() {
    return view('welcome');
});

/**
 * Autocomplete routes.
 */
Route::get('user/search/autocomplete', 'SearchController@searchUser')->name('searchUser');
Route::get('kota/search/autocomplete', 'SearchController@searchKota')->name('searchKota');
Route::get('instansi/search/autocomplete', 'SearchController@searchInstansi')->name('searchInstansi');
Route::get('surat-masuk/search/autocomplete', 'SearchController@searchSuratMasuk')->name('searchSuratMasuk');

Route::get('surat-masuk/file/{id}', 'SuratMasuk\\SuratMasukController@download_file')->name('file');


Route::resource('admin/pegawai', 'Admin\\Pegawai\\PegawaiController');
Route::resource('surat-masuk', 'SuratMasuk\\SuratMasukController');
Route::resource('admin/sifat-surat', 'Admin\SifatSurat\\SifatSuratController');
Route::resource('admin/kota', 'Admin\Kota\\KotaController');
Route::resource('admin/instansi', 'Admin\Instansi\\InstansiController');
Route::resource('admin/instansi', 'Admin\Instansi\\InstansiController');
Route::resource('disposisi/isi-disposisi', 'Disposisi\\IsiDisposisiController');
Route::resource('disposisi', 'Disposisi\\DisposisiController');
Route::resource('tes/test', 'Test\\TestController');