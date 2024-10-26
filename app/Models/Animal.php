<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    //
    public function cage(): BelongsTo
    {
        return $this->belongsTo(Cage::class);
    }
}
