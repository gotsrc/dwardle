<h1>Login</h1>
<?php
	echo form_open('user/validate');

	echo '<p>' . form_label('Username: ','username');
	
	$data = array(
		'name'	=>	'username',
		'id'	=>	'username',
		'maxlength'	=>	25
	);
	echo form_input('username', $data) . '</p>'; 
	
	echo '<p>' . form_label('Password: ','password');
	
	$data = array(
		'name'	=>	'password'
		'id'	=>	'password',
		'maxlength'	=>	34
	);
	echo form_password('password', $data) . '</p>';
	
	echo '<p>' . form_submit('submit','Login!');
	
	echo form_close();
?>
