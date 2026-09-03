@extends('layouts.app')

@section('title', 'Sala')

@section('content')
    <div class="content-wrapper text-block">
        <h1 class="h1">Informazioni Sala</h1>
        {{--
        <p>
            Dal ??? gruppo di volontari? Sala della comunità?<br />
            Ospita eventi, spettacoli teatrali e proiezioni cinematogratiche.<br />
            Nel 2005 nasce <span class="italic">Lunessai</span>, la rassegna dedicata al cinema d'autore, che seleziona e
            propone film d'essai il lunedì, con proiezioni talvolta accompagnate da presentazioni tenute da esperti e
            studiosi di cinema o incontri con attori o registi.
        </p>
        --}}
        <p>
            L'ampia sala del cineteatro conta 452 posti a sedere e 2 riservati a persone con disabilità motorie.
            È possibile accedere all'ingresso del cineteatro tramite una rampa direttamente dal parcheggio interno.
            L'accesso alla platea può avvenire senza ulteriori dislivelli, così come ai servizi igienici, anch'essi
            accessibili, di cui è dotata.
        </p>

        <p>
            Il cinema è fornito di un proiettore Sony in 4K per il video e del sistema Dolby Digital per l'audio.
        </p>
        <div class="cinema-images">
            <img src="{{ asset('images/sala-sony-digital-cinema.png') }}" alt="sony digital cinema">
            <img src="{{ asset('images/sala-dolby-digital.png') }}" alt="dolby digital">
        </div>


        <section class="docs">
            <h2 class="h2">Documentazione</h2>
            <p>
                Su richiesta la sala del Cineteatro può essere affittata per spettacoli ed eventi rispettando le indicazioni
                contenute nel regolamento.
            </p>
            <p>
            <ul>
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
        </section>
    </div>

@endsection
