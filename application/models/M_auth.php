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
                $cek_file = file_exists(FCPATH . "./assets/img/customer/" . $this->session->userdata('id'));
                if (!$cek_file) {
                    mkdir(FCPATH . "./assets/img/customer/" . $this->session->userdata('id'));
                }
                $output = [
                    'status' => 'success',
                    'judul' => 'Selamat!',
                    'pesan' => 'Login Berhasil!',
                    'button' => 'btn btn-success',
                    'link' => $this->session->userdata('role') . '/home/dashboard'
                ];
            } else {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Password salah!',
                    'button' => 'btn btn-danger'
                ];
            }
        } elseif ($administrator) {
            if (password_verify($password, $administrator['password'])) {
                $this->session->set_userdata([
                    'role' => 'administrator',
                    'id' => $administrator['ID_admin'],
                    'nama' => $administrator['nama_lengkap'],
                    'foto' => $administrator['foto'],
                    'email' => $administrator['email'],
                ]);
                $cek_file = file_exists(FCPATH . "./assets/img/" . $this->session->userdata('role') . "/" . $this->session->userdata('id'));
                if (!$cek_file) {
                    mkdir(FCPATH . "./assets/img/" . $this->session->userdata('role') . "/" . $this->session->userdata('id'));
                }
                $output = [
                    'status' => 'success',
                    'judul' => 'Selamat!',
                    'pesan' => 'Login Berhasil!',
                    'button' => 'btn btn-success',
                    'link' => $this->session->userdata('role') . '/home/dashboard'
                ];
            } else {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Password salah!',
                    'button' => 'btn btn-danger'
                ];
            }
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Email belum terdaftar ',
                'button' => 'btn btn-danger'
            ];
        }
        return $output;
    }
    public function daftar()
    {
        $email = $this->input->post('email');
        $cek_user = $this->CRUD->ambilSatuData('customer', ['email' => $email]);
        $cek_admin = $this->CRUD->ambilSatuData('administrator', ['email' => $email]);
        if ($cek_user || $cek_admin) {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Email sudah terdaftar!',
                'button' => 'btn btn-danger'
            ];
        } else {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
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
                $output = [
                    'status' => 'success',
                    'judul' => 'Selamat!',
                    'pesan' => 'Daftar Berhasil, silahkan login!',
                    'button' => 'btn btn-success',
                    'link' => base_url('authentication/login'),
                ];
            } else {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Daftar gagal, ada yang salah! ',
                    'button' => 'btn btn-danger'
                ];
            }
        }
        return $output;
    }
}
