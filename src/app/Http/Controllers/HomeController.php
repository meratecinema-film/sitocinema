<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $test = 'ciccio pasticcio';
        return view('home', compact('test') );
    }

    public function single(Request $request)
    {
        // $parametri = $request->all();
        $idfilm = $request->input('idfilm');
        return view('single', compact('idfilm'));
    }
}
