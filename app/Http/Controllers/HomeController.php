<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = SuratMasuk::whereMonth('tanggal_naskah', date('m'))
            ->orderBy('tanggal_naskah')->get()->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->tanggal_naskah)->format('d');
            });
        $surat_masuk_terakhir = SuratMasuk::orderBy('tanggal_terima')->limit(10)->get();
        return view('home', compact('surat_masuk_terakhir'))->with('surat_masuk', $surat_masuk);
    }
}
