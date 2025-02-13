<?php
if (!function_exists('kontrak')) {
    function generateContractNumber($sequenceNumber)
    {
        // Kode tetap
        $fixedCode = "PSM";

        // Kode UPTRSNW
        $uptrsnwCode = "UPTRSNW";

        // Mengubah bulan menjadi format Romawi
        $romanMonths = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $currentMonth = intval(date('m')) - 1;
        $romanMonth = $romanMonths[$currentMonth];

        // Mengambil tahun saat ini
        $currentYear = date('Y');

        // Membangun nomor kontrak
        $contractNumber = $sequenceNumber . '/' . $fixedCode . '/' . $uptrsnwCode . '/' . $romanMonth . '/' . $currentYear;

        return $contractNumber;
    }
}
