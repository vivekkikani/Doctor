<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ChangePassword_model','model');
        $this->load->library('form_validation');
    }

    public function index(){

        $data['css'] =array(
			'normalize.min.css',
			'bootstrap.min.css',
			'font-awesome.min.css',
			'themify-icons.css',
			'pe-icon-7-stroke.min.css',
			'flag-icon.min.css',
			'cs-skin-elastic.css',
            'cs-skin-elastic.css',
            'style.css',
            'w3.css'
		);

		$data['js'] =array(
			'jquery.min.js',
			'popper.min.js',
			'bootstrap.min.js',
			'jquery.matchHeight.min.js',
            'main.js',
		);
        $this->load->view('login/changepassword',$data);
    }
    
    public function send_email(){
        $data['css'] =array(
			'normalize.min.css',
			'bootstrap.min.css',
			'font-awesome.min.css',
			'themify-icons.css',
			'pe-icon-7-stroke.min.css',
			'flag-icon.min.css',
			'cs-skin-elastic.css',
            'cs-skin-elastic.css',
            'style.css',
            'w3.css'
		);

		$data['js'] =array(
			'jquery.min.js',
			'popper.min.js',
			'bootstrap.min.js',
			'jquery.matchHeight.min.js',
            'main.js',
		);
        $this->load->config('email');
        $this->load->library('email');
    
        $this->form_validation->set_rules('email','Email','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('login/changepassword',$data);
        }else{
            $email=$this->input->post('email');
            $user=$this->model->getUserByEmail($email);
            $string=random_string('nozero',6);
            $password=str_shuffle($string);
            $newPassword=$this->model->newpass($password,$user);
            // $pass=$this->model->passget($email);
            // print_r($newPassword);die;
            if($user){
                $from = 'no-reply@myapp.com';
	            $to = $email;
                $message="your password is".$password;

                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject('Password');
                $this->email->message($message);
                    
                if ($this->email->send()) {
                    $this->session->set_flashdata('good',"Sent with success!"); 
                    $this->load->view('login/changepassword',$data);
                }
                else{
                    show_error($this->email->print_debugger());
                    $this->load->view('login/changepassword',$data);
                    }
                }
                else{
                    $this->load->view('login/changepassword',$data);
            }
        }
    }
}
