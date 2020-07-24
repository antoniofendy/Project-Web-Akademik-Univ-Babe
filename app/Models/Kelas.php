<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    
    protected $table = "kelas";

    protected $guarded = [];

    public function jurusan(){
        return $this->belongsTo('App\Models\Jurusan');
    }

    public function mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa');
    }

}
