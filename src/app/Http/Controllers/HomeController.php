<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Carbon;
use App\Models\Show;

class HomeController extends Controller
{
     
    public function index()
    {
        $films = DB::table('view_prossimifilm as VV')
            ->join('films as F', 'VV.id', '=', 'F.id')
            ->join('eventtypes as ET', 'F.eventtype_id', '=', 'ET.id')
            ->leftJoin('shows as S', function ($join) {
                $join->on('F.id', '=', 'S.film_id')
                    ->whereRaw('COALESCE(S.date, NOW()) >= NOW()');
            })
            ->leftJoin('showspecs as SS', 'S.showspec_id', '=', 'SS.id')
            ->select([
                'ET.name as ETname',
                'ET.description as ETdescription',
                'ET.color as ETcolor',

                'VV.refdate',

                'F.title as Ftitle',
                'F.description as Fdescription',
                'F.duration as Fduration',
                'F.poster as Fposter',
                'F.trailer as Ftrailer',
                'F.year as Fyear',

                'S.date as Sdate',
                'S.time as Stime',

                'SS.name as SSname',
                'SS.description as SSdescription',
                'SS.icon as SSicon',
            ])
            ->orderBy('VV.refdate')
            ->orderBy('S.date')
            ->orderBy('S.time')
            ->get();



        return view('home', compact('films'));
    }

    public function single(Request $request)
    {
        // $parametri = $request->all();
        $idfilm = $request->input('idfilm');
        return view('single', compact('idfilm'));
    }
}
