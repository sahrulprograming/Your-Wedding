<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function konfirmasi()
    {
        $no_pembayaran = $this->input->post('no_pembayaran');
        $IDU = $this->input->post('IDU');
        $durasi = $this->input->post('durasi');
        $mulai_publish = date('Y-m-d');
        $selesai_publish = date('Y-m-d', (strtotime("+$durasi day", strtotime($mulai_publish))));
        $undangan = [
            'status' => 'publish',
            'mulai_publish' => $mulai_publish,
            'selesai_publish' => $selesai_publish
        ];
        $this->db->trans_begin();
        $this->db->update('pembayaran', ['status_lunas' => 'lunas'], ['no_pembayaran' => $no_pembayaran]);
        $this->db->update('undangan', $undangan, ['IDU' => $IDU]);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Gagal mengkonfirmasi pembayaran ',
                'button' => 'btn btn-danger'
            ];
        } else {
            $this->db->trans_commit();
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Berhasil mengkonfirmasi pembayaran',
                'button' => 'btn btn-success'
            ];
        }
        echo json_encode($output);
    }

    public function tambah_data($table)
    {
        $this->db->insert($table, $_POST);
        if ($this->db->affected_rows() > 0) {
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Berhasil menambah data ' . strtolower(str_replace('_', ' ', $table)),
                'button' => 'btn btn-success'
            ];
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Gagal menambah data ' . strtolower(str_replace('_', ' ', $table)),
                'button' => 'btn btn-danger'
            ];
        }
        echo json_encode($output);
    }
}
