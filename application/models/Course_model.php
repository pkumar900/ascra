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
   
    foreach($this->input->post('school_id') as $key => $value) {
      $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '2','school_id'=>$value));
      $count=$query->num_rows();
      if(empty($count))
      {
        $this->db->insert('tbl_school_mapping',['school_id'=>$value,'course_id'=>$course_id,'type'=>2,'added_date'=>date('Y-m-d H:i:s')]);
      }
     
    }
    
    $this->db->where('id',$course_id);
    return $this->db->update('tbl_course',$data);
  }

  public function view_course() {
    $result=false;
   
    $sql="SELECT `c`.*,group_concat(s.`name` separator ',') as `school`  FROM `tbl_course` `c` left JOIN `tbl_school_mapping` `m` ON `m`.`course_id` = `c`.`id` AND m.type=2 left JOIN `tbl_school` `s` ON `m`.`school_id` = `s`.`id` where c.isDeleted=0 group by c.id ";
    $query=$this->db->query($sql);
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_course_view($course_id) {
    $result=false;
    $sql="SELECT `c`.*,group_concat(s.`name` separator ',') as `school`  FROM `tbl_course` `c` left JOIN `tbl_school_mapping` `m` ON `m`.`course_id` = `c`.`id` AND m.type=2 left JOIN `tbl_school` `s` ON `m`.`school_id` = `s`.`id` where c.isDeleted=0 AND c.id=$course_id group by c.id ";
    $query=$this->db->query($sql);
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

  public function view_mapping_id($course_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '2','course_id'=>$course_id));
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