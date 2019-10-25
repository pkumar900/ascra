<?php

class Course_school_model extends CI_Model {


  public function store() {
  
        $data = array(
          'school_id' => $this->input->post('school_id'),
          'course_id' => $this->input->post('course_id'),
          'type'=>2,
          'added_date'=>date('Y-m-d H:i:s')
        );
       $this->db->insert('tbl_school_mapping', $data);
   
   return true; 
  }

  public function view_course_mapping() {
    $result=false;
    $this->db->select('sm.*,s.name as school,c.name as course');
    $this->db->from('tbl_school_mapping sm');
    $this->db->join('tbl_school s', 's.id = sm.school_id');
    $this->db->join('tbl_course c', 'c.id = sm.course_id');
    $this->db->where(array('sm.type'=>2,'sm.isDeleted'=>0,'s.isDeleted'=>0,'c.isDeleted'=>0));
    $this->db->order_by('sm.id','DESC');
    $query = $this->db->get();
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

public function view_mappingby_schoolid() {
    $result=false;
    $this->db->select('sm.*,s.name as school,c.name as course');
    $this->db->from('tbl_school_mapping sm');
    $this->db->join('tbl_school s', 's.id = sm.school_id');
    $this->db->join('tbl_course c', 'c.id = sm.course_id');
    $this->db->where(array('sm.type'=>1,'sm.isDeleted'=>0,'s.isDeleted'=>0,'c.isDeleted'=>0,'sm.course_id'=>$this->input->post('school_id')));
    $this->db->order_by('sm.id','DESC');
    $query = $this->db->get();
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

}