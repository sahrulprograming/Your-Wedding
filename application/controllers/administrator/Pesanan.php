<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function index($status = null)
    {
        if ($status) {
            $data['title'] = "Dashboard " . nama_web();
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/pesanan');
            $this->load->view('template/dashboard/footer');
        } else {
            redirect('administrator/home/dashboard');
        }
    }
}
