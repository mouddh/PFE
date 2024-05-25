<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reclamation;

class EngineerController extends Controller
{
    public function index()
    {
        // Get the logged-in engineer
        $engineer = Auth::user();

        // Retrieve reclamations assigned to the engineer
        $reclamations = reclamation::where('engineer_id', $engineer->id)->get();

        // Return the view with the reclamations
        return view('Engineer', compact('reclamations'));
    }
}
