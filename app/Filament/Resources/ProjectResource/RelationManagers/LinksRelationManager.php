<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinksRelationManager extends RelationManager
{
    protected static string $relationship = 'links';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('link_type_id')
                    ->relationship('link_type', 'title')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->minValue(1)
                    ->default(1)->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Orders that are 10 or above will appear in the homepage if project is in the homepage.'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('url')
            ->columns([
                Tables\Columns\TextColumn::make('link_type.title'),
                Tables\Columns\TextColumn::make('order')->sortable()->tooltip('Orders that are 10 or above will appear in the homepage if project is in the homepage.'),
                Tables\Columns\TextColumn::make('url'),
                // ->searchable(),
                Tables\Columns\TextColumn::make('title'),
                // ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                // ->sortable(),
                // ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                // ->sortable()
                // ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
