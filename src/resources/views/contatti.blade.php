@extends('layouts.app')

@section('title', 'Contatti')

@section('content')
    <div class="content-wrapper">
        <h1 class="h1">Contatti</h1>
        {{-- <p>+39 039 990 8482 ??</p> --}}
        {{-- <a href="tel:039 990 8482">+39 039 990 8482</a> --}}
        <p>
            Per richieste o informazioni sulla sala e sul cineteatro è possibile scrivere all'indirizzo
            <a href="mailto:meratecinema@gmail.com">meratecinema@gmail.com</a>.
        </p>
        </br>

        <p>
            Seguici sui nostri canali social per tutte le novità sulla nostra programmazione, gli spettacoli e le
            proiezioni della settimana.
        </p>

        <div class="contact-social-list">
            <a href="https://it-it.facebook.com/cineteatro.manzoni" target="_blank">
                <img src="{{ asset('images/social-facebook.png') }}" alt="facebook">
                <span>Pagina Facebook</span>
            </a>
            <a href="https://www.instagram.com/cinemamanzonimerate/" target="_blank">
                <img src="{{ asset('images/social-instagram.png') }}" alt="instagram">
                <span>Profilo Instagram</span>
            </a>
        </div>

    </div>
@endsection
