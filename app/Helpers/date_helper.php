<?php
if (!function_exists('tgl_indo')) {
    function timestamp_generator($timestamp, $format = 'd')
    {
        if (!empty($timestamp)) {
            $dateTime = new DateTime($timestamp);

            switch ($format) {
                case 'd':
                    return $dateTime->format('d'); // Day of the month
                case 'm':
                    return $dateTime->format('m'); // Month
                case 'jam':
                    return $dateTime->format('H:i:s'); // Time
                case 'bulan':
                    $bulanNames = [
                        'Jan',
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
                    ];
                    $monthNumber = $dateTime->format('n'); // n returns the numeric representation of the month (1 for January, 12 for December)
                    return $bulanNames[$monthNumber - 1]; // Adjust index since arrays are zero-based
                case 'hari':
                    $dayNumber = $dateTime->format('N'); // N returns the ISO-8601 numeric representation of the day of the week (1 for Monday, 7 for Sunday)
                    $daysMap = [
                        1 => 'Senin', // Monday
                        2 => 'Selasa', // Tuesday
                        3 => 'Rabu', // Wednesday
                        4 => 'Kamis', // Thursday
                        5 => 'Jumat', // Friday
                        6 => 'Sabtu', // Saturday
                        7 => 'Minggu', // Sunday
                    ];
                    return $daysMap[$dayNumber];
                case 'd-m-Y':
                    return $dateTime->format('d-m-Y'); // Full date in the 'd-m-Y' format
                default:
                    return "Invalid format.";
            }
        } else {
            return "Timestamp is empty.";
        }
    }
}
