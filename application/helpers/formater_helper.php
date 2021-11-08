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

function format_tanggal_database($date)
{
    return date('Y-m-d', strtotime($date));
}

function format_embed($url)
{
    $embed = explode(' ', $url);
    $embed = $embed[1];
    return $embed;
}

function format_link_youtube($link)
{
    $youtube = explode('/', $link);
    if (array_search('youtu.be', $youtube)) {
        $url = $youtube[3];
    } elseif (array_search('www.youtube.com', $youtube)) {
        $url = explode('=', $youtube[3]);
        $url = $url[1];
    }
    return $url;
}
function format_nama_ayah($ortu)
{
    $ayah = explode(' ', $ortu);
    return $ayah[1];
}
function format_nama_ibu($ortu)
{
    $ibu = explode(' ', $ortu);
    return $ibu[4];
}
