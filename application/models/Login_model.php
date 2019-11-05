<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

 public  function  __construct()
 {
     $this->load->database();
 }


 function  add_user($data){
     $this->db->insert('user',$data);
     if ($this->db->affected_rows()) { return 1;} else { return 0; }
 }
    function  login($data){
        $data['password']=md5($data['password']);
        $x= $this->db->get_where("user",$data)->row_array();
        return $x;
    }
}