<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'country',
        'age_range',
        'gender',
        'date_of_birth',
        'address',
        'membership_option',
        'skin_tone',
        'height_cm',
        'chest_bust_cm',
        'waist_cm',
        'hair_color',
        'eye_color',
        'shoe_size',
        'primary_category',
        'talents',
        'subject',
        'has_experience',
        'experience_notes',
        'portfolio_links',
        'profile_images',
        'status',
        'meta',
    ];

    protected $casts = [
        'has_experience' => 'boolean',
        'meta' => 'array',
        'profile_images' => 'array',
    ];
}
