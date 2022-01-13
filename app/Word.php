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

    public function scopeOfKeyword($query, $keywords)
    {
        // キーワード検索のスペース調整
        $words = trim($keywords);
        $words = str_replace(' ', ' ', $words);
        $words = preg_replace('/\s+/', ' ', $words);
        $words = explode(' ', $words);

        // [単語]と[意味]が検索ターゲット
        foreach ($words as $word) {
            $query = $query->orWhere('word', 'LIKE', "%{$word}%");
            $query = $query->orWhere('definition', 'LIKE', "%{$word}%");
        }

        return $query;
    }
}
