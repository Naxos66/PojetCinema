<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FriandiseResource\Pages;
use App\Filament\Resources\FriandiseResource\RelationManagers;
use App\Models\Friandise;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FriandiseResource extends Resource
{
    protected static ?string $model = Friandise::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('price')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('name')->limit('20'),
                Tables\Columns\TextColumn::make('price')->limit('10')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFriandises::route('/'),
            'create' => Pages\CreateFriandise::route('/create'),
            'edit' => Pages\EditFriandise::route('/{record}/edit'),
        ];
    }
}
