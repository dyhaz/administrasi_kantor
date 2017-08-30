<?php

namespace App\Http\Controllers\Disposisi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DisposisiTujuan;
use Illuminate\Http\Request;
use Session;

class DisposisiTujuanController extends Controller
{
    const MODEL = DisposisiTujuan::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'ka_upt']);

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $disposisitujuan = DisposisiTujuan::where('id_disposisi', 'LIKE', "%$keyword%")
				->orWhere('id_divisi', 'LIKE', "%$keyword%")
				->orWhere('id_jabatan', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $disposisitujuan = DisposisiTujuan::paginate($perPage);
        }

        return view('disposisi.disposisi-tujuan.index', compact('disposisitujuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'ka_upt']);
        return view('disposisi.disposisi-tujuan.create');
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
        
        DisposisiTujuan::create($requestData);

        Session::flash('flash_message', 'DisposisiTujuan added!');

        return redirect('disposisi/disposisi-tujuan');
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
        $disposisitujuan = DisposisiTujuan::findOrFail($id);

        return view('disposisi.disposisi-tujuan.show', compact('disposisitujuan'))->with('slug', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['su', 'ka_upt']);

        $disposisitujuan = DisposisiTujuan::findOrFail($id);

        return view('disposisi.disposisi-tujuan.edit', compact('disposisitujuan'))->with('slug', $id);
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
        
        $disposisitujuan = DisposisiTujuan::findOrFail($id);
        $disposisitujuan->update($requestData);

        Session::flash('flash_message', 'DisposisiTujuan updated!');

        return redirect('disposisi/disposisi-tujuan');
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
        DisposisiTujuan::destroy($id);

        Session::flash('flash_message', 'DisposisiTujuan deleted!');

        return redirect('disposisi/disposisi-tujuan');
    }
}
