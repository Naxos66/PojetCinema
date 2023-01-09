<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeanceResource\Pages;
use App\Filament\Resources\SeanceResource\RelationManagers;
use App\Models\Seance;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeanceResource extends Resource
{
    protected static ?string $model = Seance::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('date')->required(),
                Forms\Components\TextInput::make('price')->required(),
                Forms\Components\TextInput::make('salle_id')->required(),
                 Forms\Components\TextInput::make('film_id')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('date')->limit('20'),
                Tables\Columns\TextColumn::make('price')->limit('50')>sortable(),
                Tables\Columns\TextColumn::make('salle_id')->limit('20')>sortable(),
                Tables\Columns\TextColumn::make('film_id')->limit('20')->sortable()
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
            'index' => Pages\ListSeances::route('/'),
            'create' => Pages\CreateSeance::route('/create'),
            'edit' => Pages\EditSeance::route('/{record}/edit'),
        ];
    }
}
