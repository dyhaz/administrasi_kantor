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
            $results[] = [ 'id' => 0, 'value' => '<b>Buat "' . str_replace('%','',htmlentities($term)) . '"</b>'];
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

    public function searchDivisi(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('divisi')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama ];
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

}