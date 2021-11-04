<?php
ini_set('date.timezone', 'Asia/Jakarta');
function data_undangan($IDDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data('data_undangan', ['IDDU' => $IDDU]);
    if ($data) {
        return $data[$field];
    }
}

function mempelai_pria($IDDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data('mempelai_pria', ['IDDU' => $IDDU]);
    if ($data) {
        return $data[$field];
    }
}
function mempelai_wanita($IDDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data('mempelai_wanita', ['IDDU' => $IDDU]);
    if ($data) {
        return $data[$field];
    }
}
function data_akad($IDDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data('J_akad', ['IDDU' => $IDDU]);
    if ($data) {
        return $data[$field];
    }
}
function data_resepsi($IDDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data('J_resepsi', ['IDDU' => $IDDU]);
    if ($data) {
        return $data[$field];
    }
}

function virtual_account($IDDU)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->semua_data('virtual_account', ['IDDU' => $IDDU]);
    if ($data) {
        return $data;
    }
}

function komentar_terbaru($IDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data_terbaru('komentar', ['IDU' => $IDU], 'IDK', 1);
    return $data[0][$field];
}
function semua_komentar($IDU)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->data_terbaru('komentar', ['IDU' => $IDU], 'IDK');
    return $data;
}

function foto_prewedd($IDDU)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->semua_data('galery', ['IDDU' => $IDDU]);
    if ($data) {
        return $data;
    }
}
