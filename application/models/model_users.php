<?php 

class Model_users extends CI_Model {
    
    public function log_in()
    {
        //Grabs the post data
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        
        //Query object - Get function gets from "users" table in my DB.
        $query = $this->db->get('users');  //get function pass from the users table
        
        if($query->num_rows() == 1){ //if valid credentials are entered then returns true
            return true;
        } else {
            return false;
        }
    }
}

?>