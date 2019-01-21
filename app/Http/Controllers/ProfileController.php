<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

class ProfileController extends Controller
{
    public function index() {
        if (empty(Auth::user()->pegawai)) {
            return abort(404);
        }

        return view('profile.index')->with('pegawai', @Auth::user()->pegawai);
    }

    public function store(Request $request) {
        $requestData = $request->all();
        $pegawai = Auth::user()->pegawai;
        $pegawai->nama = $requestData['nama'];
        $pegawai->alamat = $requestData['alamat'];
        $pegawai->jenis_kelamin = $requestData['jenis_kelamin'];
        $pegawai->id_kota = $requestData['id_kota'];
        $pegawai->tanggal_lahir = $requestData['tanggal_lahir'];
        $pegawai->no_telp = $requestData['no_telp'];
        $pegawai->save();

        return redirect('/profile');

    }

    public function uploadPhoto(Request $request) {

        $validation = [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $this->validate($request, $validation);
        
        if ($request->file('file')) {

            /**
             * Check if there is any image uploaded in last 1 hour
             */
            $count = \DB::table('pegawai')
                ->where('updated_at', '>=', \Carbon\Carbon::now()->subHour())
                ->whereNotNull('foto')
                ->where('id_user', $request->user()->id)->count();
            if($count > 0) {
                Session::flash('flash_message', 'Please try again later');
            } else {
                $uploadPath = 'public/images';
                $fileName = $request->file('file')->store($uploadPath);
                $user = $request->user();

                if($user) {
                    $pegawai = $user->pegawai;
                    $pegawai->foto = str_replace('public/', '', $fileName);
                    $pegawai->save();
                }

                Session::flash('flash_message', 'Profile updated!');
            }

            //return response('An image has been uploaded', 200);
            return redirect('/profile');
        }
        return response('Please try again later', 500);
    }
}
