<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable
{
    
    use Notifiable;

    protected $table = "dosen";

    protected $guard = "dosen";

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function jurusan(){
        return $this->belongsTo('App\Models\Jurusan');
    }

    public function jadwal(){
        return $this->hasMany('App\Models\Jadwal');
    }

}
