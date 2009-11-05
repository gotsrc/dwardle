<h1>Register</h1>

<?php
	echo form_open('user/register_user');

	echo '<h2>Required Information:</h2>';
	echo '<p>' . form_label('Username: ','username');
	echo form_input('username') . '</p>'; 
	
	echo '<p>' . form_label('Email: ','email');
	echo form_input('email') . '</p>';
	
	echo '<p>' . form_label('Password: ','password');
	echo form_password('password') . '</p>';
	
	echo '<p>' . form_label('Password Confirmation: ','password2');
	echo form_password('password2') . '</p>';
	
	echo '<h2>Optional Information</h2>';
	echo '<p>' . form_label('First Name: ','first_name');
	echo form_input('first_name') . '</p>';
	
	echo '<p>' . form_label('Last Name: ','last_name');
	echo form_input('last_name') . '</p>';
	
	echo '<p>' . form_submit('submit','Register!');
	
	echo form_close();

	echo validation_errors('<p class="error">');
?>
