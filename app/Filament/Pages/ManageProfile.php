<?php

namespace App\Filament\Pages;

use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static string $view = 'filament.pages.manage-profile';

    protected static ?string $navigationLabel = 'Profile';

    protected static ?string $title = 'Kelola Profile';

    public ?array $data = [];

    public function mount(): void
    {
        // Ambil data profile pertama, kalau belum ada, isi dengan array kosong
        $profile = Profile::first();

        $this->form->fill($profile ? $profile->toArray() : []);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('headline')
                    ->label('Headline / Jabatan')
                    ->placeholder('Contoh: Full Stack Developer')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->rows(4)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('photo')
                    ->label('Foto Profile')
                    ->image()
                    ->directory('profile'),

                Forms\Components\FileUpload::make('about_photo')
                    ->label('Foto Khusus untuk Section "About Me"')
                    ->image()
                    ->directory('profile')
                    ->helperText('Kalau dikosongkan, akan pakai Foto Profile di atas sebagai fallback'),

                Forms\Components\FileUpload::make('cv_file')
                    ->label('File CV')
                    ->directory('cv')
                    ->acceptedFileTypes(['application/pdf']),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->maxLength(255),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Update kalau sudah ada data, atau buat baru kalau belum ada
        Profile::updateOrCreate(
            ['id' => Profile::first()?->id ?? 0],
            $data
        );

        \App\Services\SiteSettingsService::clearCache();

        Notification::make()
            ->title('Profile berhasil disimpan')
            ->success()
            ->send();
    }
}