@props(['event'])

@php

    setlocale(LC_ALL, 'IT.utf8');

    // Estrai i dati dall'oggetto evento
$title = $event['title'] ?? '';
$type = $event['type'] ?? '';
$dates = $event['dates'] ?? [];
$link = $event['link'] ?? '';

// Determina la label del link in base al type
$linkLabel = $type === 'proiezione' || $type === 'lunessai' ? 'trailer e sinossi' : 'informazioni';

// Ordina le date in ordine cronologico
sort($dates);

// Raggruppa le date per giorno
$groupedDates = [];
foreach ($dates as $dateString) {
    $date = new DateTime($dateString);
    $dayKey = $date->format('Y-m-d'); // Chiave univoca per il giorno
    $time = $date->format('H:i'); // Ora

    if (!isset($groupedDates[$dayKey])) {
        $groupedDates[$dayKey] = [
            'day' => $date,
            'times' => [],
        ];
    }
    $groupedDates[$dayKey]['times'][] = $time;
    }

@endphp


<div class="event-card">
    <div class="image-container">
        <img src="broken-link.jpg" alt="" class="wannabe-image">
        @if ($link)
            <a href="link" class="link">{{ $linkLabel }}</a>
        @endif
    </div>
    <div class="info">
        <h2 class="h2">{{ $title }}</h2>
        <p class="tag uppercase">{{ $type }}</p>

        @foreach ($groupedDates as $group)
            <div class="day">
                <p class="bold">
                    {{ strftime('%A', $group['day']->getTimestamp()) }}
                    {{ $group['day']->format('j') }}
                    {{ strftime('%B', $group['day']->getTimestamp()) }}
                </p>
                @foreach ($group['times'] as $time)
                    <p>ore {{ $time }}</p>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
