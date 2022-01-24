<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    // 一覧表示件数
    const DISPLAY_NUMBER = 25;

    protected $fillable = [
        'language_id',
        'sentence',
        'level',
        'meaning',
    ];
    protected $hidden = [];
    protected $casts = [];

    public function scopeOfId($query, $type)
    {
        return $query->where('id', $type);
    }

    public function scopeOfLanguageId($query, $language_id)
    {
        return $query->where('language_id', $language_id);
    }

    public function scopeOfLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    public function scopeOfKeyword($query, $keywords)
    {
        // キーワード検索のスペース調整
        $words = trim($keywords);
        $words = str_replace(' ', ' ', $words);
        $words = preg_replace('/\s+/', ' ', $words);
        $words = explode(' ', $words);

        // [文章]と[意味]が検索ターゲット
        foreach ($words as $word) {
            $query = $query->orWhere('sentence', 'LIKE', "%{$word}%");
            $query = $query->orWhere('meaning', 'LIKE', "%{$word}%");
        }

        return $query;
    }
}
