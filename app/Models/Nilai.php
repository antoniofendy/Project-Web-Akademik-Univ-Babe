<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    
    protected $table = "nilai";

    protected $guarded = [];

    public function matakuliah(){
        return $this->belongsTo('App\Models\MataKuliah', 'matkul_id');
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa', 'mhs_id');
    }

}
