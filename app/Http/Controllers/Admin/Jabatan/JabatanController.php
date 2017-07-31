<?php

namespace App\Http\Controllers\Admin\Jabatan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Session;

class JabatanController extends Controller
{
    const MODEL = Jabatan::class;
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
            $jabatan = Jabatan::where('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $jabatan = Jabatan::paginate($perPage);
        }

        return view('admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.jabatan.create');
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
        
        Jabatan::create($requestData);

        Session::flash('flash_message', 'Jabatan added!');

        return redirect('admin/jabatan');
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
        $jabatan = Jabatan::findOrFail($id);

        return view('admin.jabatan.show', compact('jabatan'));
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
        $jabatan = Jabatan::findOrFail($id);

        return view('admin.jabatan.edit', compact('jabatan'));
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
        
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($requestData);

        Session::flash('flash_message', 'Jabatan updated!');

        return redirect('admin/jabatan');
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
        Jabatan::destroy($id);

        Session::flash('flash_message', 'Jabatan deleted!');

        return redirect('admin/jabatan');
    }
}
