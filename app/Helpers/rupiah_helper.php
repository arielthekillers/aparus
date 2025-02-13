<?php
if (!function_exists('rupiah')) {
    function rpbasic($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    function rpTanpaCurrency($angka)
    {
        $hasil_rupiah = number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
}
