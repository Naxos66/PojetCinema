<?php

namespace App\Filament\Resources\CinemaResource\Pages;

use App\Filament\Resources\CinemaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCinemas extends ListRecords
{
    protected static string $resource = CinemaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
