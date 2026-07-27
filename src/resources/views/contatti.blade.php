@extends('layouts.app')

@section('title', 'Contatti')

@section('content')
    <div class="content-wrapper">
        <h1 class="h1">Contatti</h1>
        <p>Contattaci</p>
        <p>+39 039 990 8482 ??</p>
        <!--<a href="tel:039 990 8482">+39 039 990 8482</a>-->
        <p><a href="mailto:meratecinema@gmail.com">meratecinema@gmail.com</a></p>

        </br>

        <p>Seguici sui nostri social per non perdere gli aggiornamenti sulla nostra programmazione oppure iscriviti alla
            nostra newsletter settimanale per riceve le proiezioni del weekend.</p>
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
