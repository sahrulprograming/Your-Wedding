<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->web = nama_web();
	}
	public function index()
	{
		$data['title'] = "Home | ". $this->web;
		$this->load->view('template/default/head', $data);
		$this->load->view('template/default/navbar');
		$this->load->view('home');
		$this->load->view('template/default/footer');
	}
}
