<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    // 🔧 DIUBAH: tambah category, subtitle, percentage, description, icon_glyph
    protected $fillable = [
        'name',
        'category',
        'subtitle',
        'percentage',
        'description',
        'level',
        'icon',
        'icon_glyph',
        'order',
    ];

    // 🔧 DIUBAH: casting biar percentage & order jadi integer
    protected $casts = [
        'percentage' => 'integer',
        'order'      => 'integer',
        'level'      => 'integer',
    ];

    /**
     * 🔧 DIUBAH: accessor sekarang menerima $value dari DB.
     * Kalau kolom icon_glyph di DB terisi, pakai itu.
     * Kalau kosong, auto-deteksi dari nama skill.
     */
    public function getIconGlyphAttribute($value): string
    {
        if (!empty($value)) {
            return $value;
        }

        $name = strtolower($this->name);

        $map = [
            'laravel'      => 'fa-code',
            'php'          => 'fa-code',
            'javascript'   => 'fa-code',
            'react'        => 'fa-atom',
            'python'       => 'fa-leaf',
            'unity'        => 'fa-cube',
            'ar'           => 'fa-cube',
            'vr'           => 'fa-cube',
            'it support'   => 'fa-wrench',
            'it maintenance' => 'fa-wrench',
            'troubleshoot' => 'fa-wrench',
            'maintenance'  => 'fa-wrench',
            'hardware'     => 'fa-wrench',
            'microsoft'    => 'fa-file-text-o',
            'office'       => 'fa-file-text-o',
            'html'         => 'fa-globe',
            'css'          => 'fa-globe',
            'sql'          => 'fa-database',
            'mysql'        => 'fa-database',
            'database'     => 'fa-database',
            'git'          => 'fa-code-fork',
            'automasi'     => 'fa-cogs',
            'scripting'    => 'fa-cogs',
        ];

        foreach ($map as $keyword => $icon) {
            if (str_contains($name, $keyword)) {
                return $icon;
            }
        }

        return 'fa-star';
    }

    // 🔧 BARU: helper untuk cek apakah file gambar icon ada
    public function hasImageIcon(): bool
    {
        return !empty($this->icon)
            && file_exists(storage_path('app/public/' . $this->icon));
    }
}