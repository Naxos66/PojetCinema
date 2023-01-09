<?php

namespace App\Filament\Resources\FriandiseResource\Pages;

use App\Filament\Resources\FriandiseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFriandise extends EditRecord
{
    protected static string $resource = FriandiseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
