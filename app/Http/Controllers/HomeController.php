<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (empty(Auth::user()->pegawai)) {
            $this->add_user_detail();
        }

        $surat_masuk_terakhir = SuratMasuk::orderBy('tanggal_terima', 'desc')->get();
        $surat_masuk_divisi = SuratMasuk::get();
        $surat_masuk = SuratMasuk::get();
        return view('home')
            ->with('surat_masuk_terakhir', $surat_masuk_terakhir)
            ->with('surat_masuk', $surat_masuk)
            ->with('surat_masuk_divisi', $surat_masuk_divisi);
    }

    private function add_user_detail() {
        $pegawai = Pegawai::where('nama', Auth::user()->name)->orderBy('created_at', 'desc')
            ->first();
        $pegawai->id_user = Auth::user()->id;
        $pegawai->save();
    }
}
