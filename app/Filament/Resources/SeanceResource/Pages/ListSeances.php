<?php

namespace App\Filament\Resources\SeanceResource\Pages;

use App\Filament\Resources\SeanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeances extends ListRecords
{
    protected static string $resource = SeanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
