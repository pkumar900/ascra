<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_to_school extends AUTH_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->model(array('Course_school_model','School_course_model','Course_model','School_model')); 

	} 

	public function index()
	{
		$data['all_school']=$this->School_model->view_school();
		if(!empty($this->input->post()))
		{
			$data['all_mapping']=$this->Course_school_model->view_mappingby_schoolid();
		}
		else
		{
			$data['all_mapping']=$this->Course_school_model->view_course_mapping();
		}
		
		template('course_mapping/course_mapping',$data);
	}

	public function create()
	{
		$data['all_course']=$this->Course_model->view_course();
		$data['all_school']=$this->School_model->view_school();
		template('course_mapping/add-course-mapping',$data);
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
			template('course_mapping/add-course-mapping',$data);
		} 
		else
		{
			$check=$this->School_course_model->view_mappingby_id($this->input->post('school_id'),$this->input->post('course_id'),2);
			if($check)
			{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Mapping Already Exists.</div>');

				template('course_mapping/add-course-mapping',$data);
			}
			else
				if($this->Course_school_model->store())
				{

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Mapping Added successfully.</div>');
					redirect('Course_to_school');
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
					redirect('Course_to_school');
				}

			}
		}

	}
