<?php

class Custom_model extends CI_Model {


function Duplicate_data($table,$column,$data,$id='',$escape_column='')
{
    $result=false;
    if(!empty($id))
    {
      $query=$this->db->where(array($column=>$data,$escape_column.'!='=>$id))->get($table);
      $data=$query->num_rows();
      if($data>0)
      {
         $result=$data;
      }
    }
    else
    {
      $query=$this->db->where($column,$data)->get($table);
      $data=$query->num_rows();
      if($data>0)
      {

        $result=$data;
      }

    }
    
    return $result;
  }

}