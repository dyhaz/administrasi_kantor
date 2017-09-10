<?php

namespace App\Http\Controllers\Admin\Kota;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kota;
use Illuminate\Http\Request;
use Session;

class KotaController extends Controller
{
    const MODEL = Kota::class;

    protected $validation = [
        'nama' => 'bail|required|unique:kota|max:255',
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
            $kota = Kota::where('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $kota = Kota::paginate($perPage);
        }

        return view('admin.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kota.create');
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
        
        Kota::create($requestData);

        Session::flash('flash_message', 'Kotum added!');

        return redirect('admin/kota');
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
        $kotum = Kota::findOrFail($id);

        return view('admin.kota.show', compact('kotum'))->with('slug', $id);
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
        $kotum = Kota::findOrFail($id);

        return view('admin.kota.edit', compact('kotum'))->with('slug', $id);
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
        
        $kotum = Kota::findOrFail($id);
        $kotum->update($requestData);

        Session::flash('flash_message', 'Kotum updated!');

        return redirect('admin/kota');
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
        Kota::destroy($id);

        Session::flash('flash_message', 'Kotum deleted!');

        return redirect('admin/kota');
    }
}
