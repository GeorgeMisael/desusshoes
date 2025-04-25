<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CosmeticTestimonial extends Model
{
    //
    protected $fillable = [
        'name',
        'message',
        'photo',
        'rating',
        'cosmetic_id',
    ];

    public function cosmetic(): BelongsTo
    {
        return $this->belongsTo(Cosmetic::class, 'cosmetic_id');
    }
}
