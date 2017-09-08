<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $surat_masuk = SuratMasuk::select(DB::raw('count(*) as count, dayofmonth(tanggal_naskah) as day'))
            ->whereMonth('tanggal_naskah', date('m'))
            ->groupBy('tanggal_naskah')->orderBy('tanggal_naskah')->get();
        $surat_masuk_terakhir = SuratMasuk::orderBy('tanggal_terima')->limit(10)->get();
        $surat_masuk_divisi = DB::table('surat_masuk')->select(DB::raw('count(*) as count, divisi.nama as nama_divisi'))
            ->where('tanggal_terima', 'LIKE', date('Y-m-%'))
            ->join('disposisi', 'disposisi.id_surat_masuk', 'surat_masuk.id')
            ->join('disposisi_tujuan', 'disposisi_tujuan.id_disposisi', 'disposisi.id')
            ->join('divisi', 'disposisi_tujuan.id_divisi', 'divisi.id')
            ->groupBy('id_divisi')->get();
        return view('home', compact('surat_masuk_terakhir'))->with('surat_masuk', $surat_masuk)
            ->with('surat_masuk_divisi',$surat_masuk_divisi );
    }
}
