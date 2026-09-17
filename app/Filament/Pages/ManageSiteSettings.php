<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.manage-site-settings';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Pengaturan Website';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = SiteSetting::first();

        $this->form->fill($setting ? $setting->toArray() : []);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('site_title')
                            ->label('Judul Website')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('site'),

                        Forms\Components\FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('site'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tema Warna')
                    ->schema([
                        Forms\Components\ColorPicker::make('primary_color')
                            ->label('Warna Utama')
                            ->required(),

                        Forms\Components\ColorPicker::make('secondary_color')
                            ->label('Warna Sekunder')
                            ->required(),

                        Forms\Components\ColorPicker::make('text_color')
                            ->label('Warna Judul / Teks Heading')
                            ->required()
                            ->helperText('Warna dasar untuk judul-judul (h1, h2) di seluruh halaman'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Konten Hero (Halaman Depan)')
                    ->description('Hanya dipakai sebagai fallback jika belum ada Hero Slide diisi di menu Hero Slides')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Judul Hero')
                            ->placeholder('Contoh: Halo, Saya Seorang Developer')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('hero_subtitle')
                            ->label('Subjudul Hero')
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Counter / Statistik')
                    ->description('Label teks yang tampil di bagian angka statistik pada halaman depan')
                    ->schema([
                        Forms\Components\TextInput::make('counter_label_1')
                            ->label('Label Counter 1 (jumlah project)')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('counter_label_2')
                            ->label('Label Counter 2 (jumlah skill)')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('counter_label_3')
                            ->label('Label Counter 3 (jumlah pengalaman)')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('counter_label_4')
                            ->label('Label Counter 4 (tahun pengalaman)')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Ajakan Kontak (CTA Banner)')
                    ->description('Bagian "Punya proyek yang ingin dikerjakan?" yang muncul setelah section Services')
                    ->schema([
                        Forms\Components\TextInput::make('cta_title')
                            ->label('Judul CTA')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('cta_subtitle')
                            ->label('Subjudul / Deskripsi CTA')
                            ->rows(2),

                        Forms\Components\TextInput::make('cta_button_text')
                            ->label('Teks Tombol')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('cta_image')
                            ->label('Gambar CTA')
                            ->image()
                            ->directory('site')
                            ->helperText('Kalau dikosongkan, akan pakai gambar bawaan template'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Lainnya')
                    ->schema([
                        Forms\Components\Textarea::make('footer_text')
                            ->label('Teks Footer')
                            ->rows(2),

                        Forms\Components\Toggle::make('show_blog')
                            ->label('Tampilkan Menu Blog')
                            ->helperText('Kalau dimatikan, menu & halaman blog tidak akan tampil di landing page'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        SiteSetting::updateOrCreate(
            ['id' => SiteSetting::first()?->id ?? 0],
            $data
        );

        \App\Services\SiteSettingsService::clearCache();

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}