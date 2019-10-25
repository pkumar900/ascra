<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends AUTH_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->model('Course_model'); 

	} 

	public function index()
	{
		$data['all_course']=$this->Course_model->view_course();
		template('course/course',$data);
	}

	public function create()
	{
		template('course/add-course',$data);
	}

	public function store()
	{

		$this->form_validation->set_rules('name', 'Course', 'trim|required');
		$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
		if ($this->form_validation->run() === FALSE)
		{
			template('course/add-course',$data);
		} 
		else
		{
			$check=$this->Custom_model->Duplicate_data('tbl_course','name',$this->input->post('name'));
			if($check)
			{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Course Already Exists.</div>');

				template('course/add-course',$data);
			}
			else
				if($this->Course_model->store())
				{

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Course Added successfully.</div>');
					redirect('Courses');
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
					redirect('Schools');
				}

			}
		}

		public function edit($course_id)
		{
			$course_id=base64_decode($course_id);
			$data['data']=$this->Course_model->view_courseby_id($course_id);
			template('course/edit-course',$data);
		}

		public function update()
		{

			$this->form_validation->set_rules('name', 'School', 'trim|required');
			$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
			$course_id=base64_decode($this->input->post('id'));
			if ($this->form_validation->run() === FALSE)
			{
				$data['data']=$this->Course_model->view_courseby_id($course_id);
				template('course/edit-course',$data);
			} 
			else
			{
				$check=$this->Custom_model->Duplicate_data('tbl_course','name',$this->input->post('name'),$course_id,'id');
				if($check)
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Course Already Exists.</div>');

					$data['data']=$this->Course_model->view_courseby_id($course_id);
					template('course/edit-course',$data);
				}
				else
					if($this->Course_model->update($course_id))
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Course Updated successfully.</div>');

						redirect('Courses');
					}
					else
					{
						$data['data']=$this->Course_model->view_courseby_id($course_id);
						$this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
						template('course/edit-course',$data);
					}

				}
			}

			public function delete()
			{
				$id=base64_decode($this->input->post('id'));
				if($this->Course_model->delete($id))
				{
					echo '1';
				}
				else
				{ 
					echo '0';
				}

			}

		}
