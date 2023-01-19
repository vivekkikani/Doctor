<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function check(){
        $email = $this->input->post('email');
        $password=md5($this->input->post('password'));
        $result = $this->db->select('id,username,email,role')
            ->group_start()
                ->where('email',$email)
                ->or_where('username',$email)
            ->group_end()
            ->where('password',$password)
            ->get('user')
            ->row_array();
        return $result;
    }

    // function Is_already_register($id)
    //     {
    //      $this->db->where('id', $id);
    //      $query = $this->db->get('user');
    //      if($query->num_rows() > 0)
    //      {
    //       return true;

    //     }else{

    //       return false;
    //      }
    // }

    // function Update_user_data($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('user', $data);
    //     }
    
    // function Insert_user_data($data){
    //     $this->db->insert('user', $data);
    // }
}

?>