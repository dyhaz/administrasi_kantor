<?php

namespace App\Http\Controllers\Disposisi;

use App\DataTables\DisposisiTujuanDataTable;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disposisi;
use App\Models\DisposisiTujuan;
use App\Models\IsiDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Session;

class DisposisiController extends Controller
{
    const MODEL = Disposisi::class;

    protected $validation = [
        'keterangan' => 'bail|required',
        'id_surat_masuk' => 'required|numeric',
        'status' => 'required|numeric',
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
            $disposisi = Disposisi::with('surat_masuk')->where('nomor', 'LIKE', "%$keyword%")
				->orWhere('id_surat_masuk', 'LIKE', "%$keyword%")
				->orWhere('keterangan', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $disposisi = Disposisi::with('surat_masuk')->paginate($perPage);
        }

        $suratmasuk = SuratMasuk::where('status', '!=', 2)->where('status', '!=', 1)->get();

        return view('disposisi.index', compact('disposisi','suratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'ka_upt']);

        $isidisposisi = IsiDisposisi::orderBy('isi')->pluck('isi','id');

        if($request->get('sm')) {
            $suratmasuk = SuratMasuk::findOrFail($request->get('sm'));
            return view('disposisi.create', compact('suratmasuk'))->with(compact('isidisposisi'));
        }
        return view('disposisi.create')->with(compact('isidisposisi'));
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

        $surat_masuk = SuratMasuk::findOrFail($requestData['id_surat_masuk']);
        $surat_masuk->status = '1';
        $surat_masuk->save();

        $disposisi = Disposisi::create($requestData);

        foreach($requestData['isi_disposisi'] as $id_isi_diposisi) {
            $disposisi->isi_disposisi()->attach($id_isi_diposisi);
        }

        Session::flash('flash_message', 'Disposisi added!');

        return redirect('/disposisi-tujuan/'.$disposisi->id);
        //return redirect('disposisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id, DisposisiTujuanDataTable $dataTable)
    {
        $disposisi = Disposisi::with('surat_masuk')->with('isi_disposisi')->findOrFail($id);

        $disposisitujuan = DisposisiTujuan::with('disposisi')->where(['id_disposisi' => $disposisi->id])->get();

        $slug = $id;

        return $dataTable->forIdDisposisi($disposisi->id)->render('disposisi.show', compact('disposisi', 'slug'));

        //return view('disposisi.show', compact('disposisi'))->with(compact('disposisitujuan'));
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

        $disposisi = Disposisi::with('surat_masuk')->with('isi_disposisi')->findOrFail($id);

        $disposisi_isi = [];
        foreach($disposisi['isi_disposisi'] as $isi) {
            $disposisi_isi[] = $isi['id'];
        }

        $isidisposisi = IsiDisposisi::orderBy('isi')->pluck('isi','id');

        return view('disposisi.edit', compact('disposisi'))->with(compact('isidisposisi'))
            ->with('disposisi_isi', $disposisi_isi)->with('slug', $id);
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
        
        $disposisi = Disposisi::with('surat_masuk')->findOrFail($id);
        $disposisi->update($requestData);

        $disposisi->isi_disposisi()->detach();

        if(is_array(@$requestData['isi_disposisi'])) {
            foreach(@$requestData['isi_disposisi'] as $id_isi_diposisi) {
                $disposisi->isi_disposisi()->attach($id_isi_diposisi);
            }
        }

        Session::flash('flash_message', 'Disposisi updated!');

        return redirect('/disposisi-tujuan/'.$disposisi->id);
        //return redirect('disposisi');
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
        $request->user()->authorizeRoles(['su', 'ka_upt']);
        Disposisi::destroy($id);

        Session::flash('flash_message', 'Disposisi deleted!');

        return redirect('disposisi/disposisi');
    }
}
