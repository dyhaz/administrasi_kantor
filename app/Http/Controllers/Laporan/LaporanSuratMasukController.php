<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SuratKeluar;
use App\Models\SifatSurat;
use App\Models\KegiatanSurat;
use App\Models\Pegawai;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class LaporanSuratMasukController extends Controller
{

    public function pdf(Request $request) {
        $data['laporan'] = array();
        $data['judul'] = 'test';

        $tanggal1 = @$request->get('tanggal1');
        $tanggal2 = @$request->get('tanggal2');

        $surat_masuk = SuratMasuk::whereBetween('tanggal_terima', [@$tanggal1, @$tanggal2])
            ->orderBy('tanggal_terima', 'desc')->get();
        foreach($surat_masuk as $row) {
            $data['laporan'][$row->tanggal_terima][] = $row;
        }

        $pdf = PDF::loadView('pdf.laporan.surat-masuk', $data, [], [
            'title' => 'adsfasdf sdf-sdfse-qweqwe',
            "format" => "A4-L",
            'default_font_size' => '12',
            'author' => 'wiraharja.com',
            'margin_left'          => 10,
            'margin_right'         => 10,
            'margin_top'           => 10,
            'margin_bottom'        => 10,
        ]);
        $pdf->SetProtection(['modify', 'extract'], '', 'wiraharjagrahasoftware');
        return $pdf->stream('document.pdf');
    }

    public function index() {
        return view('laporan.surat-masuk.index');
    }
}