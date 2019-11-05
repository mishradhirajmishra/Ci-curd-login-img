<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
    }

    public function index()
    {
       $this->load->view('login');
    }
    function login(){
       $data= $this->input->post();
       $res=$this->login_model->login($data);
       if($res){
           $userData=array(
             'userame'=>$res['username'],
             'email'=>$res['email'],
             'role'=>'admin',
           );
           $this->session->set_userdata($userData);
           $this->session->set_flashdata('item','Login Successfully');

           echo "ok";
       }
       else{
           echo "not ok";
       }

    }
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('item', 'Log Out  Successfully .');
        redirect(base_url() . "");
    }
}
