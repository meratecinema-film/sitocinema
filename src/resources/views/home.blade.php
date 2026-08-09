@php

    // dynamic text ??
    $placeholderText = '';

    // MOCK EVENTS
    $events = [
        //[
        //    'title' => 'Belfast',
        //    'type' => 'proiezione',
        //    'dates' => [
        //        '2026-07-29T15:00:00.000Z',
        //        '2026-07-29T21:00:00.000Z',
        //        '2026-09-25T21:00:00.000Z',
        //        '2026-09-26T21:00:00.000Z',
        //        '2026-09-27T15:00:00.000Z',
        //        '2026-09-27T21:00:00.000Z',
        //        '2026-10-02T21:00:00.000Z',
        //        '2026-10-03T21:00:00.000Z',
        //        '2026-10-04T15:00:00.000Z',
        //        '2026-10-04T21:00:00.000Z',
        //    ],
        //    'link' => 'https://website.com',
        //],
        //[
        //    'title' => 'One life',
        //    'type' => 'lunessai',
        //    'dates' => ['2026-09-28T15:00:00.000Z', '2026-09-28T21:00:00.000Z'],
        //    'link' => 'https://website.com',
        //],
        //[
        //    'title' => 'C\'è ancora domani',
        //    'type' => 'proiezione',
        //    'dates' => [
        //        '2026-10-02T21:00:00.000Z',
        //        '2026-10-03T21:00:00.000Z',
        //        '2026-10-04T15:00:00.000Z',
        //        '2026-10-04T21:00:00.000Z',
        //    ],
        //    'link' => 'https://website.com',
        //],
        //[
        //    'title' => 'Concerto di Natale - Banda Sociale Meratese',
        //    'type' => 'spettacolo',
        //    'dates' => ['2026-12-17T21:00:00.000Z'],
        //    'link' => null,
        //],
        //[
        //    'title' => 'Enrico Bertolino - Instant Theatre',
        //    'type' => 'teatro',
        //    'dates' => ['2026-02-03T21:00:00.000Z'],
        //    'link' => 'https://website.com',
        //],
    ];
@endphp

@extends('layouts.app')

@section('title', 'Programmazione')

@section('content')
    <h1 class="h1">Programmazione</h1>
    <div>
        @if ($films->isEmpty())
            <p>No films found.</p>
        @else
            <ul>
            @foreach($films as $film)

                <h2>{{ $film['film']['title'] }}</h2>
                <p>{{ $film['film']['description'] }}</p>

                <strong>Event type:</strong> {{ $film['eventtype']['name'] }}

                {{-- Ciclo delle date --}}
                @if(!empty($film['dates']))
                    <ul>
                        @foreach($film['dates'] as $d)
                            <li>
                                {{ $d['date'] }} {{ $d['time'] }}
                                @if(!empty($d['spec']))
                                    — {{ $d['spec']['name'] }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Nessuna data disponibile.</p>
                @endif

            @endforeach

            </ul>
        @endif
        
        <p>@dump($films->toArray())</p> 

    </div>

    @if ($films->isEmpty())
        <div class="content-wrapper">
            <p>
                @if ($placeholderText)
                    {{ $placeholderText }}
                @else
                    Al momento la programmazione è sospesa, grazie per aver preso parte alla stagione di spettacoli,
                    proiezioni
                    ed eventi.
                    Riprenderemo a settembre con la nuova stagione, torna a trovarci e seguici sui nostri canali social per
                    tutte le novità!
                @endif
            </p>

            <img class="events-placeholder" src="https://images.unsplash.com/photo-1542204165-65bf26472b9b" alt="">
            {{-- <img class="events-placeholder" src="https://images.unsplash.com/photo-1538152911114-73f1aa6d6128" alt=""> --}}
        </div>
    @else
        <div class="events">

            @foreach ($films as $film)
                {{-- @livewire('show', ['event' => $film], key($loop->index)) --}}
            @endforeach
        </div>
    @endif

@endsection
