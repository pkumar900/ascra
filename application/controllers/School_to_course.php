<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_to_course extends AUTH_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->model(array('School_course_model','Course_model','School_model')); 

	} 

	public function index()
	{
		$data['all_course']=$this->Course_model->view_course();
		if(!empty($this->input->post()))
		{
			$data['all_mapping']=$this->School_course_model->view_mappingby_courseid();
		}
		else
		{
			$data['all_mapping']=$this->School_course_model->view_school_mapping();
		}
		
		template('school_mapping/school_mapping',$data);
	}

	public function create()
	{
		$data['all_course']=$this->Course_model->view_course();
		$data['all_school']=$this->School_model->view_school();
		template('school_mapping/add-school-mapping',$data);
	}

	public function store()
	{

		$this->form_validation->set_rules('course_id', 'Course', 'trim|required');
		$this->form_validation->set_rules('school_id', 'School', 'trim|required');
		$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
		$data['all_course']=$this->Course_model->view_course();
		$data['all_school']=$this->School_model->view_school();
		if ($this->form_validation->run() === FALSE)
		{
			template('school_mapping/add-school-mapping',$data);
		} 
		else
		{
			$check=$this->School_course_model->view_mappingby_id($this->input->post('school_id'),$this->input->post('course_id'),$type=1);
			if($check)
			{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Mapping Already Exists.</div>');

				template('school_mapping/add-school-mapping',$data);
			}
			else
				if($this->School_course_model->store())
				{

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Mapping Added successfully.</div>');
					redirect('School_to_course');
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
				  redirect('School_to_course');
				}

			}
		}

		}
