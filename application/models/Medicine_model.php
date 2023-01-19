<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_model extends CI_Model {

    public function addMedicine(){  

        $q=array(
                "mname"=>$this->input->post('mname'),
                "mprice"=>$this->input->post('mprice'),
                "mstock"=>$this->input->post('mstock'),
                "manufacturardate"=>$this->input->post('manufacturardate'),
                "expdate"=>$this->input->post('expdate'),
                "status"=>1,
        );
        return $this->db->insert('medicine',$q);
    }

    public function getMedicine(){
        return $this->db->get('medicine')->result_array();
    }

    public function expdate(){
        return $this->db->where('expdate <= ', date('Y-m-d'))
                    ->get('medicine')->result_array();
    }

    public function findMedicine($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('medicine');
        return  $q->row_array();
    }

    // public function getdate(){
    //     return $this->db->select()
    //                 ->get('medicine')->result_array();
    // }

    public function update($data){
        $array = array(
            'mname'=>$data['mname'],
            'mprice'=>$data['mprice'],
            'mstock'=>$data['mstock'],
            'manufacturardate'=>$data['manufacturardate'],
            'expdate'=>$data['expdate'],
            
    );
        return  $this->db->where('id',$data['id'])
                        ->update('medicine',$array);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('medicine');
    }
}