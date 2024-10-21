<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CipherHistory extends Model
{
    use HasFactory;

    protected $table = 'cipher_history';

    protected $fillable = ['user_id', 'entry', 'ciphers'];
}
