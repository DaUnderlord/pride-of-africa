<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talent extends Model
{
    use HasFactory;

    protected $table = 'talents';

    protected $fillable = [
        'talent_code',
        'slug',
        'display_name',
        'primary_role',
        'category',
        'city',
        'country',
        'gender',
        'age_range',
        'height_cm',
        'bust_cm',
        'waist_cm',
        'hips_cm',
        'shoe_size',
        'short_bio',
        'hero_image_url',
        'gallery',
        'is_verified',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
