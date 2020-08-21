<?php
    
    namespace App\Lib;

    use Illuminate\Support\Facades\DB;

    class EnumListMhs{

        public static function jenis_kelamin(){

            $jk = [
                "l" => "Laki-laki",
                "p" => "Perempuan"
            ];

            return ($jk);

        }

        public static function agama(){

            $agama = [
                "kristen" => "Kristen",
                "khatolik" => "Khatolik",
                "islam" => "Islam",
                "buddha" => "Buddha",
                "hindu" => "Hindu",
                "kong hu chu" => "Kong Hu Chu"
            ];

            return ($agama);

        }

        public static function shift(){

            $shift = [
                "p" => "Pagi",
                "m" => "Malam"
            ];

            return ($shift);

        }

        public static function semester(){

            $semester = [
                "01" => "1",
                "02" => "2",
                "03" => "3",
                "04" => "4",
                "05" => "5",
                "06" => "6",
                "07" => "7",
                "08" => "8",
            ];

            return $semester;

        }

    }

?>