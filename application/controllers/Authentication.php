<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = "Authentication " . nama_web();
        $this->load->view('authentication');
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->M_auth->login($email, $password);
    }
    public function daftar()
    {
        if ($this->session->userdata('id')) {
            $role = $this->session->userdata('role');
            redirect($this->session->userdata('dashboard/home/' . $role));
        }
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap wajib di isi',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis kelamin wajib di isi',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[customer.email]', [
            'required' => 'Email wajib di isi',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[konfirmasi_password]', [
            'required' => 'Password wajib di isi',
            'min_length' => 'Password Minimal 6 Character',
            'matches' => ''
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi_password', 'trim|required|matches[password]', [
            'required' => 'Password konfirmasi wajib di isi',
            'matches' => 'Password konfirmasi tidak sama!'
        ]);
        if ($this->form_validation->run() === false) {
            $this->load->view('authentication');
        } else {
            $this->M_auth->daftar();
        }
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
