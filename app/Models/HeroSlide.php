<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = ['subheading', 'title', 'subtitle', 'image', 'order'];
}