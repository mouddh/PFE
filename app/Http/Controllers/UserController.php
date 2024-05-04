<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{   
    
    public function show(){
    $Data = User::all();
    return view('dashboard',['users'=> $Data]);
}
    public function logout(){
        auth()->logout();
        return redirect('/login')->with('success' ,'you logged out');
    }
    public function Correcthomepage(){
        if ( auth()->check()){
            return view('/home')->with('success' ,'you logged in');

        } else {
            return view('loggedIN');
        }
        
    }
    public function loggedIN() {
        return view('loggedIN');
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required',
        ]);
        if (auth()->attempt(['username'=>$incomingFields['loginusername'],'password'=>$incomingFields['loginpassword'] ])){
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect()->route('logedIn');
        }

    }
    public function register(Request $request) {
       $incomingFields = $request->validate([
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',
      
    ]);
       User::create($incomingFields);
        return 'helo mn register page';
    }
}
