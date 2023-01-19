<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('Admin_model','model');
		if (!isLoggedIn()) {
            redirect(base_url('login'));
			
			if($this->session->userdata('role') == '2'){
				redirect('doctor');
			}
			else if($this->session->userdata('role') == '3'){
				redirect('nurse');
			}
		}
    }

	public function index()
	{
		$data['patients']=$this->model->count_all();
		$data['fee']=$this->model->reverse();
		$data['year']=$this->model->reverseyear();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.covid19api.com/summary',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$res['Global'] = json_decode($response,true);
		$flatArray = array_column( $res,'Global');
		$data['NewConfirmed']=array_column( $flatArray,'NewConfirmed');
		$data['TotalConfirmed']=array_column( $flatArray,'TotalConfirmed');
		$data['NewDeaths']=array_column( $flatArray,'NewDeaths');
		$data['TotalDeaths']=array_column( $flatArray,'TotalDeaths');
		$data['NewRecovered']=array_column( $flatArray,'NewRecovered');
		$data['TotalRecovered']=array_column( $flatArray,'TotalRecovered');
		// prd($flatArray);
		$this->load->view('home/home',$data);
	}

	public function notification(){
		$data['notifications']=$this->model->expdate();
		echo json_encode($data);
    }

	public function covidCountries(){

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.covid19api.com/summary',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$allData= json_decode($response,true);

		$data['Countries']=$allData['Countries'];
		$this->load->view('home/covidConuties',$data);
		// return $res;
	}
}
?>