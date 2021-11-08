<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
            $this->load->view('demo/template/head', $data);
            $this->load->view('undangan/template', $data);
            $this->load->view('demo/template/footer');
        } else {
            redirect('home');
        }
    }
    public function gift()
    {
        $IDVA = $this->input->post('IDVA');
        $nominal = $this->input->post('nominal');
        if ($IDVA && $nominal) {
            $va = $this->db->get_where('virtual_account', ['IDVA' => $IDVA])->row_array();
            $nama_akun = $va['nama_VA'];
            $nomer_akun = $va['nomer_VA'];
            $An = $va['A/N'];
            $output = <<<HTML
                <div class="card my-3 shadow px-3 pt-3 rounded rounded-3">
                    <div class="row text-dark">
                        <div class="col-12 text-center">
                            <h6>Silahkan lanjutkan transfer ke</h6>
                            <hr>
                        </div>
                        <div class="col p-0">
                            <p>Nama akun</p>
                            <p>Nomer</p>
                            <p>A/n</p>
                        </div>
                        <div class="col p-0">
                            <p>$nama_akun</p>
                            <p>$nomer_akun</p>
                            <p>$An</p>
                        </div>
                        <div class="col-12 text-center">
                            <hr>
                            <h6>Rp. $nominal</h6>
                            <hr>
                        </div>
                    </div>
                </div>
                HTML;
            echo $output;
        }
    }
    public function kehadiran()
    {
        $cek = $this->db->get_where('buku_tamu', ['IDU' => $this->input->post('IDU'), 'nama' => $this->input->post('nama')])->row_array();
        if (!$cek) {
            $data = [
                'IDU' => $this->input->post('IDU'),
                'nama' => $this->input->post('nama'),
                'hubungan' => $this->input->post('hubungan'),
                'kehadiran' => $this->input->post('kehadiran'),
            ];
            $this->db->insert('buku_tamu', $data);
            $hasil = $this->db->affected_rows();
            if ($hasil > 0) {
                echo "Berhasil";
            } else {
                echo "Gagal";
            }
        } else {
            echo "Ada";
        }
    }
    public function komentar()
    {
        if ($this->input->post('nama_pengirim') && $this->input->post('pesan')) {
            $data = [
                'IDU' => $this->input->post('IDU'),
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'pesan' => $this->input->post('pesan'),
                'tanggal_dikirim' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('komentar', $data);
            $hasil = $this->db->affected_rows();
            if ($hasil > 0) {
                echo "Berhasil";
            } else {
                echo "Gagal";
            }
        } else {
            echo "Gagal";
        }
    }
}
