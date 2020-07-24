<?php

    function hari($index){

        $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

        $getHari = $hari[$index-1];

        return $getHari;

    }

?>