<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CineTeatro Manzoni Merate') }}</title>

    {{-- Font --}}
    @fonts

    {{-- Vite: CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- SIDEBAR (nel partial navbar) --}}
    @include('partials.navbar')

    {{-- HEADER --}}
    <header class="my-4" style="padding-left:260px;">
        @include('partials.header')
    </header>

    {{-- CONTENUTO PRINCIPALE --}}
    <main class="my-4" style="padding-left:260px;">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center my-5" style="padding-left:260px;">
        @include('partials.footer')
    </footer>

</body>
</html>
