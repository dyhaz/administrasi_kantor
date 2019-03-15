<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function searchUser(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('users')
            ->where('email', 'LIKE', '%'.$term.'%')
            ->orWhere('name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name.' '.$query->email ];
        }
        return Response::json($results);
    }

    public function searchKota(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('kota')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }
        return Response::json($results);
    }

    public function searchInstansi(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('instansi')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }

        if(sizeof($queries) == 0) {
            $results[] = [ /*'id' => 0, 'value' => '<b>Buat "' . str_replace('%','',htmlentities($term)) . '"</b>'*/];
        }

        return Response::json($results);
    }

    public function searchSuratMasuk(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('surat_masuk')
            ->where('nomor', 'LIKE', '%'.$term.'%')
            ->orWhere('nomor_naskah_dinas', 'LIKE', '%'.$term.'%')
            ->orWhere('perihal', 'LIKE', '%'.$term.'%')
            ->orWhere('isi_ringkas', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nomor ];
        }

        return Response::json($results);
    }

    public function searchPegawai(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('pegawai')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->orWhere('nip', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }

        return Response::json($results);
    }

    public function searchDivisi(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('divisi')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama , 'kode' => $query->kode];
        }

        return Response::json($results);
    }

    public function searchJabatan(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('jabatan')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }

        return Response::json($results);
    }

    public function searchKegiatan(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('kegiatan')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }

        return Response::json($results);
    }

    public function searchKlasifikasiArsip(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('klasifikasi_arsip')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->orWhere('nomor', 'LIKE', $term)
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
        }

        return Response::json($results);
    }

    public function searchKegiatanSurat(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('kegiatan_surat')
            ->join('kegiatan', 'kegiatan.id', '=', 'kegiatan_surat.id_kegiatan')
            ->join('klasifikasi_arsip', 'klasifikasi_arsip.id', '=', 'kegiatan_surat.id_klasifikasi_arsip')
            ->where('kegiatan_surat.nomor', 'LIKE', '%'.$term.'%')
            ->orWhere('klasifikasi_arsip.nama', 'LIKE', '%'.$term.'%')
            ->orWhere('kegiatan.nama', 'LIKE', '%'.$term.'%')
            ->orWhere('klasifikasi_arsip.nomor', 'LIKE', '%'.$term.'%')
            ->select(['kegiatan_surat.id','kegiatan_surat.nomor','klasifikasi_arsip.nomor as nomor_klasifikasi_arsip','klasifikasi_arsip.nama as klasifikasi_arsip','kegiatan.nama as kegiatan'])
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'nomor' => $query->nomor_klasifikasi_arsip . $query->nomor, 'id' => $query->id, 'klasifikasi_arsip' => $query->klasifikasi_arsip, 'kegiatan' => $query->kegiatan, 'value' => '<strong>No: </strong>'.$query->nomor_klasifikasi_arsip . $query->nomor.'</br><strong>Masalah: </strong>'.$query->klasifikasi_arsip.'</br><strong>Kegiatan: </strong>'.$query->kegiatan ];
        }

        return Response::json($results);
    }

}