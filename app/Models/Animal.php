<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($animal) {
            $cage = $animal->cage;
            if ($cage && $cage->count === $cage->size) {
                throw ValidationException::withMessages([
                    'cage_id' => "В клетке с индексом $cage->id нет места!"
                ]);
            }
        });
        static::created(function ($animal) {
            $cage = $animal->cage;
            if ($cage) {
                $cage->increment('count');
            }
        });
        static::updating(function ($animal) {
            $changes = $animal->getDirty();
            if (isset($changes['cage_id'])) {
                $cage = Cage::find($changes['cage_id']);
                if ($cage->count === $cage->size) {
                    throw ValidationException::withMessages([
                        'cage_id' => "В клетке с индексом $cage->id нет места!"
                    ]);
                }
            }
            $cage = $animal->cage;
            if ($cage) {
                $cage->decrement('count');
            }
        });
        static::updated(function ($animal) {
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
