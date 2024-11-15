<?php

namespace App;

use App\Models\savedAcronym;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plan',
        'otp',
        'is_verified',
        'expire_otp',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function permissionsList()
    {
        $roles = $this->roles;
        $permissions = [];
        foreach ($roles as $role) {
            $permissions[] = $role->permissions()->pluck('name')->implode(',');
        }
        return collect($permissions);
    }

    public function permissions()
    {
        $permissions = [];
        $role = $this->roles->first();
        $permissions = $role->permissions()->get();
        return $permissions;
    }

    public function isAdmin()
    {
        $is_admin = $this->roles()->where('name', 'admin')->first();
        if ($is_admin != null) {
            $is_admin = true;
        } else {
            $is_admin = false;
        }
        return $is_admin;
    }

    public function cipherSettings()
    {
        return $this->hasMany(CipherSetting::class);
    }

    public function saved_anagrams()
    {
        return $this->hasMany(SavedAnagram::class)->orderBy('created_at', 'ASC');
    }

    public function saved_acronyms($term)
    {
        return $this->hasMany(savedAcronym::class)->where('is_approved', 1)->where('term', $term)->orderBy('created_at', 'ASC')->get();
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function setting($key)
    {
        return $this->hasMany(Setting::class)->where('key', $key)->first() ?? null;
    }

    public function apply_setting($key, $value)
    {
        if ($record = $this->settings()->where('key', $key)->first()) {
            $record->value = $value;
            $record->save();

            return true;
        } else {
            Setting::create([
                'user_id' => $this->id,
                'key' => $key,
                'value' => $value
            ]);

            return true;
        }
    }
}
