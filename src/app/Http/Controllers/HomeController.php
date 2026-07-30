<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('home', compact('films') );
        
    }

    public function single(Request $request)
    {
        // $parametri = $request->all();
        $idfilm = $request->input('idfilm');
        return view('single', compact('idfilm'));
    }
}
