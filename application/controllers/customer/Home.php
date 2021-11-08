<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('kembali', current_url());
    }
    public function dashboard()
    {
        $role = $this->session->userdata('role');
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $role);
        $this->load->view('customer/dashboard');
        $this->load->view('template/dashboard/footer');
    }
}
