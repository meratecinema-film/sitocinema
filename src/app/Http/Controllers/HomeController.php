<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1) QUERY
        $rows = DB::table('view_prossimifilm as VV')
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

                'F.id as Fid',
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

        // 2) RAGGRUPPAMENTO
        $films = [];

        foreach ($rows as $row) {
            $fid = $row->Fid;

            if (!isset($films[$fid])) {
                $films[$fid] = [
                    'eventtype' => [
                        'name' => $row->ETname,
                        'description' => $row->ETdescription,
                        'color' => $row->ETcolor,
                    ],
                    'film' => [
                        'id' => $fid,
                        'refdate' => $row->refdate,
                        'title' => $row->Ftitle,
                        'description' => $row->Fdescription,
                        'duration' => $row->Fduration,
                        'poster' => $row->Fposter,
                        'trailer' => $row->Ftrailer,
                        'year' => $row->Fyear,
                    ],
                    'dates' => [],
                ];
            }

            if ($row->Sdate) {
                $films[$fid]['dates'][] = [
                    'date' => $row->Sdate,
                    'time' => $row->Stime,
                    'spec' => [
                        'name' => $row->SSname,
                        'description' => $row->SSdescription,
                        'icon' => $row->SSicon,
                    ],
                ];
            }
        }

        // 3) ORDINA LE DATE DI OGNI FILM
        foreach ($films as &$film) {
            usort($film['dates'], fn($a, $b) =>
                strcmp($a['date'].$a['time'], $b['date'].$b['time'])
            );
        }

        // 4) ORDINA I FILM PER REFDATA
        uasort($films, fn($a, $b) =>
            strcmp($a['film']['refdate'], $b['film']['refdate'])
        );

        // 5) CONVERTI IN COLLECTION
        $films = collect($films);

        return view('home', compact('films'));
    }


    public function single(Request $request)
    {
        $idfilm = $request->input('idfilm');
        return view('single', compact('idfilm'));
    }
}
