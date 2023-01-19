<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Disease_model extends CI_Model {

    public function add(){  
        $q=array("disease"=>$this->input->post('disease'),
                "status"=>1);
        return $this->db->insert('disease',$q);
    }

    public function getDisease(){
        return $this->db->get('disease')->result_array();
    }

    public function findDisease($id){
        $q=$this->db->where('id',$id)
                    ->get('disease');
        return  $q->row_array();
    }

    public function update($data){
        $array = array(
            'disease'=>$data['disease']);
        return  $this->db->where('id',$data['id'])
                        ->update('disease',$array);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('disease');
    }
}