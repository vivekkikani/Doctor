<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class ApiDoctor extends RestController{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('ApiDoctor_model');
    }

    public function index_get()
    {
        $doctors = new ApiDoctor_model;
        $doctors = $doctors->getMedicine();
        $this->response($doctors, 200);
    }

    public function storedata_post()
    {
        $medicine = new Api_model;
        $medicine=$medicine->addMedicine();
        if($medicine > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW MEDICINE ADD'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO ADD NEW MEDICINE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function editMedicine_get($id)
    {
        $medicine = new Api_model;
        $medicine = $medicine->editMedicine($id);
        $this->response($medicine, 200);
    }

    public function updateStudent_put()
    {
        $medicine = new Api_model;
        $medicine = $medicine->updateMedicine();
        if($medicine > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'UPDATE MEDICINE'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO  UPDATE MEDICINE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteMedicine_delete($id)
    {
        $medicine = new Api_model;
        $result = $medicine->delete_Medicine($id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'MEDICINE DELETED'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO DELETE MEDICINE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}