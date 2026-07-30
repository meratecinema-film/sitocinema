@extends('layouts.app')

@section('title', 'Come raggiungerci')

@section('content')
    <div class="content-wrapper">
        <h1 class="h1">Come raggiungerci</h1>
        <div class="text-block">
            <p>Il Cineteatro Alessandro Manzoni si trova in Via Papa Giovanni XXIII, civico 23, a Merate, in provincia di
                Lecco, situato all'interno dell'Oratorio San Giovanni Bosco - San Filippo Neri.</p>
            <p>C'è ampia disponibilità di parcheggio in zona: sia all'interno della struttura, a disposizione
                anche di altre eventuali attività oratoriane, sia all'esterno lungo la stessa via.</p>
        </div>

        <div class="map" style="margin-block: var(--size-3);">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5573.487128353174!2d9.416239!3d45.696118!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786ae44b0b42bbb%3A0xe1eb03bd181caedf!2sCine%20Teatro%20%22A.%20Manzoni%22!5e0!3m2!1sit!2sus!4v1782808711030!5m2!1sit!2sus"
                width="100%" height="350" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer">
            </iframe>
        </div>
    </div>

@endsection
