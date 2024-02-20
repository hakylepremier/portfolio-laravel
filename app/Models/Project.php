<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    use HasUlids;

    // published makes it visible on the website
    protected $fillable = [
        'title',
        'slug',
        'photo',
        'summary',
        'description',
        'stage_id',
        'category_id',
        'published',
        'content',
    ];

    protected $attributes = [
        'published' => true,
        'stage_id' => 1
    ];

    protected $casts = [
        'published' => 'boolean',
        'photo' => 'array'
    ];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
