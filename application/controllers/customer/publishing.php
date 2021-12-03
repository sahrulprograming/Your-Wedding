<?php
defined('BASEPATH') or exit('No direct script access allowed');

class publishing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function index($status = null)
    {
        if ($status) {
            $data['title'] = "Publishing" . $status . nama_web();
            $data['status'] = $status;
            $data['judul'] = "Publishing " . ucwords($status);
            if ($status == 'publish') {
                $data['judul'] = 'Publishing Berlangsung';
                $data['title'] = "Publishing Berlangsung" . nama_web();
            }
            $data['undangan'] = $this->CRUD->ambilSemuaData('undangan', ['IDC' => $this->ID, 'status' => $status]);
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('customer/publishing');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            redirect($this->session->userdata('kembali'));
        }
    }
}
