<?php

    use App\Models\Mahasiswa;
    use Illuminate\Support\Facades\DB;

    function getNim($jurusan, $tahun){

        $thn = substr($tahun, 2, 2);

        $mhs =  Mahasiswa::whereRaw("SUBSTRING(id, 1,1) = " . $jurusan)
        ->whereRaw("SUBSTRING(id, 2,2) = " . $thn)
        ->get();

        $last_mhs = end($mhs);
        $incr_nim = $last_mhs[0]->id += 1;
        
        return $incr_nim;
    }

?>