<?php

    use App\Models\Dosen;
    use Illuminate\Support\Facades\DB;

    function getNid($jurusan, $tahun){

        $thn = substr($tahun, 2, 2);

        $dosen =  Dosen::whereRaw("SUBSTRING(id, 1,1) = " . $jurusan)
        ->whereRaw("SUBSTRING(id, 2,2) = " . $thn)
        ->get();

        if($dosen->isEmpty()){
            $incr_nid = $jurusan . $thn . "0001";
            $incr_nid = intval($incr_nid);
        }
        else{
            $last_dosen = end($dosen);
            $last_dosen = end($last_dosen);
            $incr_nid = $last_dosen->id += 1;
        }
        
        return $incr_nid;
    }

?>