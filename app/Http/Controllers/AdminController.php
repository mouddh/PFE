<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function administration(){
        return view('dashboard');
    }
    public function home(){
        return view('home');
    }
}
