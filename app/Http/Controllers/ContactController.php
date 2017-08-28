<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
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
        $this->validate($request, $this->validation);

        $requestData = $request->all();

        Kontak::create($requestData);

        Session::flash('flash_message', 'Your message has been sent');

        return redirect('contact');
    }
}
