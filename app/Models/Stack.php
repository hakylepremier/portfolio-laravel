<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stack extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'kind_id',
        'description',
        'order',
    ];

    public function kind(): BelongsTo
    {
        return $this->belongsTo(Kind::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
