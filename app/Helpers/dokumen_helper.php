<?php
if (!function_exists('dokumen')) {
    function ekstensi($filename)
    {
        if (!empty($filename)) {
            $ext_pdf = explode('.', strtoupper($filename));
            $ext = end($ext_pdf);
            return $ext;
        } else {
            return "Tipe tidak ada.";
        }
    }
    function iconset($filename)
    {
        $ext = ekstensi($filename);
        if ($ext == "PDF") {
            $icon = "ri-file-pdf-fill";
        } else if ($ext == "JPG" || $ext == "JPEG"  || $ext == "PNG") {
            $icon = "ri-image-2-fill";
        } else {
            $icon = " ri-file-search-fill";
        }
        return $icon;
    }
    function iconcolor($filename)
    {
        $ext = ekstensi($filename);
        if ($ext == "PDF") {
            $color = "danger";
        } else if ($ext == "JPG" || $ext == "JPEG"  || $ext == "PNG") {
            $color = "secondary";
        } else {
            $color = "primary";
        }
        return $color;
    }
    function toLowercaseUnderscore($text)
    {
        // Convert the text to lowercase
        $lowercaseText = strtolower($text);

        // Replace spaces with underscores
        $underscoreText = str_replace(' ', '_', $lowercaseText);

        return $underscoreText;
    }
    function fsize($file)
    {
        $fsize = filesize(FCPATH . '/uploads/dokumen/' . $file);
        if ($fsize >= 1048576) {
            $fsize = number_format($fsize / 1048576, 2) . ' MB';
        } elseif ($fsize >= 1024) {
            $fsize = number_format($fsize / 1024, 2) . ' KB';
        }
        return $fsize;
    }
}
