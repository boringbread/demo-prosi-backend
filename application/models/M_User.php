
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_User extends CI_Model {
    // Get exact user
    function getUserData($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->result_array();
        }
        else{
            return false;
        }
    }

    // Get all user data on DB
    function getAllUserData(){
        $query = $this->db->get('Users');
        if($query){
         return $query->result();
        }
        return NULL;
    }

    // Inserting data
    function insertData($username, $password){
        $data = array('Username' => $username, 'Password' => $password);
        $this->db->insert('user', $data);
    }
    
    function login($uname, $password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('Username', $uname);
        $this->db->where('Password', $password);
        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->result_array();
        }
        else{
            return false;
        }
    }

    function deleteUser($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('ID', $id);
        $this->db->delete('user');
    }

    function update($id, $password){
        $data = array($password);
        $this->db->where('ID', $id);
        $this->db->update('user', $data);
    }
}
