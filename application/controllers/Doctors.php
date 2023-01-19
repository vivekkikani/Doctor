<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Doctors_model','model');
        $this->load->library('form_validation');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
		}

    }

    public function index(){

        $this->load->view('doctors/doctors');
    }

    public function doctorsDetails(){

        $this->form_validation->set_rules('name','Doctors Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('moblieno','Moblie No','trim|required');
        $this->form_validation->set_rules('fee','Doctors Fee','required');
        $this->form_validation->set_rules('specialization','Specialization','required');
        // $this->form_validation->set_rules('availabletimedoctor','Available Time Docto','required');
        $time=array($this->input->post('availabletimedoctor'),$this->input->post('time'));
        // $data['availabletimedoctor']=$this->input->post('availabletimedoctor');
        // $data['time']=$this->input->post('time');
        // prd($data);
        $stringRepresentation= json_encode($time);
        if($this->form_validation->run()){
           
            $resp=$this->model->add($stringRepresentation);
            if($resp)
                {
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('doctors');
            }
            else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('doctors');
            }
            }
            else{
                $this->load->view('doctors/doctors');
        }
    }

    public function doctorsList(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/PDFexport/ApiDoctor',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array(
            'X-API-KEY: funda123',
            'Authorization: Basic YWRtaW46MTIzNA==',
            'Cookie: ci_session=6rmq2ge7obkqdmvajdmckbmlrfrj64hn'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $allData['doctors']= json_decode($response,true);
        $this->load->view('doctors/doctorsList',$allData);
    }

    public function edit($id){
        $data['doctors']=$this->model->findDoctors($id);
        // $user=json_decode($data['doctors']['availabletimedoctor']);
        // echo '<pre>';
        // print_r($user);die;
        $this->load->view('doctors/edit',$data);
    }

    public function update(){
        $this->form_validation->set_rules('name','Doctors Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('moblieno','Moblie No','trim|required');
        $this->form_validation->set_rules('fee','Doctors Fee','required');
        $this->form_validation->set_rules('specialization','Specialization','required');
        $data=$this->input->post();
        $user['availabletimedoctor']=$this->input->post('availabletimedoctor');
        $user['time']=$this->input->post('time');
        $stringRepresentation= json_encode($user);

        if($this->form_validation->run()){
           $doctors=$this->model->update($data,$stringRepresentation);
            if($doctors){
                $this->session->set_flashdata('good','Your Data Edit successfully !!');
                return redirect('doctors/doctorsList');
            }else{
                $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                return redirect('doctors/edit');
                };
        }
    }

    public function delete($id){
        $this->model->delete($id);
        $this->session->set_flashdata('good','Your Data Deleted successfully !!');
        redirect('doctors/doctorsList');
    }  

}
