@php

    $tickets = [
        [
            'label' => 'Intero festivo',
            'price' => 7,
        ],
        [
            'label' => 'Intero prefestivo',
            'price' => 6,
        ],
        [
            'label' => 'Ridotto',
            'price' => 5,
        ],
    ];

    $ticketsLunessai = [
        [
            'label' => 'Intero serale',
            'price' => 5,
        ],
        [
            'label' => 'Intero pomeridiano e ridotto',
            'price' => 4,
        ],
    ];

@endphp

@extends('layouts.app')

@section('title', 'Biglietti e promozioni')

@section('content')
    <div class="content-wrapper">
        <h1 class="h1">Biglietti e promozioni</h1>
        <p>
            I biglietti per i film in programmazione sono acquistabili direttamente presso il cineteatro prima della
            proiezione.
            È possibile pagare in contanti o con carta, sono accetate quelle dei principali circuiti (Bancomat, Visa e
            Mastercard).
        </p>

        <div class="prices">
            <div class="tickets">
                <p class="bold">Prezzi proiezioni film</p>
                @foreach ($tickets as $ticket)
                    <p class="ticket-line">
                        <span class="label">{{ $ticket['label'] }}</span>
                        <span class="price">{{ number_format($ticket['price'], 2, ',') }} €</span>
                    </p>
                @endforeach
            </div>
            <div class="tickets">
                <p class="bold">Prezzi rassegna Lunessai</p>
                @foreach ($ticketsLunessai as $ticket)
                    <p class="ticket-line">
                        <span class="label">{{ $ticket['label'] }}</span>
                        <span class="price">{{ number_format($ticket['price'], 2, ',') }} €</span>
                    </p>
                @endforeach
            </div>
            <p>
                Il biglietto ridotto si applica alle persone con meno di 12 anni e con più di 65.
            </p>

            <p>
                Per i biglietti degli spettacoli inclusi nella stagione teatrale fare riferimento al <a
                    href="https://www.duepuntisrl.it/merate-stagione-teatrale-2026-27" target="_blank">sito dedicato</a>.
            </p>
        </div>

        <div class="promo">
            <div class="promo-fidaty">
                <img src="{{ asset('images/promo-cinema-fidaty-esselunga.png') }}" alt="al-cinema-con-fidaty">
                <div>
                    <p>
                        È possibile ottenere biglietti validi per l'ingresso alle proiezioni anche attraverso l'uso dei
                        punti
                        Fidaty della campagna Esselunga.

                        Per maggiori informazioni visita
                        <a href="https://lombardiaspettacolo.com/18m/al-cinema-con-fidaty" target="_blank">
                            {{-- <a href="https://www.esselunga.it/it-it/fidaty/le-carte/al-cinema-con-fidaty.html" target="_blank"> --}}
                            il sito dedicato all'iniziativa</a>.
                    </p>
                </div>
            </div>
        </div>

    </div>


@endsection
