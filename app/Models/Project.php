<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasUlids;

    // published makes it visible on the website, released tells us if it has been released or not
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'published',
        'released',
        'content',
    ];

    protected $attributes = [
        'published' => true,
        'released' => false,
    ];

    protected $casts = [
        'published' => 'boolean',
        'released' => 'boolean',
    ];
}
