<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CipherSetting extends Model
{
    protected $table = 'cipher_settings';

    protected $fillable = [
        'user_id',
        'cipher_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cipher()
    {
        return $this->belongsTo(Cipher::class);
    }
}
