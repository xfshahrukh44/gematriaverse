<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cipher extends Model
{
    protected $fillable = [
        'name',
        'small_alphabet',
        'capital_alphabet',
        'rgb_values',
        'prority'
    ];

    protected $casts = [
        'small_alphabet' => 'array',
        'capital_alphabet' => 'array',
    ];
}
