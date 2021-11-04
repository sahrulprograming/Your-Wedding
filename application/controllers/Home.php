<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		// data dari database
		$data['template'] = $this->M_template->ambil_semua();
		$data['title'] = "Home | " . nama_web();
		$this->load->view('template/default/head', $data);
		$this->load->view('template/default/navbar');
		$this->load->view('home');
		$this->load->view('template/default/footer');
	}
}
