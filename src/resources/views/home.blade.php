@extends('layouts.app')

@section('title', 'Home')

@section('content')
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