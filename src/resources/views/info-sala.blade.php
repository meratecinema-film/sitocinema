@extends('layouts.app')

@section('title', 'Sala')

@section('content')
    <div class="content-wrapper text-block">
        <h1 class="h1">Informazioni Sala</h1>
        <p>
            L'ampia sala del cineteatro conta 452 posti a sedere e 2 posti riservati a persone con disabilità motorie.
            È possibile accedere all'ingresso del cineteatro tramite una rampa direttamente dal parcheggio interno. Alla
            platea si può accedere senza senza ulteriori dislivelli tramite la porta sinistra della sala, passando dal
            portico dell'Oratorio.
            Sono presenti servizi igienici accessibili sia in fondo alla sala che nel portico appena fuori dal cinema.
        </p>

        <p>
            Per il cinema viene utilizzato un proiettore Sony in 4K per il video e il sistema Dolby Digital per l'audio.
        </p>
        <div class="cinema-images">
            <img src="{{ asset('images/sala-sony-digital-cinema.png') }}" alt="sony digital cinema">
            <img src="{{ asset('images/sala-dolby-digital.png') }}" alt="dolby digital">
        </div>


        <h2 class="h2">Documentazione sala</h2>
        <p>
        <ul class="docs">
            <li>
                <a href="{{ asset('docs/Regolamento_Cineteatro_Manzoni.pdf') }}" target="_blank">
                    Regolamento
                </a>
            </li>
            <li>
                <a href="{{ asset('docs/Scheda_Tecnica_Cineteatro_Manzoni_Merate.pdf') }}" target="_blank">
                    Scheda Tecnica
                </a>
            </li>
        </ul>
        </p>
    </div>

@endsection
