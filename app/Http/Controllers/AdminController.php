<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function changeStatus(Request $request, $id){
    //     $request->validate([
    //         'status' => 'required',
    //     ]);
    //     $Datas = reclamation::find($request->id);

    //     $Datas->status = $request->status;
    //     $Datas->update();
    //     return redirect('/TecPage')->with('status','l\'utilisateur a bien ete modifier par succes');
    // }
    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:recus,transmis,traitee',
        ]);

        // Find the reclamation record by ID
        $reclamation = reclamation::findOrFail($id);

        // Update the status
        $reclamation->status = $request->input('status');
        $reclamation->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    
    public function showTecPage(User $user){
        
        $Data = reclamation::all();
        // 'posts'=> $user->posts()->latest()->get()
     return view('technicien',['reclamations' => $Data]);
    }
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
    // public function administration(){
    //     if(Gate::allows('AdminPages',$user)){
    //     return view('dashboard');
    //     }
    //     return 'you cant do that';
    // }
    public function home(User $user){
        // $Data = reclamation::all();
        $reclamations = $user->posts()->latest()->get();
        $postCount = $user->posts()->count();
        
        $transmisCount = $user->posts()->where('status', 'transmis')->count();
        $traiteeCount = $user->posts()->where('status', 'traitee')->count();
        
        return view('home',[
            'username' => $user->username, 
            'posts'=> $reclamations,
            'postCount'=>  $postCount ,
            'transmisCount'=> $transmisCount,
            'traiteeCount'=> $transmisCount,
    ]);
    }
}
