<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class savedAcronym extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'saved_acronyms';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'term', 'definition', 'category', 'is_approved'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    
}
