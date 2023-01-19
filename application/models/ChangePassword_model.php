<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword_model extends CI_Model {

    public function newpass($password,$user){
        $data=array('password'=>md5($password));
        return $this->db->where('id',$user['id'])
                        ->update('user',$data);
    // print_r($this->db->last_query());die;
    }

    // public function getid(){
    //     $q=$this->db->select('id')
    //                 ->get('user');
    //             return  $q->row();
    // }

    public function getUserByEmail($email){
       return $this->db->where('email',$email)
                        ->get('user')
                        ->row_array();

    }

    public function passget($email){
        return $this->db->where('email',$email)
                         ->get('user')
                         ->row_array();
 
     }
}