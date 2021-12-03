<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_undangan extends CI_Model
{
    public function ambil_satu_data($where)
    {
        $this->db->where($where);
        return $this->db->get('undangan')->row_array();
    }
    public function data($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table)->row_array();
    }
    public function semua_data($table, $where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->result_array();
    }
    public function data_terbaru($table, $where, $order_by, $limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');
        return $this->db->get($table)->result_array();
    }
    public function tambah_data_undangan($id_template)
    {
        $data = [
            'IDC' => $this->session->userdata('id'),
            'kata_pengantar' => $this->input->post('kata_pengantar'),
            'video' => $this->input->post('video_youtube'),
            'alamat_kirim_kado' => $this->input->post('alamat_kado'),
            'embed_alamat_kirim_kado' => format_embed($this->input->post('embed_alamat_kado')),
        ];
        $this->db->trans_begin();
        $this->db->insert('data_undangan', $data);
        $hasil = $this->db->affected_rows();
        if ($hasil > 0) {
            $du = $this->db->where('IDC', $this->session->userdata('id'));
            $du = $this->db->order_by('IDDU', 'DESC');
            $du = $this->db->limit(1);
            $du = $this->db->get('data_undangan')->row_array();
            $m_pria = [
                'IDDU' => $du['IDDU'],
                'foto' => upload_foto('foto_pria'),
                'nama_lengkap' => $this->input->post('nama_lengkap_pria'),
                'nama_panggilan' => $this->input->post('nama_panggilan_pria'),
                'ortu' => 'bpk ' . $this->input->post('ayah_pria') . ' & ibu ' . $this->input->post('ibu_pria'),
            ];
            $m_wanita = [
                'IDDU' => $du['IDDU'],
                'foto' => upload_foto('foto_wanita'),
                'nama_lengkap' => $this->input->post('nama_lengkap_wanita'),
                'nama_panggilan' => $this->input->post('nama_panggilan_wanita'),
                'ortu' => 'bpk ' . $this->input->post('ayah_wanita') . ' & ibu ' . $this->input->post('ibu_wanita'),
            ];
            $j_akad = [
                'IDDU' => $du['IDDU'],
                'tanggal' => format_tanggal_database($this->input->post('tanggal_akad')),
                'jam' => $this->input->post('jam_akad'),
                'lokasi' => $this->input->post('lokasi_akad'),
                'lokasi_embed' => format_embed($this->input->post('lokasi_akad_embed')),
            ];
            $j_resepsi = [
                'IDDU' => $du['IDDU'],
                'tanggal' => format_tanggal_database($this->input->post('tanggal_resepsi')),
                'jam' => $this->input->post('jam_resepsi'),
                'lokasi' => $this->input->post('lokasi_resepsi'),
                'lokasi_embed' => format_embed($this->input->post('lokasi_resepsi_embed')),
            ];
            if (count($_FILES['foto']['name'])) {
                $galery = [];
                for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
                    $galery[] =  [
                        'IDDU' => $du['IDDU'],
                        'foto' => upload_foto('foto', $i)
                    ];
                }
            }
            $VA = [];
            for ($i = 1; $i <= $this->input->post('total_VA'); $i++) {
                $VA[] = [
                    'IDDU' => $du['IDDU'],
                    'nama_VA' => $this->input->post('nama_VA_' . $i),
                    'nomer_VA' => $this->input->post('nomer_VA_' . $i),
                    'A/N' => $this->input->post('atas_nama_' . $i),
                ];
            }
            $this->db->insert('mempelai_pria', $m_pria);
            $this->db->insert('mempelai_wanita', $m_wanita);
            $this->db->insert('j_akad', $j_akad);
            $this->db->insert('j_resepsi', $j_resepsi);
            $this->db->insert_batch('galery', $galery);
            $this->db->insert_batch('virtual_account', $VA);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $undangan = [
                    'url' => $this->input->post('nama_panggilan_pria') . '_' . $this->input->post('nama_panggilan_wanita'),
                    'IDDU' => $du['IDDU'],
                    'IDC' => $this->session->userdata('id'),
                    'ID_Template' => $id_template
                ];
                $this->db->insert('undangan', $undangan);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    notif_berhasil('Berhasil Membuat Undangan');
                    redirect('customer/undangan/saya/' . $this->ID);
                } else {
                    notif_gagal('Gagal Membuat Undangan');
                    redirect('customer/undangan/saya/' . $this->ID);
                }
            }
        }
    }
    public function kata_pengantar()
    {
        $this->db->distinct();
        $this->db->select('kata_pengantar');
        $this->db->order_by('IDDU', 'DESC');
        return $this->db->get('data_undangan')->result_array();
    }

    public function rubah_undangan($table, $IDDU)
    {
        if (array_key_exists('tanggal', $_POST)) {
            $_POST['tanggal'] = format_tanggal_database($this->input->post('tanggal'));
        }
        $this->db->where('IDDU', $IDDU);
        $this->db->update($table, $_POST);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
