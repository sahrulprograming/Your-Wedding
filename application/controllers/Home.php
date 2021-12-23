<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->role = $this->session->userdata('role');
		$this->email = $this->session->userdata('email');
		$this->ID = $this->session->userdata('id');
	}
	public function index()
	{
		// echo format_tanggal(1634814288);
		// die;
		// data dari database
		$data['template'] = $this->M_template->ambil_semua();
		$data['title'] = "Home | " . nama_web();
		$this->load->view('template/default/head', $data);
		$this->load->view('template/default/navbar');
		$this->load->view('home');
		$this->load->view('template/default/footer');
		$this->session->set_userdata('kembali', current_url());
	}
}
