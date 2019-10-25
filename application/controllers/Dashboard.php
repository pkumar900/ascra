<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->model(array('Course_model','School_model')); 
		
	}
 
	public function index()
	{
		$data['title']='Dashboard';
		$data['all_course']=$this->Course_model->view_course();
		$data['all_school']=$this->School_model->view_school();
		template('dashboard',$data);
	}

	
}
