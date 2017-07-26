<?php

namespace App\Http\Controllers\SuratMasuk;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SuratMasuk;
use Illuminate\Http\Request;
use Session;

class SuratMasukController extends Controller
{

    const MODEL = SuratMasuk::class;

    protected $validation = [
        'nomor' => 'bail|required|unique:surat_masuk|max:255',
        'tanggal_terima' => 'required|date',
        'nomor_naskah_dinas' => 'required|max:255',
        'nomor_naskah_dinas' => 'required|max:255',
        'file' => 'required|file',
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

        return view('surat-masuk.index', compact('suratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('surat-masuk.create');
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

        $this->validate($request, $this->validation);

        $file = $request->file('file')->store('uploads');

        $requestData = $request->all();

        $requestData['file'] = $file;
        
        SuratMasuk::create($requestData);

        Session::flash('flash_message', 'SuratMasuk added!');

        return redirect('surat-masuk');
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
        $suratmasuk = SuratMasuk::findOrFail($id);

        return view('surat-masuk.show', compact('suratmasuk'));
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
        $suratmasuk = SuratMasuk::findOrFail($id);

        return view('surat-masuk.edit', compact('suratmasuk'));
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

        $this->validate($request, $this->validation);

        $file = $request->file('file')->store('uploads');

        $requestData = $request->all();

        $requestData['file'] = $file;

        $suratmasuk = SuratMasuk::findOrFail($id);
        $suratmasuk->update($requestData);

        Session::flash('flash_message', 'SuratMasuk updated!');

        return redirect('surat-masuk');
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
        SuratMasuk::destroy($id);

        Session::flash('flash_message', 'SuratMasuk deleted!');

        return redirect('surat-masuk');
    }
}
