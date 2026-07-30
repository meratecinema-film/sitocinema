<?php

namespace App\Filament\Resources\ShowSpecResource\Pages;

use App\Filament\Resources\ShowSpecResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShowSpecs extends ListRecords
{
    protected static string $resource = ShowSpecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
