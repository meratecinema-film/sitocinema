<?php

use Carbon\Carbon;
use Livewire\Component;

new class extends Component {
    public $event;

    public $expanded = false;
    public $maxDayCount = 3;

    public $posterImage;
    public $trailerLink;
    public $linkLabel;
    public $eventTypeId;
    public $eventTypeLabel;

    // dates grouped by day
    public $groupedDates = [];
    public $allDates = [];

    public function mount()
    {
        $this->trailerLink = $this->event->trailer ?? '';
        $this->posterImage = $this->event->poster ?? '';

        $type = $this->event->eventType;
        $this->eventTypeId = $type->id ?? 0;
        $this->eventTypeLabel = $type->name ?? '';
        $this->linkLabel = $this->eventTypeId === 1 || $this->eventTypeId === 2 ? 'trailer e sinossi' : 'informazioni';

        $shows = $this->event->shows;

        foreach ($this->event->shows as $show) {
            $date = new DateTime($show->date);
            $dayKey = $date->format('Y-m-d'); // unique day key
            $day = Carbon::parse($date)->locale('it')->isoFormat('dddd D MMMM');
            $time = $show['time']; // time

            if (!isset($this->groupedDates[$dayKey])) {
                $this->groupedDates[$dayKey] = [
                    'day' => $day,
                    'times' => [],
                ];
            }
            $this->groupedDates[$dayKey]['times'][] = $time;
        }

        $this->allDates = array_values($this->groupedDates);
    }
};
?>


<div class="event-card" x-data="{
    event: @js($event),
    allDates: @js($allDates),
    maxDayCout: @js($maxDayCount),
    exp: false,
    get dateList() {
        return this.exp ? this.allDates : this.allDates.slice(0, this.maxDayCout);
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
        <p class="tag uppercase">{{ $eventTypeLabel }}</p>
        <h2 class="h2">{{ $event->title }}</h2>

        <template x-for="date in dateList">
            <div class="day">
                <p x-text="date.day" class="bold"></p>
                <template x-for="time in date.times">
                    <p>ore <span x-text="time"></span></p>
                </template>
            </div>
        </template>

        <template x-if="allDates.length > maxDayCout">
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
