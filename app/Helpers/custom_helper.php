<?php
if (!function_exists('custom')) {
    function shorten_jenis_kelamin($jeniskelamin)
    {
        if ($jeniskelamin == "Laki-laki") {
            return "<span class='badge border border-primary text-primary'>L</span>";
        } elseif ($jeniskelamin == "Perempuan") {
            return "<span class='badge border border-warning text-warning'>P</span>";
        } else {
            return "-";
        }
    }
    function umur($tanggal_lahir)
    {
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        return "<span class='badge rounded-pill bg-light text-body'>" . $y . " Th</span>";
    }
    function invoiceStatus($status = null)
    {
        if ($status == 1) {
            $statusMessage = '<span class="badge bg-primary">Menunggu Pembayaran</span>';
        } elseif ($status == 2) {
            $statusMessage = '<span class="badge bg-success">Lunas</span>';
        } elseif ($status == 3) {
            $statusMessage = '<span class="badge bg-light text-muted">Dibatalkan</span>';
        } else {
            $statusMessage = '-';
        }
        return $statusMessage;
    }
}
