<?php

namespace App\Models;

use App\Utilities\Uuids;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable,Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname',
        'lastname', 'phone', 'dob', 'gender', 'role_id',
        'photo', 'thumbnail', 'api_token', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin() {

        if ($this->role) {
            if ($this->role->name=='admin') {
            return true;
            }
        }

        return false;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        if ($this->isAdmin()) {
            $this->notify(new ResetPassword($token));
        }

    }
}
