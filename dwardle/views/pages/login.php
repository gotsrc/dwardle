<h1>Login to your account!</h1>
<?php
	echo form_open('user/login');		
	
	echo '<p>' . form_label('E-Mail: ','email');
	$data = array('name'=>'email','id'=>'email');
	echo form_input($data) .'</p>';
	
	echo '<p>' . form_label('Password: ','password');
	$data = array('name'=>'password','id'=>'password');
	echo form_password($data) . '</p>'; 
	
	echo '<p>' . form_submit('submit','Login!');
	echo anchor('user/register','Register an account') . '</p>';
?>
