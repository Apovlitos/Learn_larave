<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    static public function getSlug(string $str){
        $ru = [
            'а',    'б',    'в',    'г',    'д',
            'е',    'ё',    'ж',   'з',    'и',
            'й',    'к',    'л',    'м',    'н',
            'о',    'п',    'р',    'с',    'т',
            'у',    'ф',    'х',    'ц',    'ч',
            'ш',    'щ',    'ь',     'ы',    'ъ',
            'э',    'ю',    'я'
        ];

        $en = [
            'a',    'b',       'v',    'g',     'd',
            'e',    'yo',      'j',    'z',     'i',
            'i',    'k',       'l',    'm',     'n',
            'o',    'p',       'r',    's',     't',
            'u',    'f',       'h',    'c',     'ch',
            'sh',    'sch',    '',    'ei',    'i',
            'ye',    'yu',    'ya'
        ];

        return str_replace($ru, $en, $str);
    }
}
