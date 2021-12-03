<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        $data['title'] = "Authentication " . nama_web();
        $this->load->view('template/default/head', $data);
        $this->load->view('authentication/login');
        $this->load->view('template/default/footer');
    }
    // login with ajax
    public function loginAct()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        echo json_encode($this->M_auth->login($email, $password));
    }
    public function daftar()
    {
        if ($this->session->userdata('id')) {
            $role = $this->session->userdata('role');
            redirect($this->session->userdata('dashboard/home/' . $role));
        }
        $data['title'] = "Authentication " . nama_web();
        $this->load->view('template/default/head', $data);
        $this->load->view('authentication/daftar');
        $this->load->view('template/default/footer');
    }
    public function daftarAct()
    {
        echo json_encode($this->M_auth->daftar());
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Logout Berhasil!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('home');
    }
}
