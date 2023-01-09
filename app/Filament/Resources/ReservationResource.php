<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('quantity')->required(),
                Forms\Components\TextInput::make('total_price')->required(),
                Forms\Components\TextInput::make('email')->required(),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\TextInput::make('seance_id')->required(),
                Forms\Components\TextInput::make('user_id')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('name')->limit('20'),
                Tables\Columns\TextColumn::make('quantity')->limit('10')->sortable(),
                Tables\Columns\TextColumn::make('total_price')->limit('20'),
                Tables\Columns\TextColumn::make('email')->limit('20'),
                Tables\Columns\TextColumn::make('phone')->limit('10'),
                Tables\Columns\TextColumn::make('seance_id')->limit('10'),
                Tables\Columns\TextColumn::make('user_id')->limit('10')->sortable(),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
