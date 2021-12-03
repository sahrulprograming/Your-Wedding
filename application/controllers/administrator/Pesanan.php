<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
            $data['title'] = "Pesanan " . nama_web();
            $data['judul'] = "pesanan $status";
            if ($status == 'menunggu') {
                $data['judul'] = "pesanan $status konfirmasi";
            }
            $this->db->order_by('no_pembayaran', 'DESC');
            $data['pesanan'] = $this->CRUD->ambilSemuaData('v_transaksi', ['status_lunas' => $status]);
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/pesanan');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            redirect('administrator/home/dashboard');
        }
    }
}
