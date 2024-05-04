<?php

namespace App\Http\Controllers;

use App\Models\reclamation;
use Illuminate\Http\Request;

class reclamController extends Controller
{
    //
    public function show(){
        $Data = reclamation::all();
        return view('reclamList',['reclamations'=> $Data]);
    }
    public function storeReclamation(Request $request){
        $incomingFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'attachement' => 'required',
        ]);
        $incomingFields['titre'] = strip_tags($incomingFields['titre']);
        $incomingFields['description'] = strip_tags($incomingFields['description']); 
        
        reclamation::create($incomingFields);
        
        return 'thanks @#$';
    } 
    public function Reclamation(){
        return view('reclamer');
    }
}
