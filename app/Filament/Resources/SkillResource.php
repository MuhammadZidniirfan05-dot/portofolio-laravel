<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Skills';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Skill')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Laravel, Python, MySQL'),

                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'Core Technologies'      => 'Core Technologies',
                                'Frameworks & Libraries' => 'Frameworks & Libraries',
                                'Database & IT Services' => 'Database & IT Services',
                            ])
                            ->default('Core Technologies')
                            ->native(false)
                            ->helperText('Pilih kategori skill'),

                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtitle')
                            ->maxLength(255)
                            ->placeholder('Contoh: PHP Web Framework, Version Control'),
                    ])
                    ->columns(2),

                // 🔧 DIUBAH: percentage & level DIHAPUS, hanya description
                Forms\Components\Section::make('Deskripsi')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Contoh: MVC Architecture, Eloquent ORM, Routing, Security')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Icon & Urutan')
                    ->schema([
                        Forms\Components\FileUpload::make('icon')
                            ->label('Icon Gambar')
                            ->image()
                            ->directory('skills')
                            ->imageEditor()
                            ->helperText('Upload icon/logo (opsional)')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('icon_glyph')
                            ->label('Icon Glyph (FontAwesome)')
                            ->maxLength(255)
                            ->placeholder('Contoh: fa-code, fa-database')
                            ->helperText('Dikosongkan = auto-deteksi dari nama'),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampil')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka kecil tampil lebih dulu'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icon')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => null)
                    ->size(40),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Core Technologies'      => 'info',
                        'Frameworks & Libraries' => 'warning',
                        'Database & IT Services' => 'success',
                        default                  => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->searchable()
                    ->toggleable()
                    ->limit(30),

                // 🔧 DIUBAH: percentage diganti description
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description)
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),

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
                Tables\Filters\SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'Core Technologies'      => 'Core Technologies',
                        'Frameworks & Libraries' => 'Frameworks & Libraries',
                        'Database & IT Services' => 'Database & IT Services',
                    ]),
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
            'index'  => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit'   => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}