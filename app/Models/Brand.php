<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function cosmetics(): HasMany
    {
        return $this->hasMany(Cosmetic::class);
    }

    public function popularCosmetics()
    {
        return $this->hasMany(Cosmetic::class)
                    ->where('is_popular', true)
                    ->orderBy('created_at', 'desc');
    }
}
