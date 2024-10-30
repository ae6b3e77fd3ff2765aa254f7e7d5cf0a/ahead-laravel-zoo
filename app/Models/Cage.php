<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\ValidationException;

class Cage extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'name',
        'size',
    ];

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($cage) {
            if($cage->count > $cage->size) {
                throw ValidationException::withMessages([
                    'size' => "Размер клетки с индексом $cage->id меньше, чем в ней проживает животных!",
                ]);
            }
        });

        static::deleting(function ($cage) {
            if ($cage->count > 0) {
                throw ValidationException::withMessages([
                    'size' => "В клетке с индексом $cage->id ещё проживают животные!",
                ]);
            }
        });
    }
}
