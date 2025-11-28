<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentPortfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'accredited_agent_id',
        'title',
        'description',
        'images',
        'tags',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function agent()
    {
        return $this->belongsTo(AccreditedAgent::class, 'accredited_agent_id');
    }
}
