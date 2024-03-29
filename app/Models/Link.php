<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'url',
        'link_type_id',
        'project_id',
        'order',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function link_type(): BelongsTo
    {
        return $this->belongsTo(LinkType::class);
    }
}
