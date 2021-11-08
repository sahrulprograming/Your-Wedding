<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function website()
    {
        $test = base_url('authentication/daftar');

        $expected_result = true;

        $test_name = 'Sistem login';

        $this->unit->run($test, $expected_result, $test_name);
        echo $this->unit->report();
    }
    public function harga()
    {
        echo "tentang harga";
    }
    public function kami()
    {
        echo "tentang kami";
    }
}
