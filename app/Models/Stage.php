<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'description',
        'color',
        'order',
    ];

    protected $attributes = [
        'color' => 'yellow',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
