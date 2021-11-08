<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_template extends CI_Model
{
    public function ambil_semua($where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get('v_template')->result_array();
    }
    public function ambil_satu_data($where)
    {
        $this->db->where($where);
        return $this->db->get('v_template')->row_array();
    }
}
