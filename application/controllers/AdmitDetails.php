<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class AdmitDetails extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdmitDetails_model','model');
        $this->load->library('form_validation');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
		}
    }

    public function index(){
        $data['patients']=$this->model->getPatients();
        $data['disease']=$this->model->getDisease();
        $data['doctor']=$this->model->getDoctor();
        $this->load->view('admitdetails/admitdetails',$data);
    }

    public function admitDetails(){
        $this->form_validation->set_rules('admitdate','Admit Date','trim|required');
        $this->form_validation->set_rules('fee','Doctors Fee','required');
        $data['patients']=$this->model->getPatients();
        $data['disease']=$this->model->getDisease();
        $data['doctor']=$this->model->getDoctor();
        if($this->form_validation->run()){
            $resp=$this->model->add();
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('admitdetails');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('admitdetails');
                };
            }
            else {
                $this->load->view('admitdetails/admitdetails',$data);
        }
    }

    public function admitdetailsList(){
        $data['admit_details']=$this->model->getAdmit();
        $data['patients']=$this->model->getPatients();
        $data['disease']=$this->model->getDisease();
        $data['doctor']=$this->model->getDoctor();
        $this->load->view('admitdetails/admitdetailsList',$data);
    }

    public function edit($id){
        $data['admit_details']=$this->model->findAdmit($id);
        $data['patients']=$this->model->getPatients();
        $data['disease']=$this->model->getDisease();
        $data['doctor']=$this->model->getDoctor();
        // echo '<pre>';
        // print_r($data);die;
        $this->load->view('admitdetails/edit',$data);
    }

    public function update(){
        $this->form_validation->set_rules('admitdate','Admit Date','trim|required');
        $this->form_validation->set_rules('fee','Doctors Fee','required');
        $user=$this->input->post();
        $data['patients']=$this->model->getPatients();
        $data['disease']=$this->model->getDisease();
        $data['doctor']=$this->model->getDoctor();
        if($this->form_validation->run()){
            $resp=$this->model->update($user);
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('admitdetails/admitdetailsList');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('admitdetails/edit');
                };
            }
            else {
                $this->load->view('admitdetails/edit',$data);
        }
    }

    public function view($id){
        $data['admit_details']=$this->model->getdata($id);
        $this->load->view('admitdetails/view',$data);
    }

    public function delete($id){
        $this->model->delete($id);
        $this->session->set_flashdata('good','Your Data Deleted successfully !!');
        redirect('admitdetails/admitdetailsList');
    }  

    public function download($id){
        $user['admit_details']=$this->model->getdata($id);
        $html= $this->load->view('pdf',$user,true);
        $mpdf = new Mpdf\Mpdf();
        $html.='<img src="images/doctor-log">';
        $mpdf->SetHeader('{DATE j-m-Y}');
        // $mpdf->SetFooter('{DATE j-m-Y}');
        $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML('<watermarktext content="Techokings" alpha="0.1" />');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    
}