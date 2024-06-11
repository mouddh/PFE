<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // // Import necessary namespaces




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
        $engineer = Auth::user();
        if ($user->type == 'engineer') {
            $userReclamations = reclamation::where('engineer_id', $engineer->id)->get();
            $postCount = $userReclamations->count();
            $transmisCount = $userReclamations->where('status', 'transmis')->count();
            $traiteeCount = $userReclamations->where('status', 'traitee')->count();
        } else {
            $userReclamations = $user->posts()->latest()->get();
            $postCount = $user->posts()->count();
            $transmisCount = $user->posts()->where('status', 'transmis')->count();
            $traiteeCount = $user->posts()->where('status', 'traitee')->count();
            $rejeteeCount = $user->posts()->where('status', 'rejetée')->count();
            
        }

        // user reclamations count
        $reclamations = $user->posts()->latest()->get();
        

        // all reclamations count
        $totalReclamations = Reclamation::count();

    
        $reclamations = Reclamation::latest()->get();
        $AllenvoyerCount = Reclamation::where('status', 'envoyer')->count();
        $AlltransmisCount = Reclamation::where('status', 'transmis')->count();
        $AlltraiteeCount = Reclamation::where('status', 'traitee')->count();
        $AllrejeteeCount = Reclamation::where('status', 'rejetée')->count();

        $reclamationsData = [
            'envoyer' => $totalReclamations,
            'transmis' => $AlltransmisCount,
            'traitee' => $AlltraiteeCount,
            'rejetee' => $AllrejeteeCount,
        ];
        
        return view('home',compact('reclamationsData'),[
            'username' => $user->username, 
            'posts'=> $userReclamations,
            'postCount'=>  $postCount ,
            'transmisCount'=> $transmisCount,
            'traiteeCount'=> $traiteeCount,
            'rejeteeCount'=>   $rejeteeCount,
            'Allenvoyer'=> $totalReclamations,
            'Alltransmis'=> $AlltransmisCount,
            'Alltraitee'=> $AlltraiteeCount,
            'Allrejetee'=>  $AllrejeteeCount,
            'Allreclamations'=> $totalReclamations,
    ]);
    }
}
