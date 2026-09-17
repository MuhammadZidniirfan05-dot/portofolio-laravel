<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialLinkResource\Pages;
use App\Filament\Resources\SocialLinkResource\RelationManagers;
use App\Models\SocialLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialLinkResource extends Resource
{
    protected static ?string $model = SocialLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('platform')
                    ->options([
                        'GitHub' => 'GitHub',
                        'LinkedIn' => 'LinkedIn',
                        'Instagram' => 'Instagram',
                        'Twitter/X' => 'Twitter/X',
                        'YouTube' => 'YouTube',
                        'WhatsApp' => 'WhatsApp',
                        'Facebook' => 'Facebook',
                        'TikTok' => 'TikTok',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('url')
                    ->required()
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://...'),

                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('Nama icon, misal: fab fa-github (jika pakai FontAwesome)'),

                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka kecil akan tampil lebih dulu'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif / Tampilkan')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('platform')
                    ->searchable()
                    ->badge(),

                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->limit(40)
                    ->url(fn ($record) => $record->url)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialLinks::route('/'),
            'create' => Pages\CreateSocialLink::route('/create'),
            'edit' => Pages\EditSocialLink::route('/{record}/edit'),
        ];
    }
}