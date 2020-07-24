<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = "mata_kuliah";
    protected $guarded = [];

    //https://laracasts.com/discuss/channels/eloquent/using-a-string-primary-key
    //untuk memberitahu eloquent bahwa kita tidak menggunakan primary incrementing
    public $incrementing = false;

    public function jadwal(){
        return $this->hasOne('App\Models\Jadwal');
    }

}
