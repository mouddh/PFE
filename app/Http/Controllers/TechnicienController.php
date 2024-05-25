<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
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
        
        // $Data = reclamation::all();
        // 'posts'=> $user->posts()->latest()->get()
        $reclamations = reclamation::orderBy('created_at', 'desc')->get();
     return view('technicien',['reclamations' =>$reclamations]);
    }
}
