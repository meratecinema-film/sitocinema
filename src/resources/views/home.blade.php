@php
    $events = [
        [
            'title' => 'Belfast',
            'type' => 'proiezione',
            'dates' => [
                '2026-09-25T21:00:00.000Z',
                '2026-09-26T21:00:00.000Z',
                '2026-09-27T15:00:00.000Z',
                '2026-09-27T21:00:00.000Z',
            ],
            'link' => 'https://website.com',
        ],
        [
            'title' => 'One life',
            'type' => 'lunessai',
            'dates' => ['2026-09-28T15:00:00.000Z', '2026-09-28T21:00:00.000Z'],
            'link' => 'https://website.com',
        ],
        [
            'title' => 'C\'è ancora domani',
            'type' => 'proiezione',
            'dates' => [
                '2026-10-02T21:00:00.000Z',
                '2026-10-03T21:00:00.000Z',
                '2026-10-04T15:00:00.000Z',
                '2026-10-04T21:00:00.000Z',
            ],
            'link' => 'https://website.com',
        ],
        [
            'title' => 'Concerto di Natale - Banda Sociale Meratese',
            'type' => 'spettacolo',
            'dates' => ['2026-12-17T21:00:00.000Z'],
            'link' => null,
        ],
        [
            'title' => 'Enrico Bertolino - Instant Theatre',
            'type' => 'teatro',
            'dates' => ['2026-02-03T21:00:00.000Z'],
            'link' => 'https://website.com',
        ],
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
                @foreach ($films as $film)
                    <li>{{ $film->title }}</li>
                @endforeach
            </ul>
        @endif
        <p>@dump($films->toArray())</p>
    </div>
    <button class="btn btn-primary">Test</button>


    <div class="events">
        @foreach ($events as $event)
            <x-show-single :event="$event"></x-show-single>
        @endforeach
    </div>
@endsection
