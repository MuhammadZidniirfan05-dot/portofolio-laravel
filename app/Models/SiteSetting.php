<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_title', 'primary_color', 'secondary_color', 'text_color',
        'hero_title', 'hero_subtitle', 'logo', 'favicon',
        'footer_text', 'show_blog',
        'counter_label_1', 'counter_label_2', 'counter_label_3', 'counter_label_4',
        'cta_title', 'cta_subtitle', 'cta_button_text', 'cta_image',
    ];

    protected $casts = [
        'show_blog' => 'boolean',
    ];
}