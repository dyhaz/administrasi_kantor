<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Support\Facades\Storage;
use Session;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
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
