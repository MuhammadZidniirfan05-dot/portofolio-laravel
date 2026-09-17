<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'headline', 'short_description', 'photo', 'about_photo', 'cv_file', 'email', 'phone',
    ];
}