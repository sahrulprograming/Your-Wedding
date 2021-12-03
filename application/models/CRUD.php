<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->kembali = $this->session->userdata('kembali');
    }
    // Create
    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Read
    public function ambilSemuaData($table, $where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->result_array();
    }
    public function ambilSatuData($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    // Update
    public function rubahdata($table, $where)
    {
        $this->db->update($table, $_POST, $where);
        if ($this->db->affected_rows() > 0) {
            notif_berhasil('Berhasil merubah data ' . strtolower(str_replace('_', ' ', $table)));
            redirect($this->kembali);
        } else {
            notif_gagal('Gagal merubah data ' . strtolower(str_replace('_', ' ', $table)));
            redirect($this->kembali);
        }
    }
}
