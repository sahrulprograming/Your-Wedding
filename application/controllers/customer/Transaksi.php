<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
        $this->IDC = $this->session->userdata('id');
    }
    public function publish($IDU)
    {
        $data['undangan'] = $this->db->get_where('v_undangan_saya', ['IDU' => $IDU])->row_array();
        $data['IDU'] = $IDU;
        $data['pilih_publish'] = $this->M_transaksi->pilih_publish();
        $data['dompet_admin'] = $this->M_transaksi->dompet_admin();
        $data['title'] = 'Publish undangan';
        $this->load->view('template/dashboard/head', $data);
        $this->load->view('template/dashboard/header');
        $this->load->view('template/dashboard/sidebar/' . $this->role);
        $this->load->view('customer/transaksi');
        $this->load->view('template/dashboard/footer');
    }
    public function metode()
    {
        $metode = $this->db->get_where('dompet_admin', ['id_dompet' => $this->input->post('id_dompet')])->row_array();
        if ($metode) {
            $nama_dompet = $metode['nama_dompet'];
            $nomer = $metode['nomer'];
            $AN = $metode['A/N'];
            $harga = $this->M_transaksi->harga_publish($this->input->post('IDHP'));
            $harga_rupiah = number_format($harga, 0, ',', '.');
            $output = <<<HTML
                <div class="card bg-light text-dark my-3">
                    <div class="card-header text-center">
                        <h3>pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <style>
                            .card-body div p {
                                line-height: 10px;
                            }
                        </style>
                        <div class="row">
                            <div class="col">
                                <p>Nama Akun</p>
                                <p>Nomor Akun</p>
                                <p>Atas Nama</p>
                            </div>
                            <div class="col">
                                <p>$nama_dompet</p>
                                <p>$nomer</p>
                                <p>$AN</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <h4>Rp. $harga_rupiah</h4>
                    </div>
                </div>
            HTML;
            $data = [
                'output' => $output,
                'harga' => $harga,
                'id_dompet' => $this->input->post('id_dompet')
            ];
            echo json_encode($data);
        }
    }
    public function bayar()
    {
        if ($_FILES['bukti_bayar']['name']) {
            $bukti = upload_foto('bukti_bayar');
            if ($bukti) {
                $publish = [
                    'status' => 'menunggu',
                    'IDHP' => $this->input->post('IDHP'),
                    'IDU' => $this->input->post('IDU'),
                ];
                $this->db->trans_begin();
                $this->db->insert('publishing', $publish);
                if ($this->db->affected_rows() > 0) {
                    $this->db->order_by('invoice', 'DESC');
                    $this->db->limit(1);
                    $publishing = $this->db->get_where('publishing', ['IDU' => $this->input->post('IDU'), 'status' => 'menunggu'])->row_array();
                    $data = [
                        'tanggal_upload' => date('Y-m-d'),
                        'bukti_bayar' => $bukti,
                        'total_bayar' => $this->input->post('harga'),
                        'status_lunas' => 'belum lunas',
                        'invoice' => $publishing['invoice'],
                        'id_dompet' => $this->input->post('id_dompet'),
                    ];
                    $cek = $this->db->get_where('pembayaran', ['invoice' => $this->input->post('invoice')])->row_array();
                    if (!$cek) {
                        $this->db->insert('pembayaran', $data);
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                            <strong>Gagal upload bukti!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect($this->session->userdata('kembali'));
                        } else {
                            $this->db->trans_commit();
                            $this->db->update('publishing', ['status' => 'menunggu'], ['invoice' => $this->input->post('invoice')]);
                            $this->session->set_flashdata('notif', '<div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
                            <strong>Berhasil upload bukti tunggu konfirmasi admin yah!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect($this->session->userdata('kembali'));
                        }
                    } else {
                        $this->db->update('pembayaran', $data, ['invoice' => $this->input->post('invoice')]);
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                            <strong>Gagal upload bukti!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect($this->session->userdata('kembali'));
                        } else {
                            $this->db->trans_commit();
                            $this->db->update('publishing', ['status' => 'menunggu'], ['invoice' => $this->input->post('invoice')]);
                            $this->session->set_flashdata('notif', '<div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
                            <strong>Berhasil upload bukti tunggu konfirmasi admin yah!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect($this->session->userdata('kembali'));
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                    <strong>Format foto dilarang!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect($this->session->userdata('kembali'));
            }
        } else {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                    <strong>Anda belum upload bukti!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect($this->session->userdata('kembali'));
        }
    }
}
