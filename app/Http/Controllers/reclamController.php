<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class reclamController extends Controller
{
    //test 
    public function assignEngineer(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'engineer_id' => 'required|exists:users,id',
            'status' => 'required|in:transmis',
        ]);

        // Find the reclamation record by ID
        $reclamation = Reclamation::findOrFail($id);

        // Update the status and assign the engineer
        $reclamation->status = $request->input('status');
        $reclamation->engineer_id = $request->input('engineer_id');
        $reclamation->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reclamation assigned successfully!');
    }

    // public function showAssignForm($id)
    // {
    //     // Retrieve the reclamation record
    //     $reclamation = Reclamation::findOrFail($id);

    //     // Retrieve the list of engineers
    //     $engineers = User::where('type', 'engineer')->get(); // Assuming 'role' column distinguishes roles

    //     // Return the view with the reclamation and engineers
    //     return view('assign_engineer', compact('reclamation', 'engineers'));
    // }





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
        $engineers = User::where('type', 'engineer')->get();
        return view('editReclamation',['post'=>$post, 'engineers'=>$engineers]);
    }

    public function delete(reclamation $post){
        if(auth()->user()->cannot('delete', $post)){
            return redirect('/TecPage')->with('success', 'Réclamation supprimée avec succès.');;
        }
        $post->delete();
        if(auth()->user()->type === 'technicien'){
        return redirect('/TecPage')->with('success', 'Réclamation supprimée avec succès.');
            }
        else {
            return redirect('/reclamList/'.auth()->user()->username)->with('success', 'Réclamation supprimée avec succès.');

        }
    }

    public function details(reclamation $post){
        $engineers = User::where('type', 'engineer')->get();
        $post['description'] = Str::markdown($post->description);
        return view('ReclamDetails',['post'=> $post, 'engineers'=>$engineers]);
    }

    public function show(User $user){
        // $Data = reclamation::all();
       
        return view('reclamList',['username' => $user->username, 'posts'=> $user->posts()->latest()->get(), 'postCount'=> $user->posts()->count()]);
    }

    public function storeReclamation(Request $request){
        $incomingFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'attachement' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        $incomingFields['titre'] = strip_tags($incomingFields['titre']);
        $incomingFields['description'] = strip_tags($incomingFields['description']); 
        $incomingFields['user_id'] = auth()->id(); 

        if ($request->hasFile('attachement')) {
            $file = $request->file('attachement');
            $filePath = $file->store('attachements', 'public');
            $incomingFields['attachement'] = $filePath;
        }
        
        $moud = reclamation::create($incomingFields);
        return redirect('/reclamList/'.auth()->user()->username)->with('success', 'Réclamation envoyer avec succès.');
    } 

    public function Reclamation(){
        return view('reclamer');
    }
}
