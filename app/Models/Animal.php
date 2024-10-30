<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'gender',
        'species',
        'cage_id',
        'desc',
        'image'
    ];
    //
    public function cage(): BelongsTo
    {
        return $this->belongsTo(Cage::class);
    }
}
