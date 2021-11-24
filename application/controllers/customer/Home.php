<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
        $this->IDC = $this->session->userdata('id');
    }
    public function dashboard()
    {
        $data['komentar_hari_ini'] = $this->db->get_where('v_komentar_hari_ini', ['IDC' => $this->IDC])->result_array();
        $data['komentar_minggu_ini'] = $this->db->get_where('v_komentar_minggu_ini', ['IDC' => $this->IDC])->result_array();
        $data['semua_komentar'] = $this->db->get_where('v_semua_komentar', ['IDC' => $this->IDC])->result_array();
        $role = $this->session->userdata('role');
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $role);
        $this->load->view('customer/dashboard');
        $this->load->view('template/dashboard/footer');
        $this->session->set_userdata('kembali', current_url());
    }
}
