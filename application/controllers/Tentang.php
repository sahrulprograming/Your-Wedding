<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function website()
    {
        echo "tentang website";
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
