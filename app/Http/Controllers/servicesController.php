<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    public function delete(Service $id){
        $id->delete();
        return redirect('/services');
    }
    public function ajoutSer(){
        return view('ajouterService');
    }
    public function services(){
        $Data = Service::all();
        return view('services',['services'=> $Data]);
    }
    
    public function ajouter(Request $request){
        $incomingFields = $request->validate([
            'titre' => 'required',
        ]);
        $incomingFields['titre'] = strip_tags($incomingFields['titre']); 
        
        $moud = service::create($incomingFields);
        return redirect('/services')->with('success','le service a bien ete ajouter');
    } 
}
