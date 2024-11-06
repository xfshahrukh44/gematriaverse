<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['user_id','key','value'];

    public static function getValue($userId, $key, $default = '')
    {
        return self::where('user_id', $userId)
                    ->where('key', $key)
                    ->value('value') ?? $default;
    }
}
