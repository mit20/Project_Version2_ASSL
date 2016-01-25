<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{

    public function index()
    {
        $this->load->view('home_view'); 
    }
    
    // Displays Photo Gallery 
	public function gallery() {
	
	$this->load->view('photo_gallery');
	}
    
    public function login_validation(){
		//this function does the validation and loads form validation library
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials'); //the callback looks for the validate_credentials function in the Main controller
        $this->form_validation->set_rules('password', 'Password', 'required|md5|trim'); //takes password and encrypts to md5 value
        
        if ($this->form_validation->run()){  //Run function will return true if set_rules have been verified
            $data = array( //This array is passed into 
                'email' => $this->input->post('email'), //session variable - Grabs email that user enters and stores in session data.
                'logged_in' => 1  //checks to see if user is logged in
            );
            
            $this->session->set_userdata($data); //set_userdata adds data to session array - receives $data array
            redirect('main/gallery');
        }else {
            $this->load->view('login');  //If set_rules aren't verified then will take user to login page
        }
    }
    
    public function validate_credentials(){
    
        $this->load->model('model_users'); //Load model
        
        if($this->model_users->log_in()){ //log_in is a method in the model_users model that evaluates if you can login with current credentials. If returns true the validate_credentials function will also return true and the form validation library will check for errors as well.
            return true;
        } else {  //if the validate_credentials returns false it will return an error message
            $this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
            return false;
        }
    }
    
}