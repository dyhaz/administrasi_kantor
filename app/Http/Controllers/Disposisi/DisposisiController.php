<?php

namespace App\Http\Controllers\Disposisi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Session;

class DisposisiController extends Controller
{
    const MODEL = Disposisi::class;
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
            $disposisi = Disposisi::with('surat_masuk')->where('nomor', 'LIKE', "%$keyword%")
				->orWhere('id_surat_masuk', 'LIKE', "%$keyword%")
				->orWhere('keterangan', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $disposisi = Disposisi::with('surat_masuk')->paginate($perPage);
        }

        return view('disposisi.index', compact('disposisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if($request->get('sm')) {
            $suratmasuk = SuratMasuk::findOrFail($request->get('sm'));
            return view('disposisi.create', compact('suratmasuk'));
        }

        return view('disposisi.create');
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
        
        Disposisi::create($requestData);

        Session::flash('flash_message', 'Disposisi added!');

        return redirect('disposisi');
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
        $disposisi = Disposisi::with('surat_masuk')->findOrFail($id);

        return view('disposisi.show', compact('disposisi'));
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
        $disposisi = Disposisi::with('surat_masuk')->findOrFail($id);

        return view('disposisi.edit', compact('disposisi'));
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
        
        $disposisi = Disposisi::with('surat_masuk')->findOrFail($id);
        $disposisi->update($requestData);

        Session::flash('flash_message', 'Disposisi updated!');

        return redirect('disposisi');
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
        Disposisi::destroy($id);

        Session::flash('flash_message', 'Disposisi deleted!');

        return redirect('disposisi/disposisi');
    }
}
