<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CinemaResource\Pages;
use App\Filament\Resources\CinemaResource\RelationManagers;
use App\Models\Cinema;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CinemaResource extends Resource
{
    protected static ?string $model = Cinema::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('address')->required(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\TextInput::make('zipcode')->required(),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\TextInput::make('email')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('name')->limit('30'),
                Tables\Columns\TextColumn::make('address')->limit('30'),
                Tables\Columns\TextColumn::make('city')->limit('20'),
                Tables\Columns\TextColumn::make('zipcode')->limit('10'),
                Tables\Columns\TextColumn::make('phone')->limit('20'),
                Tables\Columns\TextColumn::make('email')->limit('100')
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
            'index' => Pages\ListCinemas::route('/'),
            'create' => Pages\CreateCinema::route('/create'),
            'edit' => Pages\EditCinema::route('/{record}/edit'),
        ];
    }
}
