<?php

class Course_model extends CI_Model {


  public function store() {
    $data = array(
      'name' => $this->input->post('name'),
      'added_date'=>date('Y-m-d H:i:s')
    );
    return $this->db->insert('tbl_course', $data);
  }

  public function update($course_id) {
    $data = array(
      'name' => $this->input->post('name'),
      'updated_date'=>date('Y-m-d H:i:s')
    );
    $this->db->where('id',$course_id);
    return $this->db->update('tbl_course',$data);
  }

  public function view_course() {
    $result=false;
    $query = $this->db->get_where('tbl_course', array('isDeleted' => '0'));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_courseby_id($course_id) {
    $result=false;
    $query = $this->db->get_where('tbl_course', array('isDeleted' => '0','id'=>$course_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function delete($course_id) {
    $data = array(
      'isDeleted' =>1,
    );
    $this->db->where('id',$course_id);
    return $this->db->update('tbl_course',$data);
  }
}