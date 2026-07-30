<?php

namespace App\Filament\Resources\ShowSpecResource\Pages;

use App\Filament\Resources\ShowSpecResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShowSpec extends CreateRecord
{
    protected static string $resource = ShowSpecResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
