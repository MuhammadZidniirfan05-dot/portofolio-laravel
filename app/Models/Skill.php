<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'level', 'icon', 'order'];

    /**
     * Auto-deteksi jenis icon (glyph) berdasarkan kata kunci nama
     * skill. Warna kartu diatur terpisah (cycling biru/kuning/putih),
     * icon di sini cuma menentukan simbolnya saja.
     */
    public function getIconGlyphAttribute(): string
    {
        $name = strtolower($this->name);

        $map = [
            'laravel'      => 'fa-code',
            'php'          => 'fa-code',
            'javascript'   => 'fa-code',
            'python'       => 'fa-leaf',
            'unity'        => 'fa-cube',
            'ar'           => 'fa-cube',
            'vr'           => 'fa-cube',
            'it support'   => 'fa-wrench',
            'troubleshoot' => 'fa-wrench',
            'maintenance'  => 'fa-wrench',
            'hardware'     => 'fa-wrench',
            'microsoft'    => 'fa-file-text-o',
            'office'       => 'fa-file-text-o',
            'html'         => 'fa-globe',
            'css'          => 'fa-globe',
            'sql'          => 'fa-database',
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
}