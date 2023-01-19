<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function getMedicine()
    {
        $query = $this->db->get("medicine");
        return $query->result();
    }

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

    public function editMedicine($id){
        $q=$this->db->where('id',$id)
                    ->get('medicine');
        return  $q->row_array();
    }

    public function updateMedicine(){
        $array = [
            'mname' =>  $this->input->post('mname'),
            'mprice' => $this->input->post('mprice'),
            'email' => $this->input->post('email'),
            'mstock' =>  $this->input->post('mstock'),
            'expdate' => $this->input->post('expdate'),
        ];
        return  $this->db->where('id',$array['id'])
                        ->update('medicine',$array);
    }

    public function delete_Medicine($id)
    {
        return $this->db->delete('medicine', ['id' => $id]);
    }
    
}