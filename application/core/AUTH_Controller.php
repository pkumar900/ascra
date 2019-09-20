<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->userdata = $this->session->userdata('userdata');
		
		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			// echo "hi";
			// exit;
			redirect('Login');
		}

	   
	}

	public function updateProfil() {
		if ($this->userdata != '') {
			$data = $this->M_admin->select($this->userdata->id);

			$this->session->set_userdata('userdata', $data);
			$this->userdata = $this->session->userdata('userdata');
		}
	}
}