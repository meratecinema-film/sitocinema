@php

    // dynamic text ??
    $placeholderText = '';
@endphp

@extends('layouts.app')

@section('title', 'Programmazione')

@section('content')
    <h1 class="h1">Programmazione</h1>

    {{-- DEBUG --}}
    {{-- <div>
        <p>@dump($films->toArray())</p>
    </div> --}}

    @if ($films->isEmpty())
        <div class="content-wrapper">
            <p>
                @if ($placeholderText)
                    {{ $placeholderText }}
                @else
                    Al momento non ci sono eventi in programma, torna a trovarci o seguici sui nostri canali social per
                    tutte le novità!
                    {{--
                    Al momento la programmazione è sospesa, grazie per aver preso parte alla stagione di spettacoli,
                    proiezioni
                    ed eventi.
                    Riprenderemo a settembre con la nuova stagione, torna a trovarci e seguici sui nostri canali social per
                    tutte le novità!
                    --}}
                @endif
            </p>

            <img class="events-placeholder" src="https://images.unsplash.com/photo-1542204165-65bf26472b9b" alt="">
            {{-- <img class="events-placeholder" src="https://images.unsplash.com/photo-1538152911114-73f1aa6d6128" alt=""> --}}
        </div>
    @else
        <div class="events">
            @foreach ($films as $film)
                @livewire('show', ['event' => $film], key($loop->index))
            @endforeach
        </div>
    @endif

@endsection
