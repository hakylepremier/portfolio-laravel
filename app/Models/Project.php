<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'published',
        'content',
    ];

    protected $attributes = [
        'published' => true,
    ];

    protected $casts = [
        'published' => 'boolean',
    ];
}
