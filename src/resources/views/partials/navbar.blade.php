@php
    $routes = [
        [
            'url' => 'home',
            'label' => 'Programmazione',
        ],
        [
            'url' => 'dove-siamo',
            'label' => 'Come raggiungerci',
        ],
        [
            'url' => 'info-sala',
            'label' => 'Informazioni Sala',
        ],
        [
            'url' => 'biglietti-promo',
            'label' => 'Biglietti e promo',
        ],
        [
            'url' => 'contatti',
            'label' => 'Contatti',
        ],
    ];
@endphp

<nav>
    <ul class="uppercase">
        @foreach ($routes as $route)
            <li class="{{ request()->routeIs($route['url']) ? 'active' : '' }}">
                <a href="{{ route($route['url']) }}">{{ $route['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>

{{--
    <a href="{{ route('storico') }}">Storico</a>
    <a href="{{ route('lunessai') }}">Lunessai</a>
--}}
