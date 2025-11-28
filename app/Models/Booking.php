<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'talent_id',
        'client_name',
        'company_name',
        'email',
        'phone',
        'project_title',
        'project_details',
        'budget_range',
        'shoot_location',
        'shoot_dates',
        'status',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function talent(): BelongsTo
    {
        return $this->belongsTo(Talent::class);
    }
}
