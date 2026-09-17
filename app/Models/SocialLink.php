<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = ['platform', 'url', 'icon', 'order', 'is_active'];

    /**
     * Auto-map icon berdasarkan platform, supaya tidak perlu
     * isi manual dan rawan typo. Kalau platform "Lainnya" atau
     * tidak dikenali, fallback ke kolom icon manual (kalau diisi),
     * atau ikon default fa-link.
     */
    public function getDisplayIconAttribute(): string
    {
        $map = [
            'GitHub' => 'fa fa-github',
            'LinkedIn' => 'fa fa-linkedin',
            'Instagram' => 'fa fa-instagram',
            'Twitter/X' => 'fa fa-twitter',
            'YouTube' => 'fa fa-youtube',
            'WhatsApp' => 'fa fa-whatsapp',
            'Facebook' => 'fa fa-facebook',
        ];

        return $map[$this->platform] ?? ($this->icon ?: 'fa fa-link');
    }
}