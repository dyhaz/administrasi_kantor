<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UbahPasswordController extends Controller
{
    public function index(Request $request) {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu', 'ka_subbag_tu',
            'staf_seksi_pengujian_dan_pengendalian_mutu', 'ka_seksi_pengujian_dan_pengendalian_mutu', 'ka_upt']);
        return view('ubah_password');
    }

    public function post(Request $request) {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $user = $request->user();

        if($user) {
            $user->password = bcrypt($request->get('password'));
            $user->save();
        }

        return redirect()->route('profile');
    }
}
