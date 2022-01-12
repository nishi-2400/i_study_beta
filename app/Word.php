<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'language_id',
        'attribute_id',
        'word',
        'level',
        'definition',
        'sound',
    ];
    protected $hidden = [];
    protected $casts = [];

    public function scopeOfId($query, $type)
    {
        return $query->where('id', $type);
    }
}
