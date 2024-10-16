<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedAnagram extends Model
{
    protected $fillable = [
        'user_id',
        'anagram',
        'source_word'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
