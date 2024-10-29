<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'age',
        'species',
        'cage_id',
        'description',
        'path_to_image'
    ];
    //
    public function cage(): BelongsTo
    {
        return $this->belongsTo(Cage::class);
    }
}
