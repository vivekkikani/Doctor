<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdmitDetails_model extends CI_Model {
    
    public function getPatients(){
        $q=$this->db->select('id,name,age,phoneno')
                    ->where('status','1')
                    ->get('patients');
        return  $q->result_array();
    }

    public function getDisease(){
        $q=$this->db->select('id,disease')
                    ->where('status','1')
                    ->get('disease');
        return  $q->result_array();
    }

    public function getDoctor(){
        $q=$this->db->select('id,name,specialization')
                    ->where('status','1')
                    ->get('doctors');
        return  $q->result_array();
    }

    public function add(){  
        $q=array(
                "patients_id"=>$this->input->post('patients'),
                "disease_id"=>$this->input->post('disease'),
                "doctors_id"=>$this->input->post('doctor'),
                "admitdate"=>$this->input->post('admitdate'),
                "fee"=>$this->input->post('fee'),
                "status"=>1,
        );
        // print_r($this->db->last_query());die;
        return $this->db->insert('admit_details',$q);
    }

    public function getAdmit(){
        $this->db->select('a.id,a.admitdate,a.dischardate,a.fee,a.status,p.name as patientname,d.disease,dr.name as doctorname');    
        $this->db->from('admit_details a');
        $this->db->join('patients p', 'a.patients_id = p.id');
        $this->db->join('disease d', 'a.disease_id = d.id');
        $this->db->join('doctors dr', 'a.doctors_id = dr.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function findAdmit($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('admit_details');
        return  $q->row_array();
    }

    public function update($user){
        $array = array(
            'patients_id'=>$user['patients'],
            'disease_id'=>$user['disease'],
            'doctors_id'=>$user['doctor'],
            'admitdate'=>$user['admitdate'],
            'fee'=>$user['fee'],
            'dischardate'=>$user['dischardate'],
            
    );
        return  $this->db->where('id',$user['id'])
                        ->update('admit_details',$array);
    }

    public function admit(){
        $id=$this->input->post('id');
        $this->db->select('a.id,a.admitdate,a.dischardate,a.fee,a.status,p.name as patientname,p.age,p.gender,p.phoneno,d.disease,dr.name as doctorname,dr.specialization');    
        $this->db->from('admit_details a');
        $this->db->join('patients p', 'a.patients_id = p.id');
        $this->db->join('disease d', 'a.disease_id = d.id');
        $this->db->join('doctors dr', 'a.doctors_id = dr.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get();
         return $query->result_array();
    }

    public function getdata($id){
        $this->db->select('a.id,a.admitdate,a.dischardate,a.fee,a.status,p.name as patientname,p.age,p.gender,p.phoneno,d.disease,dr.name as doctorname,dr.specialization');    
        $this->db->from('admit_details a');
        $this->db->join('patients p', 'a.patients_id = p.id');
        $this->db->join('disease d', 'a.disease_id = d.id');
        $this->db->join('doctors dr', 'a.doctors_id = dr.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get();
         return $query->row_array();
    }
}
?>