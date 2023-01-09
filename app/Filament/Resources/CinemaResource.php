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
use phpseclib3\Crypt\Hash;
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
                Forms\Components\TextInput::make('email'),
                Forms\Components\TextInput::make('password')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Forms\Components\TextColumn::make('name')->required(),
                Forms\Components\TextColumn::make('address')->required(),
                Forms\Components\TextColumn::make('city')->required(),
                Forms\Components\TextColumn::make('zipcode')->required(),
                Forms\Components\TextColumn::make('phone')->required(),
                Forms\Components\TextColumn::make('email')->required(),
            ])
            ->filters([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('name')->limit('20'),
                Tables\Columns\TextColumn::make('address')->limit('50'),
                Tables\Columns\TextColumn::make('city')->limit('30'),
                Tables\Columns\TextColumn::make('zipcode')->limit('10'),
                Tables\Columns\TextColumn::make('phone')->limit('14'),
                Tables\Columns\TextColumn::make('email')->limit('50'),
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
