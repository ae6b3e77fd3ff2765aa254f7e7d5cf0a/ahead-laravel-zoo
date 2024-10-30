<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;
    protected $attributes = [
        'image' => 'images/default.jpg',
    ];
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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($animal) {
            $cage = $animal->cage;
            if ($cage) {
                $cage->increment('count');
            }
        });

        static::deleted(function ($animal) {
            $cage = $animal->cage;
            if ($cage) {
                $cage->decrement('count');
            }
        });
    }
}
