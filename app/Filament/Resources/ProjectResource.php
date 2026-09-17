<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\Textarea::make('description')
                ->required()
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('projects')
                ->imageEditor(),

            Forms\Components\TagsInput::make('technologies')
                ->placeholder('Ketik lalu Enter, misal: Laravel')
                ->helperText('Tekan Enter setelah mengetik tiap teknologi'),

            Forms\Components\TextInput::make('demo_url')
                ->url()
                ->label('Demo URL'),

            Forms\Components\TextInput::make('github_url')
                ->url()
                ->label('GitHub URL'),

            Forms\Components\TextInput::make('order')
                ->numeric()
                ->default(0)
                ->helperText('Angka kecil tampil lebih dulu'),

            Forms\Components\Toggle::make('is_featured')
                ->label('Tampilkan sebagai unggulan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
            ])
            ->defaultSort('order')
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}