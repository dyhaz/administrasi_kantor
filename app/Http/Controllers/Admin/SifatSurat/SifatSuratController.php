<?php

namespace App\Http\Controllers\Admin\SifatSurat;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SifatSurat;
use Illuminate\Http\Request;
use Session;

class SifatSuratController extends Controller
{
    const MODEL = SifatSurat::class;
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
            $sifatsurat = SifatSurat::where('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $sifatsurat = SifatSurat::paginate($perPage);
        }

        return view('admin.sifat-surat.index', compact('sifatsurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sifat-surat.create');
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
        
        SifatSurat::create($requestData);

        Session::flash('flash_message', 'SifatSurat added!');

        return redirect('admin/sifat-surat');
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
        $sifatsurat = SifatSurat::findOrFail($id);

        return view('admin.sifat-surat.show', compact('sifatsurat'));
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
        $sifatsurat = SifatSurat::findOrFail($id);

        return view('admin.sifat-surat.edit', compact('sifatsurat'));
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
        
        $sifatsurat = SifatSurat::findOrFail($id);
        $sifatsurat->update($requestData);

        Session::flash('flash_message', 'SifatSurat updated!');

        return redirect('admin/sifat-surat');
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
        SifatSurat::destroy($id);

        Session::flash('flash_message', 'SifatSurat deleted!');

        return redirect('admin/sifat-surat');
    }
}
