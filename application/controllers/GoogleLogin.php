<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoogleLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model','model');

        // if (isLoggedIn()) {
        //     redirect(base_url('home'));
        // }

    }

    function index(){

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
           'w3.css');
        
        $data['js'] =array(
           'jquery.min.js',
           'popper.min.js',
           'bootstrap.min.js',
           'jquery.matchHeight.min.js',
           'main.js',
           'toastr.min.js',
        );

            require_once ("vendor/autoload.php");
        
            $google_client = new Google_Client();
            $google_client->setClientId('1097800015188-9lo3g7rlj1p7vrpvn2c5ik5kv5h9ak16.apps.googleusercontent.com');
            $google_client->setClientSecret('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'); //Define your Client Secret Key
            $google_client->setRedirectUri('http://localhost/PDFexport/login'); //Define your Redirect Uri
            $google_client->addScope('email');
            $google_client->addScope('profile');
           
         if(isset($_GET["code"])){
          $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        
            if(!isset($token["error"]))
            {
             $google_client->setAccessToken($token['access_token']);
            
             $this->session->set_userdata('access_token', $token['access_token']);
            
             $google_service = new Google_Service_Oauth2($google_client);
             $data = $google_service->userinfo->get();
          

        //  if($this->google_login_model->Is_already_register($data['id']))
        //     {
        //      //update data
        //      $user_data = array(
        //       'first_name' => $data['given_name'],
        //       'last_name'  => $data['family_name'],
        //       'email_address' => $data['email'],
        //       'profile_picture'=> $data['picture'],
        //       'updated_at' => $current_datetime
        //      );
         
        //      $this->google_login_model->Update_user_data($user_data, $data['id']);
        //     }
        //     else
        //     {
             //insert data
        //      $user_data = array(
        //       'id' => $data['id'],
        //       'first_name'  => $data['given_name'],
        //       'last_name'   => $data['family_name'],
        //       'email_address'  => $data['email'],
        //       'profile_picture' => $data['picture'],
        //       'created_at'  => $current_datetime
        //      );
         
        //      $this->google_login_model->Insert_user_data($user_data);
        //     }
        //     $this->session->set_userdata('user_data', $user_data);
        }
    }   
    
    $login_button = '';
         if(!$this->session->userdata('access_token')){
            $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'asset/sign-in-with-google.png" /></a>';
            $data['login_button'] = $login_button;
            $this->load->view('login/login', $data);
        }
    }
}