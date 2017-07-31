<?php

namespace App\Http\Controllers\SuratKeluar;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SuratKeluar;
use App\Models\SifatSurat;
use Illuminate\Http\Request;
use Session;
use PDF;

class SuratKeluarController extends Controller
{
    const MODEL = SuratKeluar::class;
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
    public function create()
    {
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
        $suratkeluar = SuratKeluar::findOrFail($id);

        return view('surat-keluar.show', compact('suratkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
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
        
        $requestData = $request->all();
        
        $suratkeluar = SuratKeluar::findOrFail($id);
        $suratkeluar->update($requestData);

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
