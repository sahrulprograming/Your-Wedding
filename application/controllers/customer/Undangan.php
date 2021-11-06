<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function tambah()
    {
        $role = $this->session->userdata('role');
        $data['template'] = $this->M_template->ambil_semua();
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $role);
        $this->load->view('customer/tambah_undangan');
        $this->load->view('template/dashboard/footer');
    }
    public function form($id_template = 1)
    {
        format_tanggal_database('12 November 2021');
        $role = $this->session->userdata('role');
        $data['template'] = $this->M_template->ambil_satu_data(['ID_Template' => $id_template]);
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('customer/form_data_undangan', $data);
    }
    public function coba()
    {
        echo "Berhasil";
    }
}
