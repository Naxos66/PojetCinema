<?php

namespace App\Filament\Resources\FilmResource\Pages;

use App\Filament\Resources\FilmResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilms extends ListRecords
{
    protected static string $resource = FilmResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
