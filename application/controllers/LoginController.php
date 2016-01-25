<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller{

    public function index()
    {
        $this->load->view('login'); 
    }
    public function logout(){
         $this->session->sess_destroy(); //this clears the current session and logs out
          $this->load->view('logout_view');
     }
}
?>