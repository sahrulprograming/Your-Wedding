<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_test extends CI_Controller
{
    public function index()
    {
        $this->load->view('coba');
    }
    public function uploadgambar()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $status = "error";
            $msg = $this->upload->display_errors();
        } else {
            $dataupload = $this->upload->data();
            $status = "success";
            $msg = $dataupload['file_name'] . " berhasil diupload";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => $status, 'msg' => $msg)));
    }
}
