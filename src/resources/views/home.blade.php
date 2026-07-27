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
@endsection
