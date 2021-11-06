<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_undangan extends CI_Model
{
    public function ambil_satu_data($where)
    {
        $this->db->where($where);
        return $this->db->get('undangan')->row_array();
    }
    public function data($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table)->row_array();
    }
    public function semua_data($table, $where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->result_array();
    }
    public function data_terbaru($table, $where, $order_by, $limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');
        return $this->db->get($table)->result_array();
    }
    public function tambah_data_undangan()
    {
        echo $_POST;
        die;
    }
}
