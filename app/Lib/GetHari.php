<?php

    namespace App\Lib;

    class GetHari{

        public static function hari($index){

            $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
    
            $getHari = $hari[$index-1];
    
            return $getHari;
    
        }

    }

?>