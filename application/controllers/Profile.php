<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
        $this->email = $this->session->userdata('email');
    }
    public function index()
    {
        $where = ['IDC' => $this->ID];
        if ($this->role == 'administrator') {
            $where = ['ID_admin' => $this->ID];
        }
        $data['profile'] = $this->CRUD->ambilSatuData($this->role, $where);
        $data['title'] = "Profile " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('profile');
        $this->load->view('template/dashboard/footer');
        $this->session->set_userdata('kembali', current_url());
    }
    public function ubah()
    {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];
        $this->db->update($this->role, $data, ['email' => $this->email]);
        if ($this->db->affected_rows() > 0) {
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Berhasil merubah profile',
                'button' => 'btn btn-success'
            ];
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Gagal merubah profile',
                'button' => 'btn btn-danger'
            ];
        }
        echo json_encode($output);
    }
    public function ubah_foto()
    {
        $foto = upload_foto('foto');
        if ($foto) {
            $this->db->update($this->role, ['foto' => $foto], ['email' => $this->session->userdata('email')]);
            if ($this->db->affected_rows() > 0) {
                $output = [
                    'status' => 'success',
                    'judul' => 'Selamat!',
                    'pesan' => 'Berhasil merubah foto',
                    'button' => 'btn btn-success'
                ];
            } else {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Gagal merubah foto',
                    'button' => 'btn btn-danger'
                ];
            }
        }
        echo json_encode($output);
    }
    public function ubah_password()
    {
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $password_konfirmasi = $this->input->post('password_konfirmasi');
        $cek_user = $this->CRUD->ambilSatuData($this->role, ['email' => $this->email]);
        if (password_verify($password_lama, $cek_user['password'])) {
            if ($password_lama == $password_baru) {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Password lama sama dengan password baru',
                    'button' => 'btn btn-danger'
                ];
            } elseif ($password_baru != $password_konfirmasi) {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Password konfirmasi harus sama dengan password baru',
                    'button' => 'btn btn-danger'
                ];
            } elseif (strlen($password_baru) < 6) {
                $output = [
                    'status' => 'error',
                    'judul' => 'Opss..!',
                    'pesan' => 'Password minimal 6 character',
                    'button' => 'btn btn-danger'
                ];
            } else {
                $this->db->update($this->role, ['password' => password_hash($password_baru, PASSWORD_DEFAULT)], ['email' => $this->email]);
                if ($this->db->affected_rows() > 0) {
                    $output = [
                        'status' => 'success',
                        'judul' => 'Selamat!',
                        'pesan' => 'Password berhasil dirubah',
                        'button' => 'btn btn-success'
                    ];
                } else {
                    $output = [
                        'status' => 'error',
                        'judul' => 'Opss..!',
                        'pesan' => 'Password gagal dirubah',
                        'button' => 'btn btn-danger'
                    ];
                }
            }
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Password lama salah',
                'button' => 'btn btn-danger'
            ];
        }
        echo json_encode($output);
    }
}
