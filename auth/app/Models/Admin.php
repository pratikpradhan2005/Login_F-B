<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
   
    use Notifiable;

    // This guard name will be referenced in config/auth.php
    protected $guard = 'student';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sendPasswordResetAdminNotification($token)
    {
        $url = url(route('password.reset', ['token' => $token], false));

        $this->notify(new ResetPassword($url));
    }
}
