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
