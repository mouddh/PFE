<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class reclamController extends Controller
{
    //
    public function Updated(reclamation $post, Request $request){
        $incomingFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'attachement' => 'required',
        ]);
        $incomingFields['titre'] = strip_tags($incomingFields['titre']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);

        $post->update($incomingFields);
        return view('ReclamDetails',['post'=> $post]);
    }
    public function showEditForme(reclamation $post){
        return view('editReclamation',['post'=>$post]);
    }
    public function delete(reclamation $post){
        if(auth()->user()->cannot('delete', $post)){
            return 'you cant do that';
        }
        $post->delete();
        return redirect('/reclamList/'.auth()->user()->username)->withSuccess('success','you reclamation was deleted succesfully');
    }
    public function details(reclamation $post){
        
        $post['description'] = Str::markdown($post->description);
        return view('ReclamDetails',['post'=> $post]);
    }
    public function show(User $user){
        // $Data = reclamation::all();
       
        return view('reclamList',['username' => $user->username, 'posts'=> $user->posts()->latest()->get(), 'postCount'=> $user->posts()->count()]);
    }
    public function storeReclamation(Request $request){
        $incomingFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'attachement' => 'required',
        ]);
        $incomingFields['titre'] = strip_tags($incomingFields['titre']);
        $incomingFields['description'] = strip_tags($incomingFields['description']); 
        $incomingFields['user_id'] = auth()->id(); 
        
        $moud = reclamation::create($incomingFields);
        return redirect("/Details/{$moud->id}");
    } 
    public function Reclamation(){
        return view('reclamer');
    }
}
