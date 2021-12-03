<?php
function nama_web()
{
    return "Your Wedding";
}

function generate_ID($table, $fieldID)
{
    $ci = get_instance();
    $role = $ci->db->get_where('hak_akses', ['role' => $table])->row_array();
    $id = $role['IDAkses'] . date('y') . date('m') . "001";
    $ci->db->order_by($fieldID, 'DESC');
    $ci->db->limit(1);
    $data = $ci->db->get($table)->row_array();
    if ($data) {
        $id = $data[$fieldID] + 1;
    }
    return $id;
}
function upload_foto($name, $index_ke = null)
{
    $ci = get_instance();
    if ($_FILES[$name]['name']) {
        if (is_array($_FILES[$name]['name'])) {
            $_FILES[$name . $index_ke]['name'] = $_FILES[$name]['name'][$index_ke];
            $_FILES[$name . $index_ke]['type'] = $_FILES[$name]['type'][$index_ke];
            $_FILES[$name . $index_ke]['tmp_name'] = $_FILES[$name]['tmp_name'][$index_ke];
            $_FILES[$name . $index_ke]['error'] = $_FILES[$name]['error'][$index_ke];
            $_FILES[$name . $index_ke]['size'] = $_FILES[$name]['size'][$index_ke];
            $path = FCPATH . "./assets/img/" . $ci->session->userdata('role') . "/" . $ci->session->userdata('id');
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '5048';
            $config['upload_path'] = $path;
            $config['file_name'] = time();
            $ci->upload->initialize($config);
            if (!$ci->upload->do_upload($name . $index_ke)) {
                return false;
            }
            $foto_lama = $ci->input->post('foto_lama', TRUE);
            if ($foto_lama) {
                unlink(FCPATH . "./assets/img/" . $ci->session->userdata('role') . "/" . $ci->session->userdata('id') . "/$foto_lama");
            }
            return $ci->upload->data('file_name');
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '5048';
            $config['upload_path'] = FCPATH . "./assets/img/" . $ci->session->userdata('role') . "/" . $ci->session->userdata('id');
            $config['file_name'] = time();
            $ci->upload->initialize($config);
            if (!$ci->upload->do_upload($name)) {
                return false;
            }
            $foto_lama = $ci->input->post('foto_lama', TRUE);
            if ($foto_lama && $foto_lama != 'default-L.png' && $foto_lama != 'default-P.png') {
                unlink(FCPATH . "./assets/img/" . $ci->session->userdata('role') . "/" . $ci->session->userdata('id') . "/$foto_lama");
            }
            return $ci->upload->data('file_name');
        }
    } else {
        return false;
    }
}
function undangan_user($IDC)
{
    $ci3 = get_instance();
    $data = $ci3->M_undangan->semua_data('undangan', ['IDC' => $IDC]);
    return $data;
}

function jumlah_data($table)
{
    $ci3 = get_instance();
    $ci3->db->where('IDC', $ci3->ID);
    return $ci3->db->count_all_results($table);
}

function dilihat()
{
    $ci3 = get_instance();
    $ci3->db->where('IDC', $ci3->ID);
    $data = $ci3->db->get('undangan')->result_array();
    $dilihat = 0;
    if ($data) {
        foreach ($data as $data) {
            $dilihat += $data['dilihat'];
        }
    }
    return $dilihat;
}
function notif_berhasil($pesan)
{
    $ci3 = get_instance();
    $ci3->session->set_flashdata('notif', '<div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
                <strong>' . $pesan . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: transparent !important;">
                <span aria-hidden="true" style="position: relative;top:-11px; left:-5px;">&times;</span>
                </button>
                </div>');
}
function notif_gagal($pesan)
{
    $ci3 = get_instance();
    $ci3->session->set_flashdata('notif', '<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                <strong>' . $pesan . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: transparent !important;">
                <span aria-hidden="true" style="position: relative;top:-11px; left:-5px;">&times;</span>
                </button>
                </div>');
}

function warna_status($status)
{
    switch ($status) {
        case 'menunggu':
            return 'warning';
            break;
        case 'lunas':
            return 'success';
            break;
        case 'publish':
            return 'success';
            break;
        case 'Habis':
            return 'danger';
            break;
        default:
            return false;
    }
}

function jumlah_record($table, $where = null)
{
    $ci3 = get_instance();
    if ($where) {
        $ci3->db->where($where);
    }
    return $ci3->db->count_all_results($table);
}

function ambilNamaByID($ID)
{
    $ci3 = get_instance();
    $user = $ci3->db->get_where('customer', ['IDC' => $ID])->row_array();
    if ($user) {
        return $user['nama_lengkap'];
    }
}

function foto_profile($foto, $ID = null, $role = null)
{
    $ci3 = get_instance();
    if (!$ID && !$role) {
        $role = $ci3->role;
        $ID = $ci3->ID;
    }
    $cek_file = file_exists(FCPATH . "./assets/img/$role/$ID/$foto");
    if ($cek_file) {
        $foto = base_url() . "assets/img/$role/$ID/$foto";
    } else {
        $foto = base_url() . "assets/img/$role/$foto";
    }
    return $foto;
}
