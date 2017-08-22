<?php

namespace App\Http\Controllers\Admin\KegiatanSurat;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\KegiatanSurat;
use Illuminate\Http\Request;
use Session;

class KegiatanSuratController extends Controller
{
    const MODEL = KegiatanSurat::class;

    protected $validation = [
        'nomor' => 'max:5',
        'id_kegiatan' => 'required|numeric',
        'id_klasifikasi_arsip' => 'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu']);

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $kegiatansurat = KegiatanSurat::with('kegiatan')->with('klasifikasi_arsip')->where('id_klasifikasi_arsip', 'LIKE', "%$keyword%")
				->orWhere('id_kegiatan', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $kegiatansurat = KegiatanSurat::with('kegiatan')->with('klasifikasi_arsip')->paginate($perPage);
        }

        return view('admin.kegiatan-surat.index', compact('kegiatansurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kegiatan-surat.create');
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
        
        KegiatanSurat::create($requestData);

        Session::flash('flash_message', 'KegiatanSurat added!');

        return redirect('admin/kegiatan-surat');
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
        $kegiatansurat = KegiatanSurat::with('kegiatan')->with('klasifikasi_arsip')->findOrFail($id);

        return view('admin.kegiatan-surat.show', compact('kegiatansurat'))->with('slug', $id);
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
        $kegiatansurat = KegiatanSurat::with('kegiatan')->with('klasifikasi_arsip')->findOrFail($id);

        return view('admin.kegiatan-surat.edit', compact('kegiatansurat'))->with('slug', $id);
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
        $requestData = $request->all();
        
        $kegiatansurat = KegiatanSurat::findOrFail($id);
        $kegiatansurat->update($requestData);

        Session::flash('flash_message', 'KegiatanSurat updated!');

        return redirect('admin/kegiatan-surat');
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
        KegiatanSurat::destroy($id);

        Session::flash('flash_message', 'KegiatanSurat deleted!');

        return redirect('admin/kegiatan-surat');
    }
}
