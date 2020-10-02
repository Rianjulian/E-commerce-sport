<?php

    define("BASE_URL", "http://localhost:8080/file/");

    function rupiah($nilai = 0){
        $string = "Rp " .number_format($nilai,0,',','.');
        return $string;
    }
    
?>