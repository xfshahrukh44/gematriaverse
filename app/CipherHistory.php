<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CipherHistory extends Model
{
    protected $table = 'cipher_history';

    protected $fillable = ['user_id', 'entry', 'ciphers'];
}
