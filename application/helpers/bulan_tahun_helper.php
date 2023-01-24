
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// if (!function_exists('show_bulan')) {
function show_bulan()
{
    $bulan = [];
    for ($a = 1; $a <= 12; $a++) {
        switch ($a) {
            case 1;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Januari']);
                break;
            case 2;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Februari']);
                break;
            case 3;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Maret']);
                break;
            case 4;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'April']);
                break;
            case 5;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Mei']);
                break;
            case 6;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Juni']);
                break;
            case 7;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Juli']);
                break;
            case 8;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'Agustus']);
                break;
            case 9;
                array_push($bulan, ['id' => $a, 'text_bulan' => '0' . $a, 'values' => 'September']);
                break;
            case 10;
                array_push($bulan, ['id' => $a, 'text_bulan' => $a, 'values' => 'Oktober']);
                break;
            case 11;
                array_push($bulan, ['id' => $a, 'text_bulan' => $a, 'values' => 'November']);
                break;
            case 12;
                array_push($bulan, ['id' => $a, 'text_bulan' => $a, 'values' => 'Desember']);
                break;
        }
    }
    $data['bulan'] = $bulan;
    return $data;
}
function show_tahun()
{
    $tahun_awal = date('Y') - 20;
    $tahun_akhir = date('Y');
    $tahun = [];
    for ($a = $tahun_akhir; $a >= $tahun_awal; $a--) {
        array_push($tahun, ['id' => $a, 'values' => $a]);
    }
    return $tahun;
}
function get_name_bulan($valBulan)
{
    $textBulan = '';
    switch ($valBulan) {
        case 1;
            $textBulan = 'Januari';
            break;
        case 2;
            $textBulan = 'Februari';
            break;
        case 3;
            $textBulan = 'Maret';
            break;
        case 4;
            $textBulan = 'April';
            break;
        case 5;
            $textBulan = 'Mei';
            break;
        case 6;
            $textBulan = 'Juni';
            break;
        case 7;
            $textBulan = 'Juli';
            break;
        case 8;
            $textBulan = 'Agustus';
            break;
        case 9;
            $textBulan = 'September';
            break;
        case 10;
            $textBulan = 'Oktober';
            break;
        case 11;
            $textBulan = 'November';
            break;
        case 12;
            $textBulan = 'Desember';
            break;
    }
    return $textBulan;
}
function get_bulan_periode($valBulan)
{
    $textBulan = '';
    switch ($valBulan) {
        case 1;
            $textBulan = '01';
            break;
        case 2;
            $textBulan = '02';
            break;
        case 3;
            $textBulan = '03';
            break;
        case 4;
            $textBulan = '04';
            break;
        case 5;
            $textBulan = '05';
            break;
        case 6;
            $textBulan = '06';
            break;
        case 7;
            $textBulan = '07';
            break;
        case 8;
            $textBulan = '08';
            break;
        case 9;
            $textBulan = '09';
            break;
        case 10;
            $textBulan = '10';
            break;
        case 11;
            $textBulan = '11';
            break;
        case 12;
            $textBulan = '12';
            break;
    }
    return $textBulan;
}
// }
