<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Medicine_model','model');
        $this->load->library('form_validation');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
		}

    }

    public function index(){

        $this->load->view('medicine/medicine');
    }

    public function medicineDetails(){

        $this->form_validation->set_rules('mname','Medicine Name','trim|required');
        $this->form_validation->set_rules('mprice','Medicine Price','trim|required');
        $this->form_validation->set_rules('mstock','Medicine Stock','trim|required');
        $this->form_validation->set_rules('manufacturardate','Manufacturar Date','trim|required');
        $this->form_validation->set_rules('expdate','Expiry Date','required');

        if($this->form_validation->run()){
            $resp=$this->model->addMedicine();
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('medicine');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('medicine');
            }
            }
            else{
                $this->load->view('medicine/medicine');
        }
    }

    public function medicineList(){
        $get =$this->input->get('expdate',true);    
        if (!empty($get))
        {
            $data['medicine']=$this->model->expdate();
        } 
        else {
            $data['medicine']=$this->model->getMedicine();
        }
        $this->load->view('medicine/medicineList',$data);
    }

    public function edit($id){
        $data['medicine']=$this->model->findMedicine($id);
        $this->load->view('medicine/edit',$data);
    }

    public function update(){

        $this->form_validation->set_rules('mname','Medicine Name','trim|required');
        $this->form_validation->set_rules('mprice','Medicine Price','trim|required');
        $this->form_validation->set_rules('mstock','Medicine Stock','trim|required');
        $this->form_validation->set_rules('manufacturardate','Manufacturar Date','trim|required');
        $this->form_validation->set_rules('expdate','Expiry Date','required');
        $data=$this->input->post();

        if($this->form_validation->run()){
            $resp=$this->model->update($data);
            if($resp)
                {
                $this->session->set_flashdata('good','Your Data Edit successfully !!');
                return redirect('medicine/medicineList');
            }
            else{
                $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                return redirect('medicine/edit');
            }
            }
            else{
                $this->load->view('medicine/medicine');
        }
    }

    public function delete($id){
        $this->model->delete($id);
        $this->session->set_flashdata('good','Your Data Edit successfully !!');
        redirect('medicine/medicineList');
    }  
}