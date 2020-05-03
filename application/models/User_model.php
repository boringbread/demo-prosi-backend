
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
    private $website = 'website';
    private $user = 'user';

    // Get exact user
    function getUserData($ID){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('ID', $ID);
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
        $query = $this->db->get('user');
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
    
    // function get_website_list() {
    //     $query = $this->db->get($this->user);
    //     if ($query) {
    //         return $query->result();
    //     }
    //     return NULL;
    // }

    // function get_website($id) {
    //     $query = $this->db->get_where($this->website, array("id" => $id));
    //     if ($query) {
    //         return $query->row();
    //     }
    //     return NULL;
    // }
    
    // function add_website($website_title, $website_url) {
    //     $data = array('title' => $website_title, 'url' => $website_url);
    //     $this->db->insert($this->website, $data);
    // }
    // function update_website($website_id, $website_title, $website_url) {
    //     $data = array('title' => $website_title, 'url' => $website_url);
    //     $this->db->where('id', $website_id);
    //     $this->db->update($this->website, $data);
    // }
    
    // function delete_website($website_id) {
    //     $this->db->where('id', $website_id);
    //     $this->db->delete($this->website);
    // }
}
