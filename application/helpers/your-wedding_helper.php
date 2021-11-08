<?php
function nama_web()
{
    return "Your Wedding";
}

function generate_ID($table, $fieldID)
{
    $ci = get_instance();
    $role = $ci->db->get_where('role', ['role' => $table])->row_array();
    $id = $role['IDRole'] . date('y') . date('m') . "001";
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
            if ($foto_lama) {
                unlink(FCPATH . "./assets/img/" . $ci->session->userdata('role') . "/" . $ci->session->userdata('id') . "/$foto_lama");
            }
            return $ci->upload->data('file_name');
        }
    } else {
        return false;
    }
}
