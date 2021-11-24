<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function dashboard()
    {
        $data['title'] = "Dashboard " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('administrator/dashboard');
        $this->load->view('template/dashboard/footer');
    }
}
