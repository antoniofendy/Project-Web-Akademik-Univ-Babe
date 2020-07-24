<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal";

    protected $guarded = [];

    public function matakuliah(){
        return $this->belongsTo('App\Models\MataKuliah', 'matkul_id');
    }

    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan');
    }

    public function kelas(){
        return $this->belongsTo('App\Models\Kelas');
    }

    public function dosen(){
        return $this->belongsTo('App\Models\Dosen');
    }

}
