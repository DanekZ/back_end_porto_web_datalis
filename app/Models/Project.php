<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'images',
        'tech_stack',
        'category',
        'github_url',
        'demo_url',
        'status',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'images'     => 'array',
        'featured'   => 'boolean',
    ];
}
