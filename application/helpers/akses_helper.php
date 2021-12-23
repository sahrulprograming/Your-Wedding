<?php
function cek_akses()
{
    $ci = get_instance();
    $role = $ci->session->userdata('role');
    $id = $ci->session->userdata('id');
    if (!$role) {
        redirect('authentication/login');
    } else {
        $controller = $ci->uri->segment(1);
        if ($controller == 'administrator' || $controller == 'customer') {
            $akses = $ci->db->get_where('hak_akses', ['role' => $role, 'controller_akses' => $controller])->row_array();
            if ($akses < 1) {
                redirect("$role/home/dashboard");
            }
        }
        // if (exist_user($role, $id)) {
        // } else {
        //     redirect('authentication/login');
        // }
    }
}
function exist_user($role, $id)
{
    $ci3 = get_instance();
    $customer_exist = $ci3->db->get_where($role, ['IDC' => $id]);
    if ($customer_exist) {
        return true;
    } else {
        $admin_exist = $ci3->db->get_where($role, ['ID_admin' => $id]);
        if ($admin_exist) {
            return true;
        } else {
            return false;
        }
    }
}
