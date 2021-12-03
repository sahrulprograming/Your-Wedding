<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publishing extends CI_Controller
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
            $data['title'] = "publishing " . nama_web();
            $data['judul'] = "publishing $status";
            $data['status'] = $status;
            if ($status == 'publish') {
                $data['judul'] = "publishing berlangsung";
            }
            $this->db->order_by('IDU', 'DESC');
            $this->db->where_not_in('IDC', '22111001');
            $data['undangan'] = $this->CRUD->ambilSemuaData('undangan', ['status' => $status]);
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/publishing');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            redirect('administrator/home/dashboard');
        }
    }
}
