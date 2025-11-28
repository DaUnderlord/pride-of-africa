<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditedAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'agency_name',
        'email',
        'phone',
        'whatsapp',
        'city',
        'country',
        'bio',
        'website',
        'instagram',
        'status',
        'password',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function portfolios()
    {
        return $this->hasMany(AgentPortfolio::class);
    }
}
