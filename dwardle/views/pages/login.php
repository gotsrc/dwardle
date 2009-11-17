<h1>Login</h1>
<?php
	echo form_open('user/validate');

	echo '<p>' . form_label('Username: ','username');
	echo form_input('username','','id="username"') . '</p>'; 
	
	echo '<p>' . form_label('Password: ','password');
	echo form_password('password','','id="password"') . '</p>';
	
	echo '<p>' . form_submit('submit','Login!');
	
	echo form_close();
?>
