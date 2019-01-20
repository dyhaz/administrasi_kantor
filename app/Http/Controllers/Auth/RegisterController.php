<?php

namespace App\Http\Controllers\Auth;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Kota;
use App\Models\Pegawai;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    public function showRegistrationForm()
    {
        $list_kota = Kota::orderBy('id')->pluck('nama','id');
        $list_jabatan = Jabatan::orderBy('id')->pluck('nama', 'id');
        $list_divisi = Divisi::orderBy('id')->pluck('nama', 'id');
        return view('auth.register')->with('list_kota', $list_kota)->with('list_jabatan', $list_jabatan)
            ->with('list_divisi', $list_divisi);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'jenis_kelamin' => 'required|max:1',
            'tanggal_lahir' => 'date',
            'no_telp' => 'required|max:100',
            'alamat' => 'required|max:1000',
            'id_divisi' => 'numeric',
            'id_jabatan' => 'numeric',
            'id_kota' => 'numeric'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->roles()->attach(Role::where('name', 'su')->first());

        $data['id_user'] = $user->id;
        $data['nama'] = $data['name'];
        $data['nip'] = time();

        $pegawai = Pegawai::create($data);
        return $user;
    }
}
