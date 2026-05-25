<?php

namespace App\Helpers;

class FormatTanggal
{
    public static function indo($format, $date = null)
    {
        $date = $date ?? date($format);
        
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        if ($format == 'd/m/Y') {
            $parts = explode('/', $date);
            if (count($parts) == 3) {
                $day = ltrim($parts[0], '0') ?: '0';
                $month = $bulan[$parts[1]] ?? $parts[1];
                $year = $parts[2];
                return $day . ' ' . $month . ' ' . $year;
            }
        }

        if ($format == 'd/m/Y H:i:s') {
            $parts = explode(' ', $date);
            if (count($parts) == 2) {
                $dateParts = explode('/', $parts[0]);
                if (count($dateParts) == 3) {
                    $day = ltrim($dateParts[0], '0') ?: '0';
                    $month = $bulan[$dateParts[1]] ?? $dateParts[1];
                    $year = $dateParts[2];
                    return $day . ' ' . $month . ' ' . $year . ' ' . $parts[1];
                }
            }
        }

        return $date;
    }

    public static function tglIndo($date = null)
    {
        $date = $date ?? date('Y-m-d');
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        $parts = explode('-', $date);
        if (count($parts) == 3) {
            $day = ltrim($parts[2], '0') ?: '0';
            $month = $bulan[$parts[1]] ?? $parts[1];
            $year = $parts[0];
            return $day . ' ' . $month . ' ' . $year;
        }
        return $date;
    }
}
