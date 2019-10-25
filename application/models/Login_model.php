<?php

class Login_model extends CI_Model {


    // Log user in
    public function login($username, $password) {
       
        $this->db->where(array('email'=>$username,'password'=>md5($password)));

        $result = $this->db->get('tbl_admin');
        if ($result->num_rows() == 1) {
            return $result->result();
        } else {
            return false;
        }
    }



}