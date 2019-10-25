<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->userdata = $this->session->userdata('userdata');
		
		if ($this->session->userdata('status') == '') {
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