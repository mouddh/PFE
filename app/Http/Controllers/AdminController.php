<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function update($id)
{
    $Data = User::find($id);
    $parames = [
        'Datas'=>$Data,
    ];
    return view('update' )->with($parames);
}
    public function administration(){
        return view('dashboard');
    }
    public function home(){
        return view('home');
    }
}
