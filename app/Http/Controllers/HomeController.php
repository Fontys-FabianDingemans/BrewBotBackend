<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('pages.home');
    }

    public function download(){
        return view('pages.download');
    }

}
