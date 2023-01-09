<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalleResource\Pages;
use App\Filament\Resources\SalleResource\RelationManagers;
use App\Models\Salle;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalleResource extends Resource
{
    protected static ?string $model = Salle::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')->required(),
                Forms\Components\TextInput::make('places')->required(),
                Forms\Components\TextInput::make('cinema_id')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('number')->limit('20')->sortable(),
                Tables\Columns\TextColumn::make('places')->limit('50')->sortable(),
                Tables\Columns\TextColumn::make('cinema_id')->limit('20')->sortable()

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
            'index' => Pages\ListSalles::route('/'),
            'create' => Pages\CreateSalle::route('/create'),
            'edit' => Pages\EditSalle::route('/{record}/edit'),
        ];
    }
}
