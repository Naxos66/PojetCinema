<?php

namespace App\Filament\Resources\CinemaResource\Pages;

use App\Filament\Resources\CinemaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCinema extends EditRecord
{
    protected static string $resource = CinemaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
