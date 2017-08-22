<?php

namespace App\Http\Controllers\Admin\KlasifikasiArsip;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\KlasifikasiArsip;
use Illuminate\Http\Request;
use Session;

class KlasifikasiArsipController extends Controller
{
    const MODEL = KlasifikasiArsip::class;

    protected $validation = [
        'nama' => 'bail|required|unique:klasifikasi_arsip|max:255',
        'nomor' => 'required|unique:klasifikasi_arsip|max:5',
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
            $klasifikasiarsip = KlasifikasiArsip::where('nomor', 'LIKE', "%$keyword%")
				->orWhere('nama', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $klasifikasiarsip = KlasifikasiArsip::paginate($perPage);
        }

        return view('admin.klasifikasi-arsip.index', compact('klasifikasiarsip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.klasifikasi-arsip.create');
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
        
        KlasifikasiArsip::create($requestData);

        Session::flash('flash_message', 'KlasifikasiArsip added!');

        return redirect('admin/klasifikasi-arsip');
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
        $klasifikasiarsip = KlasifikasiArsip::findOrFail($id);

        return view('admin.klasifikasi-arsip.show', compact('klasifikasiarsip'))->with('slug', $id);
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
        $klasifikasiarsip = KlasifikasiArsip::findOrFail($id);

        return view('admin.klasifikasi-arsip.edit', compact('klasifikasiarsip'))->with('slug', $id);
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
        
        $klasifikasiarsip = KlasifikasiArsip::findOrFail($id);
        $klasifikasiarsip->update($requestData);

        Session::flash('flash_message', 'KlasifikasiArsip updated!');

        return redirect('admin/klasifikasi-arsip');
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
        KlasifikasiArsip::destroy($id);

        Session::flash('flash_message', 'KlasifikasiArsip deleted!');

        return redirect('admin/klasifikasi-arsip');
    }
}
