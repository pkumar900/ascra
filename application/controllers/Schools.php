<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends AUTH_Controller {

  function __construct() { 
   parent::__construct(); 
   $this->load->model('School_model'); 

} 

public function index()
{
  $data['all_school']=$this->School_model->view_school();
  template('school/school',$data);
}

public function create()
{
  template('school/add-school',$data);
}

public function store()
{

    $this->form_validation->set_rules('name', 'School', 'trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
    if ($this->form_validation->run() === FALSE)
    {
      template('school/add-school',$data);
    } 
    else
    {
        $check=$this->Custom_model->Duplicate_data('tbl_school','name',$this->input->post('name'));
        if($check)
        {

           $this->session->set_flashdata('msg', '<div class="alert alert-danger">School Already Exists.</div>');

           template('school/add-school',$data);
        }
        else
        if($this->School_model->store())
        {

           $this->session->set_flashdata('msg', '<div class="alert alert-success">School Added successfully.</div>');
          redirect('Schools');
        }
        else
        {
          $this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
          redirect('Schools');
        }

     }
}

public function edit($school_id)
{
  $school_id=base64_decode($school_id);
  $data['data']=$this->School_model->view_schoolby_id($school_id);
  template('school/edit-school',$data);
}

public function update()
{

 $this->form_validation->set_rules('name', 'School', 'trim|required');
 $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
 $school_id=base64_decode($this->input->post('id'));
 if ($this->form_validation->run() === FALSE)
 {
   $data['data']=$this->School_model->view_schoolby_id($school_id);
   template('school/edit-school',$data);
 } 
 else
 {
   $check=$this->Custom_model->Duplicate_data('tbl_school','name',$this->input->post('name'),$school_id,'id');
   if($check)
   {
       $this->session->set_flashdata('msg', '<div class="alert alert-danger">School Already Exists.</div>');

      $data['data']=$this->School_model->view_schoolby_id($school_id);
      template('school/edit-school',$data);
    }
   else
    if($this->School_model->update($school_id))
    {
      $this->session->set_flashdata('msg', '<div class="alert alert-success">School Updated successfully.</div>');

      redirect('Schools');
    }
    else
    {
      $data['data']=$this->School_model->view_schoolby_id($school_id);
      $this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>');
      template('school/edit-school',$data);
    }

  }
}

 public function delete()
 {
    $id=base64_decode($this->input->post('id'));
    if($this->School_model->delete($id))
    {
      echo '1';
    }
    else
    { 
      echo '0';
    }
    
  }

}
