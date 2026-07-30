<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cineteatro Manzoni Merate - @yield('title')</title>

    <!-- TBD -->
    <meta property="og:title" content="Cineteatro Manzoni Merate" />
    <meta property="og:image" content={{ asset('/logo.png') }} />
    <meta property="og:logo" content={{ asset('/favicon.ico') }} />


    {{-- Font --}}
    @fonts

    {{-- Vite: CSS + JS --}}
    @vite(['resources/css/bootstrap.css', 'resources/css/reset.css', 'resources/css/custom.css', 'resources/css/layout.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <div class="page-template">
        <div class="content | wrapper">
            {{-- HEADER / NAVBAR --}}
            <div class="header-slot">
                @include('partials.header')
            </div>

            {{-- CONTENUTO PRINCIPALE --}}
            <main>
                @yield('content')
            </main>
        </div>

        {{-- FOOTER --}}
        <div class="footer-slot">
            <div class="wrapper">
                @include('partials.footer')
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
