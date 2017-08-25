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

class SuratKeluarController extends Controller
{
    const MODEL = SuratKeluar::class;

    protected $validation = [
        'nomor' => 'bail|required|unique:surat_keluar|max:255',
        'perihal' => 'required|max:255',
        'id_sifat' => 'required|numeric',
        'isi' => 'required',
        'id_instansi' => 'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles([
            'su',
            'staf_subbag_tu',
            'ka_subbag_tu',
            'ka_seksi_pengujian_dan_pengendalian_mutu',
            'staf_seksi_pengujian_dan_pengendalian_mutu',
            'ka_upt'
        ]);

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $suratkeluar = SuratKeluar::with('instansi')->where('nomor', 'LIKE', "%$keyword%")
				->orWhere('id_instansi', 'LIKE', "%$keyword%")
				->orWhere('perihal', 'LIKE', "%$keyword%")
				->orWhere('id_sifat', 'LIKE', "%$keyword%")
				->orWhere('isi', 'LIKE', "%$keyword%")
				->orWhere('id_pegawai', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $suratkeluar = SuratKeluar::with('instansi')->paginate($perPage);
        }

        return view('surat-keluar.index', compact('suratkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu', 'ka_subbag_tu']);

        $sifatsurat = SifatSurat::orderBy('id')->pluck('nama','id');
        return view('surat-keluar.create')->with(compact('sifatsurat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if(empty(@$requestData['id_kegiatan_surat']))
            unset($requestData['id_kegiatan_surat']);

        $this->validate($request, $this->validation);
        
        SuratKeluar::create($requestData);

        Session::flash('flash_message', 'SuratKeluar added!');

        return redirect('surat-keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $suratkeluar = SuratKeluar::with('kegiatan_surat')->findOrFail($id);

        $kegiatansurat = KegiatanSurat::with('kegiatan')->with('klasifikasi_arsip')->find(@$suratkeluar->kegiatan_surat->id);

        return view('surat-keluar.show', compact('suratkeluar', 'kegiatansurat'))
            ->with('persetujuan', $suratkeluar->__persetujuan())->with('slug', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu', 'ka_subbag_tu']);

        $suratkeluar = SuratKeluar::with('instansi')->findOrFail($id);
        $sifatsurat = SifatSurat::orderBy('id')->pluck('nama','id');
        return view('surat-keluar.edit', compact('suratkeluar'))->with(compact('sifatsurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validation['nomor'] = '';

        $requestData = $request->all();
        if(empty(@$requestData['id_kegiatan_surat']))
            unset($requestData['id_kegiatan_surat']);

        $this->validate($request, $this->validation);

        $suratkeluar = SuratKeluar::findOrFail($id);
        $suratkeluar->update($requestData);


        if(@$requestData['persetujuan']) {
            $user = Auth::user();
            $pegawai = Pegawai::where(['id_user' => @$user->id])->firstOrFail();
            if(!$suratkeluar->persetujuan()->where('id', $pegawai->id)->exists()) {
                $suratkeluar->persetujuan()->attach($pegawai->id);
            }
        }

        Session::flash('flash_message', 'SuratKeluar updated!');

        return redirect('surat-keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SuratKeluar::destroy($id);

        Session::flash('flash_message', 'SuratKeluar deleted!');

        return redirect('surat-keluar');
    }


    public function generate_pdf($id) {
        $suratkeluar = SuratKeluar::findOrFail($id);
        $data = [
            'isi' => $suratkeluar->isi
        ];
        $pdf = PDF::loadView('pdf.surat-keluar', $data);
        return $pdf->stream('document.pdf');
    }
}
