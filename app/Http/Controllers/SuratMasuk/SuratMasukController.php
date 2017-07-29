<?php

namespace App\Http\Controllers\SuratMasuk;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SifatSurat;
use Illuminate\Support\Facades\Response;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Session;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    const MODEL = SuratMasuk::class;

    protected $validation = [
        'nomor' => 'bail|required|unique:surat_masuk|max:255',
        'tanggal_terima' => 'required|date',
        'nomor_naskah_dinas' => 'required|max:255',
        'nomor_naskah_dinas' => 'required|max:255',
        'id_sifat' => 'numeric',
        'id_instansi' => 'numeric',
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
        $sifatsurat = SifatSurat::orderBy('id')->pluck('nama','id');
        return view('surat-masuk.create')->with(compact('sifatsurat'));
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
        $requestData = $request->all();
        

        if ($request->file('file')) {
            $uploadPath = 'uploads/file';
            $fileName = $request->file('file')->store($uploadPath);
            $requestData['file'] = $fileName;
        }

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
        $suratmasuk = SuratMasuk::with('instansi')->with('sifat_surat')->findOrFail($id);
        Flysystem::read($suratmasuk->file);
        return view('surat-masuk.show', compact('suratmasuk'));
    }

    /**
     * Download SuratMasuk.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function download_file($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        $fs = Storage::disk('local')->getDriver();
        $stream = $fs->readStream($suratmasuk->file);

        return Response::stream(function() use($stream) {
            fpassthru($stream);
        }, 200, [
            "Content-Type" => $fs->getMimetype($suratmasuk->file),
            "Content-Length" => $fs->getSize($suratmasuk->file),
            "Content-disposition" => "attachment; filename=\"" . basename($suratmasuk->file) . "\"",
        ]);
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
        $suratmasuk = SuratMasuk::with('instansi')->findOrFail($id);
        $sifatsurat = SifatSurat::orderBy('id')->pluck('nama','id');
        return view('surat-masuk.edit', compact('suratmasuk', 'sifatsurat'));
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
        $this->validate($request, $this->validation);
        $requestData = $request->all();


        if ($request->file('file')) {
            $uploadPath = 'uploads/file';
            $fileName = $request->file('file')->store($uploadPath);
            $requestData['file'] = $fileName;
        }

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
