<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Support\Facades\Storage;
use Session;

class ContactController extends Controller
{
    protected $validation = [
        'email' => 'bail|required|email|max:255',
        'name' => 'required|max:255',
        'message' => 'required',
    ];

    public function index() {
        return view('contact.index');
    }

    public function store(Request $request) {
        $requestData = $request->all();

        $this->validate($request, $this->validation);

        Session::flash('flash_message', 'Your message has been sent');

        return redirect('contact');
    }
}
