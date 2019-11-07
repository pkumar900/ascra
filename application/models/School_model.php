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
    foreach($this->input->post('course_id') as $key => $value) {
      $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '1','course_id'=>$value));
      $count=$query->num_rows();
      if(empty($count))
      {
        $this->db->insert('tbl_school_mapping',['course_id'=>$value,'school_id'=>$school_id,'type'=>1,'added_date'=>date('Y-m-d H:i:s')]);
      }
     
    }
    $this->db->where('id',$school_id);
    return $this->db->update('tbl_school',$data);
  }
 
  public function view_school_old() {
    $result=false;
    $sql="SELECT `s`.*,group_concat(c.`name` separator ',') as `course`  FROM `tbl_school` `s` left JOIN `tbl_school_mapping` `m` ON `m`.`school_id` = `s`.`id` AND m.type=1 left JOIN `tbl_course` `c` ON `m`.`course_id` = `c`.`id` where s.isDeleted=0  group by s.id ";
    $query=$this->db->query($sql);
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_school($where, $fields,$limit, $start)
  {
      return $this->get($where,$fields , $limit, $start);
  }
  public function count_data()
  {

    $total=$this->count();
    return count($total);
  }

  // public function get(array $where = NULL, $limit = 1000, $sortOrder = 'dsc')
public function get(array $where = NULL, array $fields = NULL, $limit = NULL, $start = NULL)
{
  $query = NULL;
  // return all records with all fields from table
  if($fields == NULL and $where == NULL){

    $sql="SELECT `s`.*,group_concat(c.`name` separator ',') as `course`  FROM `tbl_school` `s` left JOIN `tbl_school_mapping` `m` ON `m`.`school_id` = `s`.`id` AND m.type=1 left JOIN `tbl_course` `c` ON `m`.`course_id` = `c`.`id` where s.isDeleted=0  group by s.id limit '".$limit."','".$start."'";
    $query=$this->db->query($sql);

      // $this->db->limit($limit, $start);
    
      if ($query->num_rows() > 0 ) {

          return $query->result();
      }
      else
          return false;
  }

  // rteurn all records with only my fields
  elseif($fields != NULL and $where == NULL){

      $this->db->limit($limit, $start);
      $this->db->select($fields);
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) 
          return $query->result();

      else
          return false;

  }

  // return all records through condition
  elseif($fields == NULL and $where != NULL){
       // $array=array('b.isDeleted' => '0');
      // }
      $this->db->select('b.*,t.name as topic');
      $this->db->from('tbl_blogs b');
      $this->db->join('tbl_topics t', 't.id = b.topic_id','left');
      $this->db->where($where);
      $this->db->limit($limit, $start);
      $this->db->order_by('b.id','DESC');
      $query = $this->db->get();
      // $this->db->limit($limit, $start);
      // $query = $this->db->get_where($this->table, $where);
      if ($query->num_rows() > 0) 
         return $query->result();
       

      else
          return false;
  }

  // return all records with only my fields through condition 
  else{

      $this->db->limit($limit, $start);
      $this->db->select($fields);
      $query = $this->db->get_where($this->table, $where);

      if ($query->result() > 0 )
          return $query->result();

      else
          return false;
  }
}

public function count()
{
  $query = $this->db->get_where('tbl_school', array('isDeleted' => '0'));
  $count=$query->num_rows();
  if($count>0)
  {
    $result=$query->result();
  }
  return $result;
}


  public function view_school_view($school_id) {
    $result=false;
    $sql="SELECT `s`.*,group_concat(c.`name` separator ',') as `course`  FROM `tbl_school` `s` left JOIN `tbl_school_mapping` `m` ON `m`.`school_id` = `s`.`id` AND m.type=1 left JOIN `tbl_course` `c` ON `m`.`course_id` = `c`.`id` where s.isDeleted=0 AND s.id=$school_id group by s.id ";
    $query=$this->db->query($sql);
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_mapping_id($school_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '1','school_id'=>$school_id));
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