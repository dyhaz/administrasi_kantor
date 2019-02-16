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

    public function crypto_rand_secure($min, $max){
        $range = $max - $min;
        if ($range < 1) return $min;
        //not so random...    //
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1;
        //length in bytes    //
        $bits = (int) $log + 1;
        //length in bits
        $filter = (int) (1 << $bits) - 1;
        //set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
            //discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public function token($length){
        $codeAlpha = "123456789";
        $max = strlen($codeAlpha) - 1;
        $kode_divisi = '00';
        $kode_jabatan = '00';
        $token = $kode_divisi;
        $token .= $kode_jabatan;
        $token .= substr(date('Y'), 1);

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlpha[$this->crypto_rand_secure(0, $max)];
        }
        return $token;
    }

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
            $pegawai = Pegawai::with('kota')
                ->join('kota', 'kota.id', '=', 'pegawai.id_kota')
                ->join('divisi', 'divisi.id', '=', 'pegawai.id_divisi')
                ->where('nip', 'LIKE', "%$keyword%")
                ->orWhere('pegawai.nama', 'LIKE', "%$keyword%")
                ->orWhere('alamat', 'LIKE', "%$keyword%")
                ->orWhere('id_divisi', 'LIKE', "%$keyword%")
                ->orWhere('id_jabatan', 'LIKE', "%$keyword%")
                ->orWhere('jenis_kelamin', 'LIKE', "%$keyword%")
                ->orWhere('no_telp', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_lahir', 'LIKE', "%$keyword%")
                ->orWhere('kota.nama', 'LIKE', "%$keyword%")
                ->orWhere('divisi.nama', 'LIKE', "%$keyword%")
                ->select('pegawai.*')
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
        $reg_no = $this->token(4);

        $check_random = false;
        $check_reg_no = Pegawai::where('nip',$reg_no)->count();

        while(!$check_random)
            if($check_reg_no<1){
                $check_random = true;
            }else{
                $reg_no = $this->token(4);
                $check_reg_no = Pegawai::where('nip',$reg_no)->count();
                $check_random = false;
            }

        return view('admin/pegawai.create')->with('nip', $reg_no);
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
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu']);
        Pegawai::destroy($id);

        Session::flash('flash_message', 'Pegawai deleted!');

        return redirect('admin/pegawai');
    }
}
