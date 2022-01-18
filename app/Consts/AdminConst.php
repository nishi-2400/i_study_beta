<?php

namespace App\Consts;

class AdminConst
{
    // 言語コード
    const JAPANESE = 1;
    const ENGLISH = 2;
    const ITALY = 3;

    const LANGUAGES = [
        self::JAPANESE => '日本語',
        self::ENGLISH => 'English',
        self::ITALY => 'Italy',
    ];

    // 品詞
    const NOUN = 1;
    const PRONOUN = 2;
    const VERB = 3;
    const ADJECTIVE = 4;
    const ADVERB = 5;
    const PREPOSITION = 6;
    const CONJUNCTION = 7;
    const INTERJECTION = 8;

    const ATTRIBUTES = [
        self::NOUN => '名詞',
        self::PRONOUN => '代名詞',
        self::VERB => '動詞',
        self::ADJECTIVE => '形容詞',
        self::ADVERB => '副詞',
        self::PREPOSITION => '前置詞',
        self::CONJUNCTION => '接続詞',
        self::INTERJECTION => '間投詞',
    ];

    // 品詞
    const LEVEL_ONE = 1;
    const LEVEL_TWO = 2;
    const LEVEL_THREE = 3;
    const LEVEL_FOUR = 4;
    const LEVEL_FIVE = 5;
    const LEVEL_SIX = 6;

    const LANGUAGE_LEVEL = [
        self::LEVEL_ONE => 'A1',
        self::LEVEL_TWO => 'A2',
        self::LEVEL_THREE => 'B1',
        self::LEVEL_FOUR => 'B2',
        self::LEVEL_FIVE => 'C1',
        self::LEVEL_SIX => 'C2',
    ];
}
