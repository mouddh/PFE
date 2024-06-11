<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{   
    

    public function Profile(Request $request){
        return view('Profile');
    }
    public function updateTelephone(Request $request)
    {
        $request->validate([
            'telephone' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->telephone = $request->telephone;
        $user->save();

        return redirect('/profile')->with('success', 'Numéro de téléphone mis à jour avec succès.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Mot de passe mis à jour avec succès.');
    }

    



    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function Correcthomepage(){
        if ( auth()->check()){
            return view('/homepage')->with('success' ,'you logged in');

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
            if(auth()->user()->type === 'client'){
                return redirect('/home/'.auth()->user()->username);
            } elseif (auth()->user()->type === 'technicien') {
                return redirect('/TecPage');
            }
             elseif (auth()->user()->type === 'admin') {
                return redirect('/admin');
            }
            elseif (auth()->user()->type === 'engineer') {
                return redirect('engineer/reclamations');
            }
            
        else{
            return  'fuck you';
        }

        }
    }
    public function register(Request $request) {
       $incomingFields = $request->validate([
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',
        'telephone' => 'required',
        'type' => 'required',
      
    ]);
       User::create($incomingFields);
        return redirect('/admin')->with('success',"l'utiisateur a bien ete ajouter");
    }
}

