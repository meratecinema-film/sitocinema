<?php

use Carbon\Carbon;
use Livewire\Component;

new class extends Component {
    public $event;

    public $expanded = false;
    public $maxDaysShownByDefault = 3;

    public $posterImage;
    public $trailerLink;
    public $linkLabel;
    public $eventTypeLabel;

    // dates grouped by day
    public $groupedDates = [];
    public $allDates = [];

    public function mount()
    {
        $this->trailerLink = $this->event['film']['trailer'] ?? '';
        $this->posterImage = $this->event['film']['poster'] ?? '';

        $type = $this->event['eventtype'];
        $this->eventTypeLabel = $type['name'] ?? '';
        $this->linkLabel = $type['name'] === 'Lunessai' || $type['name'] === 'Film' ? 'trailer e sinossi' : 'informazioni';

        foreach ($this->event['dates'] as $show) {
            $date = new DateTime($show['date'] . ' ' . $show['time']);
            $dayKey = $date->format('Y-m-d'); // unique day key
            $day = Carbon::parse($date)->locale('it')->isoFormat('dddd D MMMM');
            $time = Carbon::parse($date)->locale('it')->isoFormat('HH:mm');
            $special = $show['spec']['name'] ?? '';

            if (!isset($this->groupedDates[$dayKey])) {
                $this->groupedDates[$dayKey] = [
                    'day' => $day,
                    'times' => [],
                ];
            }
            $this->groupedDates[$dayKey]['times'][] = [
                'hour' => $time,
                'special' => $special,
            ];
        }

        $this->allDates = array_values($this->groupedDates);
    }
};
?>


<div class="event-card" x-data="{
    event: @js($event),
    allDates: @js($allDates),
    maxDefaultDates: @js($maxDaysShownByDefault),
    exp: false,
    get dateList() {
        return this.exp ? this.allDates : this.allDates.slice(0, this.maxDefaultDates);
    },
}">
    <div class="image-container">
        @if ($posterImage)
            <img src="{{ $posterImage }}" alt="">
        @else
            <div class="poster-placeholder"></div>
        @endif

        @if ($trailerLink)
            <a href="{{ $trailerLink }}" class="link" target="_blank">{{ $linkLabel }}</a>
        @endif
    </div>
    <div class="info">
        <p class="tag">
            <span class="uppercase">{{ $eventTypeLabel }}</span>
            <template x-if="event.film.duration">
                <span>- {{ $event['film']['duration'] }} minuti</span>
            </template>
        </p>
        <h2 class="h2">{{ $event['film']['title'] }}</h2>

        <template x-if="!dateList.length">
            <div class="day">
                <p class="uppercase">Prossimamente</p>
            </div>
        </template>

        <template x-for="date in dateList">
            <div class="day">
                <p x-text="date.day" class="bold"></p>
                <template x-for="time in date.times">
                    <p>
                        ore <span x-text="time.hour"></span>
                        <template x-if="time.special">
                            <span>
                                - <span class="italic" x-text="time.special"></span>
                            </span>
                        </template>
                    </p>
                </template>
            </div>
        </template>

        <template x-if="allDates.length > maxDefaultDates">
            <button x-on:click="exp = !exp" class="show-more-toggle button-link text-small">
                <template x-if="!exp">
                    <span>mostra altre date</span>
                </template>
                <template x-if="exp">
                    <span>nascondi</span>
                </template>
            </button>
        </template>

    </div>
</div>
