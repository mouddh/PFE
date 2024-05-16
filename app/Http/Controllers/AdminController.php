<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function delete(User $user){
        $user->delete();
        return redirect('/admin');
    }
    //
    public function update_user(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $Datas = user::find($request->id);

        if(!$Datas) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        $Datas->username = $request->username;
        $Datas->email = $request->email;
        $Datas->password = $request->password;
        $Datas->update();
        return redirect('/admin')->with('status','l\'utilisateur a bien ete modifier par succes');
    }
    public function update($id)
{
    $Data = User::find($id);
    $parames = [
        'Datas'=>$Data,
    ];
    return view('update' )->with($parames);
}
    public function show(){
        $Data = User::all();
        return view('dashboard',['users'=> $Data]);
    }
    public function administration(){
        return view('dashboard');
    }
    public function home(){
        return view('home');
    }
}
