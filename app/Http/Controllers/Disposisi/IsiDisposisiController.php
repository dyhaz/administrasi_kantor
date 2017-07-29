<?php

namespace App\Http\Controllers\Disposisi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\IsiDisposisi;
use Illuminate\Http\Request;
use Session;

class IsiDisposisiController extends Controller
{
    const MODEL = IsiDisposisi::class;

    protected $validation = [
        'isi' => 'bail|required|max:255',
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
            $isidisposisi = IsiDisposisi::where('isi', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $isidisposisi = IsiDisposisi::paginate($perPage);
        }

        return view('admin.isi-disposisi.index', compact('isidisposisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.isi-disposisi.create');
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
        
        IsiDisposisi::create($requestData);

        Session::flash('flash_message', 'IsiDisposisi added!');

        return redirect('disposisi/isi-disposisi');
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
        $isidisposisi = IsiDisposisi::findOrFail($id);

        return view('admin.isi-disposisi.show', compact('isidisposisi'));
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
        $isidisposisi = IsiDisposisi::findOrFail($id);

        return view('admin.isi-disposisi.edit', compact('isidisposisi'));
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
        
        $isidisposisi = IsiDisposisi::findOrFail($id);
        $isidisposisi->update($requestData);

        Session::flash('flash_message', 'IsiDisposisi updated!');

        return redirect('disposisi/isi-disposisi');
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
        IsiDisposisi::destroy($id);

        Session::flash('flash_message', 'IsiDisposisi deleted!');

        return redirect('disposisi/isi-disposisi');
    }
}
