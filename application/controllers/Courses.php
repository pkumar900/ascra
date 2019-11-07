<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends AUTH_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->model(array('Course_model','School_model')); 

	} 

	public function index()
	{
		$data['all_course']=$this->Course_model->view_course();
		template('course/course',$data);
	}
 
	public function view($course_id)
	{
			$course_id=base64_decode($course_id);
			$data['data']=$this->Course_model->view_course_view($course_id);
			template('course/view-course',$data);
	}

	public function create()
	{
		template('course/add-course');
	}

	public function store()
	{

	
		if ($this->form_validation->run('course') === FALSE)
		{
			template('course/add-course');
		} 
		else
		{
			$check=$this->Custom_model->Duplicate_data('tbl_course','name',$this->input->post('name'));
			if($check)
			{

				$this->session->set_flashdata('msg', '4');

				template('course/add-course');
			}
			else
				if($this->Course_model->store())
				{

					$this->session->set_flashdata('msg', '1');
					redirect('Courses');
				}
				else
				{
					$this->session->set_flashdata('msg', '3');
					redirect('Schools');
				}

			}
		}

		public function edit($course_id)
		{
			$course_id=base64_decode($course_id);
			$data['data']=$this->Course_model->view_courseby_id($course_id);
			$data['all_school']=$this->School_model->view_school();
			$data['mapping']=$this->Course_model->view_mapping_id($course_id);
			template('course/edit-course',$data);
		}

		public function update()
		{

			$course_id=base64_decode($this->input->post('id'));
			if ($this->form_validation->run('course') === FALSE)
			{
				$data['data']=$this->Course_model->view_courseby_id($course_id);
				template('course/edit-course',$data);
			} 
			else
			{
				$check=$this->Custom_model->Duplicate_data('tbl_course','name',$this->input->post('name'),$course_id,'id');
				if($check)
				{
					$this->session->set_flashdata('msg', '4');

					$data['data']=$this->Course_model->view_courseby_id($course_id);
					template('course/edit-course',$data);
				}
				else
					if($this->Course_model->update($course_id))
					{
						$this->session->set_flashdata('msg', '2');

						redirect('Courses');
					}
					else
					{
						$data['data']=$this->Course_model->view_courseby_id($course_id);
						$this->session->set_flashdata('msg', '3');
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
