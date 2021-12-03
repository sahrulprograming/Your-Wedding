<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function pilih_publish()
    {
        return $this->db->get('harga_publish')->result_array();
    }
    public function dompet_admin()
    {
        return $this->db->get('dompet_admin')->result_array();
    }
    public function harga_publish($IDHP)
    {
        $harga = $this->db->get_where('harga_publish', ['IDHP' => $IDHP])->row_array();
        if ($harga) {
            return $harga['harga'];
        }
    }
    public function invoice($IDHP, $IDU, $status)
    {
        $invoice = $this->db->get_where('publishing', ['IDHP' => $IDHP, 'IDU' => $IDU, 'status' => $status])->row_array();
        if ($invoice) {
            return $invoice['invoice'];
        }
    }
    public function penghasilan()
    {
        $total = 0;
        $data = $this->db->get_where('pembayaran', ['status_lunas' => 'lunas'])->result_array();
        if ($data) {
            foreach ($data as $d) {
                $total += (int)$d['total_bayar'];
            }
        }
        return $total;
    }
    public function transaksi_minggu_ini()
    {
        return $this->db->query("SELECT * FROM v_transaksi WHERE tanggal_upload between current_timestamp() + interval -7 day and current_timestamp() + interval -1 day")->result_array();
    }
}
