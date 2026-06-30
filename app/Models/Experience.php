<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'role',
        'description',
        'type',
        'start_date',
        'end_date',
        'sort_order',
    ];
}
