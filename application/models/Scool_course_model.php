<?php

class Report_model extends CI_Model {

   


     public function seen_status($id) {
 
        $data = array(
            'seen_status' =>1
            // 'updated_date'=>date('Y-m-d H:i:s')
        );
         $this->db->where('id',$id);
        return $this->db->update('tbl_customer', $data);
    }

    public function view_customer() {

        $result=false;

        if($this->session->userdata('role')==ADMIN)
        {
            $array=array('c.isDeleted' => '0');
        }
        else
        {
            $array=array('c.isDeleted' => '0','c.branch_id'=>$this->session->userdata('branch_id'));
        }

        $this->db->select('c.*,b.name as  branch');
        $this->db->from('tbl_customer c');
        $this->db->join('tbl_branch b', 'b.id = c.branch_id','left');
        $this->db->where($array);
        $this->db->order_by('c.id','DESC');
        $query = $this->db->get();

        return $query->result();
       
    }

    public function view_customer_noti() {

        $result=false;

        if($this->session->userdata('role')==ADMIN)
        {
            $array=array('c.isDeleted' => '0','c.seen_status'=>0);
        }
        else
        {
            $array=array('c.isDeleted' => '0','c.branch_id'=>$this->session->userdata('branch_id'),'c.seen_status'=>0);
        }

        $this->db->select('c.*,b.name as  branch');
        $this->db->from('tbl_customer c');
        $this->db->join('tbl_branch b', 'b.id = c.branch_id','left');
        $this->db->where($array);
        $this->db->order_by('c.id','DESC');
        $query = $this->db->get();

        return $query->result();
       
    }
    public function view_branch() {

        $result=false;
        $query = $this->db->get_where('tbl_branch', array('isDeleted' => '0'));
        $count=$query->row();
        if(count($count)>0)
        {
            $result=$query->result();
        }
        return $result;
    }

    public function view_customerby_id($id) {

        $result=false;
        $query = $this->db->get_where('tbl_customer', array('isDeleted' => '0','id'=>$id));
        $count=$query->row();
        if(count($count)>0)
        {
            $result=$query->result();
        }
        return $result;
    }

    public function handel_customer() {

        $result=false;
        $array=array('c.isDeleted' => '0','t.isDeleted' => '0','t.assign_to'=>$this->session->userdata('admin_id'));
        $this->db->select('t.*,c.name,c.email,c.mobile');
        $this->db->from('tbl_tokens t');
        $this->db->join('tbl_customer c', 'c.id = t.customer_id','left');
        $this->db->where($array);
        $this->db->order_by('t.id','DESC');
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $query->result();

    }
        public function view_employee() {

        $result=false;

       
        $array=array('e.isDeleted' => '0','b.isDeleted' => '0','e.role' => '2');
        $this->db->select('e.*,b.name as  branch');
        $this->db->from('tbl_employee e');
        $this->db->join('tbl_branch b', 'b.id = e.branch_id','left');
        $this->db->where($array);
        $this->db->order_by('e.id','DESC');
        $query = $this->db->get();

        return $query->result();
       
    }

     public function view_reports() {

        $result=false;
     
        if($this->session->userdata('role')==ADMIN)
        {
            $array=array('isDeleted' => '0');
        }
        else
        {
            $array=array('isDeleted' => '0','admin_id'=>$this->session->userdata('branch_id'));
        }

        if(!empty($this->input->post('branch_id')))
        {
           $array=array('isDeleted' => '0','admin_id'=>$this->input->post('branch_id')); 
        }
        if(!empty($this->input->post('employee_id')))
        {
           $array=array('assign_to'=>$this->input->post('employee_id')); 
        }
         if(!empty($this->input->post('from_month')))
        {
           $array=array('MONTH(added_date)'=>$this->input->post('from_month')); 
        }
        if(!empty($this->input->post('date')))
        {
           $array=array('date(added_date)'=>$this->input->post('date')); 
        }

        if(!empty($this->input->post('to_month')))
        {
           $array=array('MONTH(added_date)'=>$this->input->post('to_month')); 
        }
         if(!empty($this->input->post('to_month'))&& !empty($this->input->post('from_month')))
        {
           $array=array('MONTH(added_date)>='=>$this->input->post('from_month'),'MONTH(added_date)<='=>$this->input->post('to_month')); 
        }

        $query = $this->db->get_where('tbl_tokens',$array);
        $count=$query->row();
        if(count($count)>0)
        {
            $result=$query->result();
        }
        return $result;
    }
     public function delete($id) {
 
        $data = array(
            'isDeleted' =>1,
            'updated_date'=>date('Y-m-d H:i:s')
        );

        $this->db->where('id',$id);
        if($this->db->update('tbl_customer',$data))
        {
            return true;
        }
        else
        {
            return false;
        }
       
    }


}