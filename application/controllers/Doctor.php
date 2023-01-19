<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Doctor_model','model');
        $this->load->library('form_validation');
        // print_r($this->session->userdata());die;
        if (!isLoggedIn()) {
			redirect(base_url('login'));
		}
		if($this->session->userdata('role') == '3'){
			redirect('nurse');
		}
	}


    public function index(){

        $this->load->view('doctor/doctor');
    }
}