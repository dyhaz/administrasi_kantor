<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CobaController extends Controller
{
    public function index() {
        return view('coba');
    }

    public function coba() {
        return view('welcome');
    }
}
