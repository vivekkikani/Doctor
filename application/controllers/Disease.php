<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disease extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Disease_model','model');
        $this->load->library('form_validation');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
		}

    }

    public function index(){

        $this->load->view('patients/disease');
    }

    public function addDisease(){
        $this->form_validation->set_rules('disease','Disease','trim|required');

        if($this->form_validation->run()){
            $resp=$this->model->add();
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('disease');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('disease');
                };
            }
            else {
                $this->load->view('patients/disease');
        }
    }

    public function diseaseList(){
        $data['disease']=$this->model->getDisease();
        $this->load->view('patients/diseaseList',$data);
    }

    public function edit($id){
        $data['disease']=$this->model->findDisease($id);
        $this->load->view('patients/editDisease',$data);
    }


    public function update(){
        $this->form_validation->set_rules('disease','Disease Name','trim|required');
        $data=$this->input->post();

        if($this->form_validation->run()){
            $resp=$this->model->update($data);
            if($resp)
                {
                $this->session->set_flashdata('good','Your Data Edit successfully !!');
                return redirect('disease/diseaseList');
            }
            else{
                $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                return redirect('patients/editDisease');
            }
            }
            else{
                $this->load->view('patients/editDisease');
        }
    }

    public function delete($id){
        $this->model->delete($id);
        $this->session->set_flashdata('good','Your Data Edit successfully !!');
        redirect('disease/diseaseList');
    }  
}