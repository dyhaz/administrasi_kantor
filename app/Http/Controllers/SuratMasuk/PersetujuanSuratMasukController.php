<?php

namespace App\Http\Controllers\SuratMasuk;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SuratMasuk;
use App\Models\SifatSurat;
use App\Models\KegiatanSurat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class PersetujuanSuratMasukController extends Controller
{
    const MODEL = SuratMasuk::class;

    protected $validation = [
        'nomor' => 'bail|required|unique:surat_masuk|max:255',
        'tanggal_terima' => 'required|date',
        'nomor_naskah_dinas' => 'required|max:255',
        'nomor_naskah_dinas' => 'required|max:255',
        'id_sifat' => 'numeric',
        'id_instansi' => 'numeric',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $suratmasuk = SuratMasuk::where('nomor', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_terima', 'LIKE', "%$keyword%")
                ->orWhere('nomor_naskah_dinas', 'LIKE', "%$keyword%")
                ->orWhere('id_sifat', 'LIKE', "%$keyword%")
                ->orWhere('id_instansi', 'LIKE', "%$keyword%")
                ->orWhere('perihal', 'LIKE', "%$keyword%")
                ->orWhere('isi_ringkas', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $suratmasuk = SuratMasuk::paginate($perPage);
        }

        $user = Auth::user();
        $pegawai = Pegawai::where(['id_user' => @$user->id])->with('jabatan')->firstOrFail();

        return view('persetujuan-surat-masuk.index', compact('suratmasuk'))->with('id_pegawai', @$pegawai->id)->with('jabatan', @$pegawai->jabatan->nama);
    }

    /**
     * Acc surat masuk.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function acc($id)
    {
        $suratmasuk = SuratMasuk::with('instansi')->findOrFail($id);
        $sifatsurat = SifatSurat::orderBy('id')->pluck('nama','id');

        $user = Auth::user();
        $pegawai = Pegawai::where(['id_user' => @$user->id])->firstOrFail();
        if($suratmasuk->persetujuan()->where('id', $pegawai->id)->exists()) {
            $suratmasuk->persetujuan = '1';
        }
        return view('persetujuan-surat-masuk.edit', compact('suratmasuk'))->with(compact('sifatsurat'));
    }
}
