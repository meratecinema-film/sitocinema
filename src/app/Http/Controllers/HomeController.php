<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        //  $films = Film::all();
        $today = Carbon::today();

        $films = Film::query()
            // 1. Seleziona SOLO le colonne della tabella films
            ->select([
                'films.id',
                'films.title',
                'films.description',
                'films.poster',
                'films.eventtype_id',
                'films.trailer',
                'films.year',
                'films.visible_from',
                'films.visible_until',
                'films.duration',
            ])
            
            // 2. Aggiunge la sottoquery come colonna EXTRA (addSelect)
            ->addSelect([
                'first_show_at' => function ($query) use ($today) {
                    $query->from('shows')
                        // DENTRO QUESTA SUBQUERY va estratto SOLO il CONCAT (1 colonna!)
                        ->selectRaw("CONCAT(date, ' ', time)")
                        ->whereColumn('shows.film_id', 'films.id')
                        ->where('shows.date', '>=', $today)
                        ->orderBy('shows.date', 'asc')
                        ->orderBy('shows.time', 'asc')
                        ->limit(1);
                }
            ])

            // 3. Filtra solo i film con spettacoli futuri
            ->whereHas('shows', function ($query) use ($today) {
                $query->where('date', '>=', $today);
            })
            
            // 4. Ordina e limita
            ->orderBy('first_show_at', 'asc')
            ->take(6)
            
            // 5. Eager Loading con campi espliciti per le relazioni
            ->with([
                'eventType' => function ($query) {
                    $query->select(['id', 'name']);
                },
                'shows' => function ($query) use ($today) {
                    $query->select(['id', 'film_id', 'showspec_id', 'date', 'time'])
                          ->where('date', '>=', $today)
                          ->orderBy('date', 'asc')
                          ->orderBy('time', 'asc')
                          ->with(['showSpec' => function ($query) {
                              $query->select(['id', 'name']);
                          }]);
                }
            ])
            ->get();

        return view('home', compact('films') );
        
    }

    public function single(Request $request)
    {
        // $parametri = $request->all();
        $idfilm = $request->input('idfilm');
        return view('single', compact('idfilm'));
    }
}
