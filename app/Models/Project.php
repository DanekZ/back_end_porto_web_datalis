<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'thumbnail_path',
        'images',
        'image_paths',
        'tech_stack',
        'category',
        'github_url',
        'demo_url',
        'status',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack'  => 'array',
        'images'      => 'array',
        'image_paths' => 'array',
        'featured'    => 'boolean',
    ];
}