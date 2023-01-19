<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgottenPassword extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ForgottenPassword_model','model');
        $this->load->library('form_validation');
    }

    public function index(){

        $this->load->view('home/forgottenpassword');
    }

    public function changepass(){

        $this->form_validation->set_rules('oldpass','Old password','callback_checkpass');
        $this->form_validation->set_rules('newpass','New password','trim|required' );
        $this->form_validation->set_rules('confirmpass','Confirm password','trim|required|matches[newpass]' );
        
        if($this->form_validation->run()){
            $newpass=$this->input->post('newpass');
            $id=$this->session->userdata('id');  
            $result=$this->model->update_pass($newpass,$id);
            if($result){
                $this->session->set_flashdata('good','password changed succesfully');
                return redirect('forgottenpassword');
            }else{
                $this->session->set_flashdata('failed','Your password not change !!');
                 redirect('forgottenpassword');
            }
        }else{
            $this->load->view('home/forgottenpassword');
        }
        
    }

    public function checkpass($oldpass){    
        $id=$this->session->userdata('id');
        $user=$this->model->checkpassword($id);
        if($user->password !== md5($oldpass)){
            $this->form_validation->set_message('checkpass','The {field} does not match');
            return false;
        }
            return true;
    }

}