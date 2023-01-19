<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgottenPass_model extends CI_Model {

    public function update_pass($newpass,$id)
    {
        $data=array('password'=>md5($newpass));
        $result=$this->db->where('id',$id)
                        ->update('user',$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function checkpassword($id){
        $this->db->select('password');
        $this->db->where('id',$id);
        return $this->db->get('user')->row();
    }   

}