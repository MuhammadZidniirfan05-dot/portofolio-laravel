<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Filament\Resources\HeroSlideResource\RelationManagers;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Hero Slides';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subheading')
                    ->label('Sub Judul Kecil')
                    ->placeholder('Contoh: Hello! This is Budi')
                    ->maxLength(255),

                Forms\Components\TextInput::make('title')
                    ->label('Judul Utama')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Creative <span>Web</span> Developer')
                    ->helperText('Bisa pakai tag <span>kata</span> untuk memberi warna aksen pada kata tertentu, sesuai desain template'),

                Forms\Components\Textarea::make('subtitle')
                    ->label('Deskripsi Singkat (opsional)')
                    ->rows(2)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Slide')
                    ->image()
                    ->directory('hero-slides')
                    ->imageEditor()
                    ->required(),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka kecil tampil lebih dulu'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\TextColumn::make('subheading'),

                Tables\Columns\TextColumn::make('title')
                    ->html()
                    ->limit(50),

                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
