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

    public function cipherSettings()
    {
        return $this->hasMany(CipherSetting::class)
                    ->where('status', 1);  // Only get CipherSettings with status 1
    }

    public function ci_settings()
    {
        return $this->hasOne(CipherSetting::class);
    }
}