<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_session();
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Home';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}
}
