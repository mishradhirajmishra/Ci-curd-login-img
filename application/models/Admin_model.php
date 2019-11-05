<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

 public  function  __construct()
 {
     $this->load->database();
 }


 function  add_user($data){
     $data['password']=md5($data['password']);
     unset($data['id']);

     $this->db->insert('user',$data);
     if ($this->db->affected_rows()) { return 1;} else { return 0; }
 }
    function  all_user(){
       return $this->db->get('user')->result_array();
    }
    function user_by_id($id){
        return $this->db->get_where('user',array('id'=>$id))->row_array();
    }
 function  update_user($data){
     if ($data['password']){
         $data['password']= md5($data['password']);
     }
     $this->db->where('id',$data['id']);
     unset($data['id']);
     $this->db->update('user',$data);
     if ($this->db->affected_rows()) { return 1;} else { return 0; }
 }
 function  delete_by_id($id){
     $this->db->where('id',$id);
     $this->db->delete('user');
     if ($this->db->affected_rows()) { return 1;} else { return 0; }
 }
    function  chk_email($email){
        return $this->db->get_where('user',array('email'=>$email))->row_array();
    }
}