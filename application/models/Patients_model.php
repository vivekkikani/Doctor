<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_model extends CI_Model {

    public function addPatients(){  

        $q=array(
                "name"=>$this->input->post('name'),
                "email"=>$this->input->post('email'),
                "age"=>$this->input->post('age'),
                "gender"=>$this->input->post('gender'),
                "phoneno"=>$this->input->post('phoneno'),
                "status"=>1,
        );
        return $this->db->insert('patients',$q);
    }

    public function getPatients(){
        return $this->db->get('patients')->result_array();
    }

    public function findPatients($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('patients');
        return  $q->row_array();
    }

    public function updatePatients($data){
        $array = array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'age'=>$data['age'],
            'gender'=>$data['gender'],
            'phoneno'=>$data['phoneno'],
            
    );
        return  $this->db->where('id',$data['id'])
                        ->update('patients',$array);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('patients');
    }
    
    public function getdata($id){
        $this->db->select('a.id,a.admitdate,a.dischardate,a.fee,p.name as patientname,p.age,p.gender,p.phoneno,d.disease,dr.name as doctorname');    
        $this->db->from('admit_details a');
        $this->db->join('patients p', 'a.patients_id = p.id');
        $this->db->join('disease d', 'a.disease_id = d.id');
        $this->db->join('doctors dr', 'a.doctors_id = dr.id');
        $this->db->where('a.patients_id',$id);
        $query = $this->db->get();
        // print_r($this->db->last_query());die;
        return $query->row_array();
    }

    public function admitDetailsdata($id){
        $this->db->select('a.id,a.admitdate,a.dischardate,a.fee,p.name as patientname,p.age,p.gender,p.phoneno,d.disease,dr.name as doctorname');    
        $this->db->from('admit_details a');
        $this->db->join('patients p', 'a.patients_id = p.id');
        $this->db->join('disease d', 'a.disease_id = d.id');
        $this->db->join('doctors dr', 'a.doctors_id = dr.id');
        $this->db->where('a.patients_id',$id);
        $query = $this->db->get();
        // print_r($this->db->last_query());die;
        return $query->result_array();
    }
}