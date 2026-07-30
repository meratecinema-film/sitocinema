<?php

namespace App\Filament\Resources\ShowResource\Pages;

use App\Filament\Resources\ShowResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShow extends EditRecord
{
    protected static string $resource = ShowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Reindirizza alla tabella degli spettacoli dopo il salvataggio
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
