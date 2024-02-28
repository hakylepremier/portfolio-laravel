<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\Stage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->unique('projects', 'slug', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->imageEditor()
                    ->multiple(),
                Forms\Components\Textarea::make('summary')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('published')
                    ->default(true)
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
                Forms\Components\Select::make('stage_id')
                    ->relationship('stage', 'name')
                    ->default(1)
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'title')
                    ->default(1)
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->unique('projects', 'slug', ignoreRecord: true)
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->required(),
                Forms\Components\Select::make('types')
                    ->multiple()
                    ->relationship('types', 'title')
                    // ->default(1)
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->unique('projects', 'slug', ignoreRecord: true)
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Select::make('stacks')
                    ->multiple()
                    ->relationship('stacks', 'title')
                    // ->default(1)
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->unique('projects', 'slug', ignoreRecord: true)
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('kind_id')
                            ->relationship('kind', 'title')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull(),
                //     ->toolbarButtons([
                //         'attachFiles',
                //         'blockquote',
                //         'bold',
                //         'bulletList',
                //         'codeBlock',
                //         'heading',
                //         'italic',
                //         'link',
                //         'orderedList',
                //         'redo',
                //         'strike',
                //         'table',
                //         'undo',
                //     ]),
                // Forms\Components\RichEditor::make('content')
                //     ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                // Tables\Columns\TextColumn::make(
                //     'type.title'
                // ),
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\TextColumn::make('category.title'),
                Tables\Columns\IconColumn::make('published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('stage.name'),
                Tables\Columns\ImageColumn::make('photo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('order', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('stage')
                    ->relationship('stage', 'name'),
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'title'),
                Tables\Filters\SelectFilter::make('type')
                    ->relationship('types', 'title'),
                Tables\Filters\TernaryFilter::make('published')
                    ->label('Published')->placeholder('All')
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
            RelationManagers\LinksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
