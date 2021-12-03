<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        $data['pembayaran'] = $this->CRUD->ambilSemuaData('v_transaksi', ['IDC' => $this->ID, 'status_lunas' => $status]);
        $data['judul'] = 'Pembayaran ' . ucwords($status) . ' Konfirmasi';
        $data['title'] = 'Pembayaran ' . ucwords($status) . ' Konfirmasi';
        if ($status == 'lunas') {
            $data['judul'] = 'Pembayaran ' . ucwords($status);
            $data['title'] = 'Pembayaran ' . ucwords($status);
        }
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('customer/pembayaran');
        $this->load->view('template/dashboard/footer');
    }
}
