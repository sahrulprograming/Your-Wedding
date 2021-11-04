<?php
defined('BASEPATH') or exit('No direct script access allowed');

class undangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function tambah()
    {
        $role = $this->session->userdata('role');
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $role);
        $this->load->view('customer/tambah_undangan');
        $this->load->view('template/dashboard/footer');
    }
}
