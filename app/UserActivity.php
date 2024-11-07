<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = "user_activities";

    protected $fillable = ['user_id', 'feature_name', 'time_spent'];
}
