<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function login($email, $password)
    {
        $customer = $this->db->get_where('customer', ['email' => $email])->row_array();
        $administrator = $this->db->get_where('administrator', ['email' => $email])->row_array();
        if ($customer) {
            if (password_verify($password, $customer['password'])) {
                $this->session->set_userdata([
                    'role' => 'customer',
                    'id' => $customer['IDC'],
                    'nama' => $customer['nama_lengkap'],
                    'foto' => $customer['foto'],
                    'email' => $customer['email'],
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Login Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('customer/home/dashboard');
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Password Salah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('authentication');
            }
        } elseif ($administrator) {
            if (password_verify($password, $administrator['password'])) {
                $this->session->set_userdata([
                    'role' => 'administrator',
                    'id' => $administrator['IDC'],
                    'nama' => $administrator['nama_lengkap'],
                    'foto' => $administrator['foto'],
                    'email' => $administrator['email'],
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Login Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('administrator/home/dashboard');
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Password Salah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('authentication');
            }
        } else {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Email Belum Terdaftar!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('authentication');
        }
    }
    public function daftar()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = [
            'IDC' => generate_ID('customer', 'IDC'),
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'password' => $password,
            'foto' => 'default-' . $jenis_kelamin . '.png',
        ];
        $this->db->insert('customer', $data);
        $hasil = $this->db->affected_rows();
        if ($hasil > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Daftar Berhasil Silahkan Login!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('authentication');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Daftar Gagal!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}
