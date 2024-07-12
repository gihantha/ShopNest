<?php 

class Usermodel extends CI_Model{

    function get_user($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_name', $username);

        $query = $this->db->get();
        
        return $query->result();
    }
}