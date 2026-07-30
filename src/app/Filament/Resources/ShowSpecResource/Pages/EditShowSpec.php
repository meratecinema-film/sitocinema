<?php

namespace App\Filament\Resources\ShowSpecResource\Pages;

use App\Filament\Resources\ShowSpecResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShowSpec extends EditRecord
{
    protected static string $resource = ShowSpecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
