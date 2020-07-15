<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = "mahasiswa";

    protected $guard = "mahasiswa";

    protected $fillable = [
        'name', 'email', 'username', 'password','email_verfied_at'
    ];

    protected $hidden = ['password', 'remember_token'];
}


?>