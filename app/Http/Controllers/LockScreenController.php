<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LockScreenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get(){
// only if user is logged in
        if(Auth::check()){
            \Session::put('locked', true);

            return view('locked');
        }

        return redirect('/login');
    }

    public function post()
    {
// if user in not logged in
        if(!Auth::check())
            return redirect('/login');

        $password = Input::get('password');

        if(\Hash::check($password,Auth::user()->password)){
            \Session::forget('locked');
            return redirect('/home');
        }

        return back()->withErrors('Password does not match. Please try again.');

    }
}
