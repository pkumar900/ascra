<?php

class School_model extends CI_Model {


  public function store() {
    $data = array(
      'name' => $this->input->post('name'),
      'added_date'=>date('Y-m-d H:i:s')
    );
    return $this->db->insert('tbl_school', $data);
  }

  public function update($school_id) {
    $data = array(
      'name' => $this->input->post('name'),
      'updated_date'=>date('Y-m-d H:i:s')
    );
    $this->db->where('id',$school_id);
    return $this->db->update('tbl_school',$data);
  }

  public function view_school() {
    $result=false;
    $query = $this->db->get_where('tbl_school', array('isDeleted' => '0'));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_schoolby_id($school_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school', array('isDeleted' => '0','id'=>$school_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function delete($school_id) {
    $data = array(
      'isDeleted' =>1,
    );
    $this->db->where('id',$school_id);
    return $this->db->update('tbl_school',$data);
  }
}