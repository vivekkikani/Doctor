<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Patients_model','model');
        $this->load->library('form_validation');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
		}

    }

    public function index(){

        $this->load->view('patients/patients');
    }

    public function patientsDetails(){

        $this->form_validation->set_rules('name','Doctors Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('age','Age','trim|required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('phoneno','Phone No','trim|required');

        if($this->form_validation->run()){
           
            $resp=$this->model->addPatients();
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('patients');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('patients');
            }
            }
            else{
                $this->load->view('patients/patients');
        }
    }

    public function patientsList(){
        $data['patients']=$this->model->getPatients();
        $this->load->view('patients/patientsList',$data);
    }

    public function edit($id){
        $data['patients']=$this->model->findPatients($id);
        $this->load->view('patients/edit',$data);
    }

    public function update(){

        $this->form_validation->set_rules('name','Doctors Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('age','Age','trim|required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('phoneno','Phone No','trim|required');
        $data=$this->input->post();

        if($this->form_validation->run()){
           
            $resp=$this->model->updatePatients($data);
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('patients/patientsList');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('patients/edit');
            }
            }
            else{
                $this->load->view('patients/edit');
        }
    }

    public function delete($id){
        $this->model->delete($id);
        $this->session->set_flashdata('good','Your Data Edit successfully !!');
        redirect('patients/patientsList');
    }  

    public function view($id){
        $data['patients']=$this->model->getdata($id);
        $data['admit_details']=$this->model->admitDetailsdata($id);
        // echo '<pre>';
        // print_r($data);die;
        $this->load->view('patients/view',$data);
    }
    
}