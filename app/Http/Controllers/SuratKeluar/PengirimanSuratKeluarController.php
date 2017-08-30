<?php

namespace App\Http\Controllers\SuratKeluar;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SuratKeluar;
use App\Models\SifatSurat;
use App\Models\KegiatanSurat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class PengirimanSuratKeluarController extends Controller
{
    const MODEL = SuratKeluar::class;

    protected $validation = [
        'id_surat_keluar' => 'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function draft(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $suratkeluar = SuratKeluar::with('instansi')->where(['status_kirim' => '0'])
                ->where(function ($query) use($keyword, $perPage) {
                    $query->where('nomor', 'LIKE', "%$keyword%")->orWhere('id_instansi', 'LIKE', "%$keyword%")
                        ->orWhere('perihal', 'LIKE', "%$keyword%")
                        ->orWhere('id_sifat', 'LIKE', "%$keyword%")
                        ->orWhere('isi', 'LIKE', "%$keyword%")
                        ->orWhere('id_pegawai', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%");
                })->paginate($perPage);
        } else {
            $suratkeluar = SuratKeluar::with('instansi')->where(['status_kirim' => '0'])->paginate($perPage);
        }

        $user = Auth::user();
        $pegawai = Pegawai::where(['id_user' => @$user->id])->with('jabatan')->firstOrFail();

        return view('pengiriman-surat-keluar.index', compact('suratkeluar'))->with('id_pegawai', @$pegawai->id)
            ->with('jabatan', @$pegawai->jabatan->nama)->with('description', 'Draft Surat Keluar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function terkirim(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $suratkeluar = SuratKeluar::with('instansi')->where(['status_kirim' => '1'])
                ->where(function ($query) use($keyword, $perPage) {
                    $query->where('nomor', 'LIKE', "%$keyword%")->orWhere('id_instansi', 'LIKE', "%$keyword%")
                        ->orWhere('perihal', 'LIKE', "%$keyword%")
                        ->orWhere('id_sifat', 'LIKE', "%$keyword%")
                        ->orWhere('isi', 'LIKE', "%$keyword%")
                        ->orWhere('id_pegawai', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%");
                })->paginate($perPage);
        } else {
            $suratkeluar = SuratKeluar::with('instansi')->where(['status_kirim' => '1'])->paginate($perPage);
        }

        $user = Auth::user();
        $pegawai = Pegawai::where(['id_user' => @$user->id])->with('jabatan')->firstOrFail();

        return view('pengiriman-surat-keluar.index', compact('suratkeluar'))->with('id_pegawai', @$pegawai->id)
            ->with('jabatan', @$pegawai->jabatan->nama)->with('description', 'Surat Keluar Terkirim');
    }

    /**
     * Kirim surat keluar.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function kirim($id)
    {
        $suratkeluar = SuratKeluar::with('instansi')->findOrFail($id);

        $user = Auth::user();
        Pegawai::where(['id_user' => @$user->id])->firstOrFail();

        if($suratkeluar->persetujuan()->count() && $suratkeluar->disetujui_ka_upt()) {
            $suratkeluar->status_kirim = '1';
            $suratkeluar->update();
            Session::flash('flash_message', 'Surat terkirim!');
        } else {
            Session::flash('flash_message', 'Tidak dapat mengirim surat');
        }

        return redirect('/surat-keluar/'.$suratkeluar->id);

    }
}
