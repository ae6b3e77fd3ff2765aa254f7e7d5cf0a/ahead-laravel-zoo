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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($animal) {
            if ($animal->cage_id) {
                $cage = Cage::find($animal->cage_id);
                $cage->update(['count' => $cage->count + 1]);
                $cage->save();
            }
        });

        static::deleted(function ($animal) {
            if ($animal->cage_id) {
                $cage = Cage::find($animal->cage_id);
                $cage->update(['count' => $cage->count - 1]);
                $cage->save();
            }
        });
    }
}
