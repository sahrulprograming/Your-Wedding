<?php
function cek_akses()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role')) {
        redirect('authentication/login');
    } else {
        $role = $ci->session->userdata('role');
        $controller = $ci->uri->segment(1);
        if ($controller == 'administrator' || $controller == 'customer') {
            $akses = $ci->db->get_where('hak_akses', ['role' => $role, 'controller_akses' => $controller])->row_array();
            if ($akses < 1) {
                redirect("$role/home/dashboard");
            }
        }
    }
}
