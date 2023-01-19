<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function count_all(){
    
        $this->db->select('id');
        $this->db->from('admit_details');
        $this->db->where('MONTH(admitdate)', date('m')); 
        //  echo $this->db->last_query();
        $res =$this->db->count_all_results();    
        return $res;
    }

    public function reverse(){
        $res=$this->db->select_sum('fee')
                    ->where('MONTH(admitdate)', date('m-Y'))
                    ->get('admit_details');
                    // echo $this->db->last_query();die;
        return $res->row_array();
    }

    public function reverseyear(){
        $res=$this->db->select_sum('fee')
                    ->where('year(admitdate)', date('Y'))
                    ->get('admit_details');
                    // echo $this->db->last_query();
        return $res->row_array();
    }

    public function expdate(){
        $this->db->select('id');
        $this->db->from('medicine');
        $this->db->where('expdate <= ', date('Y-m-d'));
        //  echo $this->db->last_query();die;
        $res =$this->db->count_all_results();  
        return $res;
    }
}
