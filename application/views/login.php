<?php
    
    $this->load->view('includes/header_view');
    
    $this->load->view('includes/login_navigation_view');

?>


<!-- Login Form -->
<section class="loginform">


<?php 
    
echo form_open('main/login_validation');
    
echo validation_errors();

echo "<p>Email: ";
echo form_input('email');
echo "</p>";
    
echo "<p>Password: ";
echo form_password('password');
echo "</p>";  
    
echo "<p>";
echo form_submit('login_submit', 'Login');
echo "</p>";
    
echo form_close('');
    
?>


</section>

<?php

    $this->load->view('includes/footer_view');
   
?>