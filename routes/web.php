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
use App\DataTables\DisposisiTujuanDataTable;

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
Route::get('jabatan/search/autocomplete', 'SearchController@searchJabatan')->name('searchJabatan');
Route::get('divisi/search/autocomplete', 'SearchController@searchDivisi')->name('searchDivisi');
Route::get('kegiatan/search/autocomplete', 'SearchController@searchKegiatan')->name('searchKegiatan');
Route::get('klasifikasi-arsip/search/autocomplete', 'SearchController@searchKlasifikasiArsip')->name('searchKlasifikasiArsip');
Route::get('kegiatan-surat/search/autocomplete', 'SearchController@searchKegiatanSurat')->name('searchKegiatanSurat');

/**
 * Datatables
 */
Route::get('disposisi-tujuan/{id}', function($id, DisposisiTujuanDataTable $dataTable)
{
    return $dataTable->forIdDisposisi($id)->render('disposisi.disposisi-tujuan.input-tujuan', ['id' => $id]);
});

/**
 * Others
 */
Route::get('surat-masuk/file/{id}', 'SuratMasuk\\SuratMasukController@download_file')->name('file');
Route::get('surat-keluar/pdf/{id}', 'SuratKeluar\\SuratKeluarController@generate_pdf')->name('pdf');

Route::resource('surat-masuk', 'SuratMasuk\\SuratMasukController');
Route::resource('surat-keluar', 'SuratKeluar\\SuratKeluarController');
Route::get('persetujuan-surat-keluar/{id}', 'SuratKeluar\\PersetujuanSuratKeluarController@acc');
Route::resource('persetujuan-surat-keluar', 'SuratKeluar\\PersetujuanSuratKeluarController');
Route::resource('admin/pegawai', 'Admin\\Pegawai\\PegawaiController');
Route::resource('admin/sifat-surat', 'Admin\SifatSurat\\SifatSuratController');
Route::resource('admin/kota', 'Admin\Kota\\KotaController');
Route::resource('admin/instansi', 'Admin\Instansi\\InstansiController');
Route::resource('admin/divisi', 'Admin\Divisi\\DivisiController');
Route::resource('admin/jabatan', 'Admin\Jabatan\\JabatanController');
Route::resource('admin/klasifikasi-arsip', 'Admin\KlasifikasiArsip\\KlasifikasiArsipController');
Route::resource('admin/kegiatan-surat', 'Admin\KegiatanSurat\\KegiatanSuratController');
Route::resource('admin/kegiatan', 'Admin\Kegiatan\\KegiatanController');
Route::resource('disposisi/isi-disposisi', 'Disposisi\\IsiDisposisiController');
Route::resource('disposisi/disposisi-tujuan', 'Disposisi\\DisposisiTujuanController');
Route::resource('disposisi', 'Disposisi\\DisposisiController');
Route::resource('tes/test', 'Test\\TestController');
