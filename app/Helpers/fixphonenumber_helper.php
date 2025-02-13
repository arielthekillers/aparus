<?php
if (!function_exists('fixphonenumber')) {
    function fixphonenumber($nohp)
    {
        if (!preg_match("/[^+0-9]/", trim($nohp))) {
            // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
            if (substr(trim($nohp), 0, 2) == "62") {
                $hp    = trim($nohp);
            }
            // cek apakah no hp karakter ke 1 adalah angka 0
            else if (substr(trim($nohp), 0, 1) == "0") {
                $hp    = "62" . substr(trim($nohp), 1);
            }
        }
        return $hp;
    }
}
