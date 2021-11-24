<?php
function status_publishing($IDU)
{
    $ci3 = get_instance();
    $data = $ci3->db->get_where('publishing', ['IDU' => $IDU])->row_array();
    if ($data) {
        return $data['status'];
    }
}
