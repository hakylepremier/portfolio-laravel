<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kind extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'order',
    ];

    public function stacks(): HasMany
    {
        return $this->hasMany(Stack::class);
    }
}
