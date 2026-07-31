<?php

namespace App\Filament\Resources;

use BackedEnum;
use App\Filament\Resources\FilmResource\Pages;
use App\Filament\Resources\FilmResource\RelationManagers;
use App\Models\Film;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('poster')
                    ->maxLength(255),
                Forms\Components\Select::make('eventtype_id')
                    ->relationship('eventtype', 'name')
                    ->required(),
                Forms\Components\TextInput::make('trailer')
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('visible_from'),
                Forms\Components\DatePicker::make('visible_until'),
                Forms\Components\TextInput::make('duration')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('poster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('eventtype.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trailer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visible_from')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('visible_until')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
