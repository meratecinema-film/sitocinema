<?php

use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component {
    public $event;
    public $expanded = false;
    public $maxDayCount = 3;
    public $type;
    public $link;
    public $linkLabel;

    // dates grouped by day
    public $groupedDates = [];

    #[Computed]
    public function dateList()
    {
        setlocale(LC_ALL, 'IT.utf8');

        return $this->expanded ? $this->groupedDates : array_slice($this->groupedDates, 0, $this->maxDayCount);
    }

    public function toggle()
    {
        $this->expanded = !$this->expanded;
    }

    public function mount()
    {
        setlocale(LC_ALL, 'IT.utf8');

        $this->type = $this->event['type'] ?? '';
        $this->link = $this->event['link'] ?? '';
        $this->linkLabel = $this->type === 'proiezione' || $this->type === 'lunessai' ? 'trailer e sinossi' : 'informazioni';

        $dates = $this->event['dates'];
        // filter dates, keep only future dates
        $dates = array_filter($dates, function ($d) {
            return $this->futureDates($d);
        });

        sort($dates);

        foreach ($dates as $dateString) {
            $date = new DateTime($dateString);
            $dayKey = $date->format('Y-m-d'); // unique day key
            $time = $date->format('H:i'); // time

            if (!isset($this->groupedDates[$dayKey])) {
                $this->groupedDates[$dayKey] = [
                    'day' => $date,
                    'times' => [],
                ];
            }
            $this->groupedDates[$dayKey]['times'][] = $time;
        }
    }

    private function futureDates($d)
    {
        $today = now();

        return $d > $today;
    }
};
?>


<div class="event-card" x-data="{ event: @js($event) }">
    <div class="image-container">
        <template x-if="event.image">
            <img :src="event.image" alt="">
        </template>
        <template x-if="!event.image">
            <div class="poster-placeholder"></div>
        </template>
        @if ($link)
            <a href="{{ $link }}" class="link" target="_blank">{{ $linkLabel }}</a>
        @endif
    </div>
    <div class="info">
        <h2 class="h2" x-text="event.title"></h2>
        <p class="tag uppercase" x-text="event.type"></p>

        @foreach ($this->dateList as $group)
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


        @if (count($groupedDates) > $maxDayCount)
            <button wire:click="toggle" class="show-more-toggle button-link text-small">
                @if ($expanded)
                    <span>nascondi</span>
                @else
                    <span>mostra altre date</span>
                @endif
            </button>
        @endif
    </div>
</div>
