<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Session;

class PegawaiController extends Controller
{

    const MODEL = Pegawai::class;

    protected $validation = [
        'nip' => 'bail|required|unique:pegawai|max:255',
        'nama' => 'required|max:100',
        'jenis_kelamin' => 'required|max:1',
        'tanggal_lahir' => 'date',
        'id_divisi' => 'numeric',
        'id_jabatan' => 'numeric',
        'id_kota' => 'numeric',
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
            $pegawai = Pegawai::with('kota')->where('nip', 'LIKE', "%$keyword%")
				->orWhere('nama', 'LIKE', "%$keyword%")
				->orWhere('alamat', 'LIKE', "%$keyword%")
				->orWhere('id_divisi', 'LIKE', "%$keyword%")
				->orWhere('id_jabatan', 'LIKE', "%$keyword%")
				->orWhere('jenis_kelamin', 'LIKE', "%$keyword%")
				->orWhere('no_telp', 'LIKE', "%$keyword%")
				->orWhere('tanggal_lahir', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $pegawai = Pegawai::with('kota')->paginate($perPage);
        }

        return view('admin/pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/pegawai.create');
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
        
        Pegawai::create($requestData);

        Session::flash('flash_message', 'Pegawai added!');

        return redirect('admin/pegawai');
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
        $pegawai = Pegawai::with('kota')->with('jabatan')->with('divisi')->findOrFail($id);

        return view('admin/pegawai.show', compact('pegawai'))->with('slug', $id);
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
        $pegawai = Pegawai::findOrFail($id);

        return view('admin/pegawai.edit', compact('pegawai'))->with('slug', $id);
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
        $validation = $this->validation;
        $validation['nip'] = 'required';
        $this->validate($request, $validation);

        $requestData = $request->all();
        
        $pegawai = Pegawai::with('kota')->with('jabatan')->with('divisi')->findOrFail($id);
        $pegawai->update($requestData);

        Session::flash('flash_message', 'Pegawai updated!');

        return redirect('admin/pegawai');
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
        Pegawai::destroy($id);

        Session::flash('flash_message', 'Pegawai deleted!');

        return redirect('admin/pegawai');
    }
}
