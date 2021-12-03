<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function index($IDU = null)
    {
        if ($IDU) {
            $data['title'] = "Buku Tamu " . nama_web();
            $data['tamu'] = $this->db->get_where('buku_tamu', ['IDU' => $IDU])->result_array();
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('customer/buku_tamu');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            redirect($this->session->userdata('kembali'));
        }
    }
}
