<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends AUTH_Controller {

  function __construct() { 
   parent::__construct(); 
   $this->load->model(array('School_model','Course_model')); 
   $this->load->library('pagination');

} 
 
public function index()
{

  $config['base_url'] = base_url('School/index');
  $config['total_rows'] = $this->School_model->count_data();
  $config['per_page'] = 10;
  $config['uri_segment'] = 3;
  // $config['use_page_numbers'] = TRUE;
  $choice = $config['total_rows']/$config['per_page'];
 
  $this->pagination->initialize($config);

  $page =($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  $data['all_school']=$this->School_model->view_school([], [],$config['per_page'],$page);
  template('school/school',$data);
}

public function view($school_id)
{
    $school_id=base64_decode($school_id);
    $data['data']=$this->School_model->view_school_view($school_id);
    template('school/view-school',$data);
}

public function create()
{
  template('school/add-school');
}

public function store()
{

    if ($this->form_validation->run('school') === FALSE)
    {
      template('school/add-school');
    } 
    else
    {
        $check=$this->Custom_model->Duplicate_data('tbl_school','name',$this->input->post('name'));
        if($check)
        {

           $this->session->set_flashdata('msg', '4');

           template('school/add-school');
        }
        else
        if($this->School_model->store())
        {

           $this->session->set_flashdata('msg', '1');
          redirect('Schools');
        }
        else
        {
          $this->session->set_flashdata('msg', '3');
          redirect('Schools');
        }

     }
}

public function edit($school_id)
{
  $school_id=base64_decode($school_id);
  $data['data']=$this->School_model->view_schoolby_id($school_id);
  $data['all_course']=$this->Course_model->view_course();  
  $data['mapping']=$this->School_model->view_mapping_id($school_id);
  template('school/edit-school',$data);
}

public function update()
{

 $school_id=base64_decode($this->input->post('id'));
 if ($this->form_validation->run('school') === FALSE)
 {
   $data['data']=$this->School_model->view_schoolby_id($school_id);
   template('school/edit-school',$data);
 } 
 else
 {
   $check=$this->Custom_model->Duplicate_data('tbl_school','name',$this->input->post('name'),$school_id,'id');
   if($check)
   {
       $this->session->set_flashdata('msg', '4');

      $data['data']=$this->School_model->view_schoolby_id($school_id);
      template('school/edit-school',$data);
    }
   else
    if($this->School_model->update($school_id))
    {
      $this->session->set_flashdata('msg', '2');

      redirect('Schools');
    }
    else
    {
      $data['data']=$this->School_model->view_schoolby_id($school_id);
      $this->session->set_flashdata('msg', '3');
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
