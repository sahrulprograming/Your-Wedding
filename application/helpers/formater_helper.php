<?php

function ambil_hari($date)
{
    $hari = date('D', strtotime($date));
    if ($hari === 'Mon') {
        return 'Senin';
    } elseif ($hari === 'Tue') {
        return 'Selasa';
    } elseif ($hari === 'Wed') {
        return 'Rabu';
    } elseif ($hari === 'Thu') {
        return 'Kamis';
    } elseif ($hari === 'Fri') {
        return 'Jum\'at';
    } elseif ($hari === 'Sat') {
        return 'Sabtu';
    } elseif ($hari === 'Sun') {
        return 'Minggu';
    }
}
function format_tanggal($date)
{
    return date('d F Y', strtotime($date));
}
function jam_komentar($date)
{
    return date('H:i', strtotime($date));
}

function format_jam($jam)
{
    return substr($jam, 0, 5);
}

function format_tanggal_database($tanggal)
{
    $hari = explode(' ', $tanggal)[0];
    $bulan = explode(' ', $tanggal)[1];
    $tahun = explode(' ', $tanggal)[2];
    if (strtolower($bulan) == 'january')
        echo "$tahun-$bulan-$hari";
}
