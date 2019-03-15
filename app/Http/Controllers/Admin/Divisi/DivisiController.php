<?php

namespace App\Http\Controllers\Admin\Divisi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Session;

class DivisiController extends Controller
{
    const MODEL = Divisi::class;

    protected $validation = [
        'nama' => 'bail|required|unique:divisi|max:50',
        'kode' => 'max:2|numeric',
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
            $divisi = Divisi::where('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $divisi = Divisi::paginate($perPage);
        }

        return view('admin.divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.divisi.create');
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
        
        Divisi::create($requestData);

        Session::flash('flash_message', 'Divisi added!');

        return redirect('admin/divisi');
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
        $divisi = Divisi::findOrFail($id);

        return view('admin.divisi.show', compact('divisi'))->with('slug', $id);
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
        $divisi = Divisi::findOrFail($id);

        return view('admin.divisi.edit', compact('divisi'))->with('slug', $id);
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
        
        $divisi = Divisi::findOrFail($id);
        $divisi->update($requestData);

        Session::flash('flash_message', 'Divisi updated!');

        return redirect('admin/divisi');
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
        Divisi::destroy($id);

        Session::flash('flash_message', 'Divisi deleted!');

        return redirect('admin/divisi');
    }
}
