<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->role = $this->session->userdata('role');
        $this->ID = $this->session->userdata('id');
    }
    public function index($IDU, $url = null, $tamu = null)
    {
        $undangan = $this->M_undangan->ambil_satu_data(['IDU' => $IDU]);
        if ($undangan) {
            if ($undangan['IDC'] === $this->session->userdata('id')) {
                $data['kembali'] = $this->session->userdata('kembali');
            }
            $ID_Template = $undangan['ID_Template'];
            $template = $this->M_template->ambil_satu_data(['ID_Template' => $ID_Template]);
            $data['tamu'] = str_replace('%20', ' ', $tamu);
            $data['template'] = $template['nama_template'];
            $data['tema'] = $template['tema'];
            $data['IDDU'] = $undangan['IDDU'];
            $data['IDC'] = $undangan['IDC'];
            $data['IDU'] = $IDU;
            $data['title'] = str_replace('_', ' & ', $url);
            $this->load->view('template/undangan/head', $data);
            $this->load->view('undangan/template', $data);
            $this->load->view('template/undangan/footer');
        } else {
            redirect('home');
        }
    }
    public function tambah()
    {
        $data['template'] = $this->M_template->ambil_semua();
        $data['title'] = "Pilih Template " . nama_web();
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('customer/tambah_undangan');
        $this->load->view('template/dashboard/footer');
        $this->session->set_userdata('kembali', current_url());
    }
    public function form($id_template = null)
    {
        $cek = $this->M_undangan->ambil_satu_data(['IDC' => $this->session->userdata('id'), 'ID_Template' => $id_template]);
        if (!$cek) {
            if ($_POST) {
                $this->M_undangan->tambah_data_undangan($id_template);
            }
            $data['contekan'] = $this->M_undangan->kata_pengantar();
            $data['template'] = $this->M_template->ambil_satu_data(['ID_Template' => $id_template]);
            $data['title'] = "Form Data Undangan " . nama_web();
            $this->load->view('customer/form_data_undangan', $data);
        } else {
            notif_gagal('anda sudah menggunakan template tersebut!');
            redirect($this->session->userdata('kembali'));
        }
    }
    public function semua_data($IDU = null)
    {
        $undangan = $this->M_undangan->ambil_satu_data(['IDU' => $IDU]);
        if ($undangan) {
            $data['IDC'] = $undangan['IDC'];
            $data['IDU'] = $undangan['IDU'];
            $data['IDDU'] = $undangan['IDDU'];
            $data['contekan'] = $this->M_undangan->kata_pengantar();
            $data['title'] = "Data undangan Saya";
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $this->role);
            $this->load->view('customer/edit-undangan');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('link_form', current_url());
            $this->session->set_userdata('kembali', current_url());
        }
    }
    public function saya($IDC = null)
    {
        if ($IDC) {
            $role = $this->session->userdata('role');
            $this->db->order_by('IDU', 'DESC');
            $data['undangan_saya'] = $this->db->get_where('v_undangan_saya', ['IDC' => $this->ID])->result_array();
            $data['title'] = "Undangan saya | " . nama_web();
            $this->load->view('template/dashboard/head', $data);
            $this->load->view('template/dashboard/header');
            $this->load->view('template/dashboard/sidebar/' . $role);
            $this->load->view('customer/undangan_saya');
            $this->load->view('template/dashboard/footer');
            $this->session->set_userdata('kembali', current_url());
        } else {
            redirect('customer/home/dashboard');
        }
    }
    public function edit($table, $IDDU)
    {
        $file_foto = upload_foto('foto');
        if ($file_foto) {
            $_POST += [
                'foto' => $file_foto,
            ];
        }
        unset($_POST['foto_lama']);
        $hasil = $this->M_undangan->rubah_undangan($table, $IDDU);
        if ($hasil) {
            $this->session->set_flashdata('notif', '<div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
                <strong>berhasil rubah data ' . str_replace('_', ' ', $table) . '!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect($this->session->userdata('link_form'));
        } else {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                <strong>Gagal rubah data ' . str_replace('_', ' ', $table) . '!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect($this->session->userdata('link_form'));
        }
    }
    public function edit_ajax($table, $IDDU)
    {
        $this->db->where('IDDU', $IDDU);
        $this->db->update($table, $_POST);
        if ($this->db->affected_rows() > 0) {
            echo 'Berhasil';
        } else {
            echo 'gagal';
        }
    }
    public function edit_foto()
    {
        echo 'Berhasil';
    }
}
