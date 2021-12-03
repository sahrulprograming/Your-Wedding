<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function dashboard()
    {
        $data['transaksi_hari_ini'] = $this->CRUD->ambilSemuaData('v_transaksi', ['tanggal_upload' => date('Y-m-d')]);
        $data['transaksi_minggu_ini'] = $this->M_transaksi->transaksi_minggu_ini();
        $data['transaksi'] = $this->CRUD->ambilSemuaData('v_transaksi');
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('administrator/dashboard');
        $this->load->view('template/dashboard/footer');
        $this->session->set_userdata('kembali', current_url());
    }
}
