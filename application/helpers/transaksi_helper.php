<?php
function generate_invoice()
{
    return 'INV/' . date('Ymd') . '/' . time();
}
function status_publishing($IDU)
{
    $ci3 = get_instance();
    $data = $ci3->db->get_where('undangan', ['IDU' => $IDU])->row_array();
    if ($data) {
        return $data['status'];
    }
}
function pembayaran_menunggu($IDU, $field)
{
    $ci3 = get_instance();
    $data = $ci3->db->get_where('v_transaksi', ['IDU' => $IDU, 'status_lunas' => 'menunggu'])->row_array();
    if ($data) {
        return $data[$field];
    }
}
