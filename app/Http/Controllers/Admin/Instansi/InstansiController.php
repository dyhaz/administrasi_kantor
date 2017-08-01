<?php

namespace App\Http\Controllers\Admin\Instansi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Session;

class InstansiController extends Controller
{
    const MODEL = Instansi::class;

    protected $validation = [
        'nama' => 'bail|required|unique:instansi|max:50',
        'no_telp' => 'required|max:20',
        'id_kota' => 'required|numeric',
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
            $instansi = Instansi::with('kota')->where('nama', 'LIKE', "%$keyword%")
				->orWhere('id_kota', 'LIKE', "%$keyword%")
				->orWhere('no_telp', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $instansi = Instansi::with('kota')->paginate($perPage);
        }

        return view('admin.instansi.index', compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.instansi.create');
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
        
        Instansi::create($requestData);

        Session::flash('flash_message', 'Instansi added!');

        return redirect('admin/instansi');
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
        $instansi = Instansi::with('kota')->findOrFail($id);

        return view('admin.instansi.show', compact('instansi'));
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
        $instansi = Instansi::with('kota')->findOrFail($id);

        return view('admin.instansi.edit', compact('instansi'));
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
        
        $instansi = Instansi::with('kota')->findOrFail($id);
        $instansi->update($requestData);

        Session::flash('flash_message', 'Instansi updated!');

        return redirect('admin/instansi');
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
        Instansi::destroy($id);

        Session::flash('flash_message', 'Instansi deleted!');

        return redirect('admin/instansi');
    }
}
