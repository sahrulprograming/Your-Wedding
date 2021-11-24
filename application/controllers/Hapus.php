<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function data($table = null, $field = null, $id = null, $path_penyimpanan = null)
    {
        $this->db->delete($table, [$field => $id]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            echo 'Berhasil';
        } else {
            echo 'Gagal';
        }
    }
    public function foto($table = null, $field = null, $id = null)
    {
        $this->db->delete($table, [$field => $id]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            echo 'Berhasil';
        } else {
            echo 'Gagal';
        }
    }
}
