<?php

namespace App\Filament\Resources\ShowResource\Pages;

use App\Filament\Resources\ShowResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShow extends CreateRecord
{
    protected static string $resource = ShowResource::class;
    // Ritorna all'elenco dei record dopo il salvataggio
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
