<?php

namespace App\Http\Controllers\Admin\Kegiatan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Session;

class KegiatanController extends Controller
{
    const MODEL = Kegiatan::class;

    protected $validation = [
        'nama' => 'bail|required|unique:kegiatan|max:100',
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
            $kegiatan = Kegiatan::where('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $kegiatan = Kegiatan::paginate($perPage);
        }

        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kegiatan.create');
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
        
        Kegiatan::create($requestData);

        Session::flash('flash_message', 'Kegiatan added!');

        return redirect('admin/kegiatan');
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
        $kegiatan = Kegiatan::findOrFail($id);

        return view('admin.kegiatan.show', compact('kegiatan'))->with('slug', $id);
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
        $kegiatan = Kegiatan::findOrFail($id);

        return view('admin.kegiatan.edit', compact('kegiatan'))->with('slug', $id);
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
        
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($requestData);

        Session::flash('flash_message', 'Kegiatan updated!');

        return redirect('admin/kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu']);
        Kegiatan::destroy($id);

        Session::flash('flash_message', 'Kegiatan deleted!');

        return redirect('admin/kegiatan');
    }
}
