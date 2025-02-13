<?php
if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal)
    {
        if (!empty($tanggal) && $tanggal != "0000-00-00") {
            $bulan = array(
                1 =>   'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            );
            $pecahkan = explode('-', $tanggal);
            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        } else {
            return '-';
        }
    }

    function tgl_indo2($tanggal)
    {
        if (!empty($tanggal)) {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        } else {
            return '-';
        }
    }

    function timestamp($tanggal)
    {
        $pecahkan = explode(' ', $tanggal);
        return tgl_indo($pecahkan[0]) . ' - ' . $pecahkan[1];
    }

    function timestamp2($tanggal)
    {
        $pecahkan = explode(' ', $tanggal);
        return tgl_indo($pecahkan[0]);
    }
    function hitungHari($from, $to)
    {
        $first_date = strtotime($from);
        $second_date = strtotime($to);
        $offset = $second_date - $first_date;
        return floor($offset / 60 / 60 / 24);
    }
    function bulan($bulanAngka)
    {
        if (!empty($bulanAngka)) {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            return $bulan[(int)$bulanAngka];
        } else {
            return '-';
        }
    }
}
