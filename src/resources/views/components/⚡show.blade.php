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
    public $dateList = [];

    public function updateDateList()
    {
        $this->dateList = $this->expanded ? $this->groupedDates : array_slice($this->groupedDates, 0, $this->maxDayCount);
    }

    public function toggle()
    {
        $this->expanded = !$this->expanded;
        $this->updateDateList();
    }

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
            $time = $show['time']; // time

            if (!isset($this->groupedDates[$dayKey])) {
                $this->groupedDates[$dayKey] = [
                    'day' => Carbon::parse($date),
                    'times' => [],
                ];
            }
            $this->groupedDates[$dayKey]['times'][] = $time;
        }

        $this->updateDateList();
    }
};
?>


<div class="event-card" x-data="{ event: @js($event) }">
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
        <h2 class="h2">{{ $event->title }}</h2>
        <p class="tag uppercase">{{ $eventTypeLabel }}</p>

        @foreach ($this->dateList as $group)
            <div wire:key="day-{{ $loop->index }}" class="day">
                <p class="bold">
                    {{ $group['day']->locale('it')->isoFormat('dddd D MMMM') }}
                </p>
                @foreach ($group['times'] as $time)
                    <p wire:key="time-{{ $time }}">ore {{ $time }}</p>
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
