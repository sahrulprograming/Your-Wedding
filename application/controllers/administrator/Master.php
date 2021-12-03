<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function customer($id = null)
    {
        $data['table'] = 'customer';
        $list_fields = $this->db->field_data($data['table']);
        $data['id'] = $list_fields[0]->name;
        foreach (array_keys($_POST) as $name) {
            $this->form_validation->set_rules($name, $name, 'required|trim', [
                'required' => ucfirst(str_replace('_', ' ', $name)) . 'wajib di isi',
            ]);
        }
        if ($this->form_validation->run() === false) {
            $data['field'] = array_slice($list_fields, 1, 4);
            $this->db->order_by('IDC', 'DESC');
            $data['data'] = $this->CRUD->ambilSemuaData($data['table']);
            $data['text_align'] = [
                '', // Foto
                '', // Email
                '', // Nama lengkap
                'text-center', // Jenis kelamin
            ];
            $data['title'] = "customer " . nama_web();
            $data['judul'] = "data customer";
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/v_master');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            $where = [$data['id'] => $id];
            $this->CRUD->rubahdata($data['table'], $where);
        }
    }
    public function harga_publish($id = null)
    {
        $data['table'] = 'harga_publish';
        $list_fields = $this->db->field_data($data['table']);
        $data['id'] = $list_fields[0]->name;
        foreach (array_keys($_POST) as $name) {
            $this->form_validation->set_rules($name, $name, 'required|trim', [
                'required' => ucfirst(str_replace('_', ' ', $name)) . 'wajib di isi',
            ]);
        }
        if ($this->form_validation->run() == false) {
            $data['field'] = array_slice($list_fields, 1, 4);
            $data['judul'] = "harga publish";
            $data['data'] = $this->CRUD->ambilSemuaData($data['table']);
            $data['input_type'] = [
                '', // Judul Durasi
                '', // Durasi Hari
                '', // Harga 
                'textarea', // Keterangan
            ];
            $data['title'] = "Harga Publish " . nama_web();
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/v_master');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            $where = [$data['id'] => $id];
            $this->CRUD->rubahdata($data['table'], $where);
        }
    }
    public function dompet_admin($id = null)
    {
        $data['table'] = 'dompet_admin';
        $list_fields = $this->db->field_data($data['table']);
        $data['id'] = $list_fields[0]->name;
        foreach (array_keys($_POST) as $name) {
            $this->form_validation->set_rules($name, $name, 'required|trim', [
                'required' => ucfirst(str_replace('_', ' ', $name)) . 'wajib di isi',
            ]);
        }
        if ($this->form_validation->run() == false) {
            $data['field'] = array_slice($list_fields, 1, 4);
            $data['judul'] = "dompet admin";
            $data['data'] = $this->CRUD->ambilSemuaData($data['table']);
            $data['title'] = "Harga Publish " . nama_web();
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('administrator/v_master');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            $where = [$data['id'] => $id];
            $this->CRUD->rubahdata($data['table'], $where);
        }
    }
}
