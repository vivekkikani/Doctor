<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_model extends CI_Model {

    public function add($stringRepresentation){  

        $q=array(
                "name"=>$this->input->post('name'),
                "email"=>$this->input->post('email'),
                "address"=>$this->input->post('address'),
                "moblieno"=>$this->input->post('moblieno'),
                "fee"=>$this->input->post('fee'),
                "specialization"=>$this->input->post('specialization'),
                "availabletimedoctor"=>$stringRepresentation,
        );
        return $this->db->insert('doctors',$q);
    }

    public function getDoctors(){
        return $this->db->get('doctors')->result_array();
    }

    public function findDoctors($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('doctors');
        return  $q->row_array();
    }

    public function update($data,$stringRepresentation){
        $array = array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'address'=>$data['address'],
            'moblieno'=>$data['moblieno'],
            'fee'=>$data['fee'],
            'specialization'=>$data['specialization'],
            'availabletimedoctor'=>$stringRepresentation,
            
    );
        return  $this->db->where('id',$data['id'])
                        ->update('doctors',$array);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('doctors');
    }
}