<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function data($table = null, $field = null, $id = null)
    {
        $this->db->delete($table, [$field => $id]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Data berhasil di hapus',
                'button' => 'btn btn-success'
            ];
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Data gagal di hapus',
                'button' => 'btn btn-danger'
            ];
        }
        echo json_encode($output);
    }
    public function foto($table = null, $field = null, $id = null, $foto)
    {
        $this->db->delete($table, [$field => $id]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            unlink(FCPATH . "./assets/img/" . $this->session->userdata('role') . "/" . $this->session->userdata('id') . "/$foto");
            $output = [
                'status' => 'berhasil',
                'pesan' => 'Foto berhasil di hapus'
            ];
            echo json_encode($output);
        } else {
            $output = [
                'status' => 'error',
                'pesan' => 'Foto gagal di hapus'
            ];
            echo json_encode($output);
        }
    }
}
