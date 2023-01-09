<?php

namespace App\Filament\Resources\SeanceResource\Pages;

use App\Filament\Resources\SeanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeance extends EditRecord
{
    protected static string $resource = SeanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
