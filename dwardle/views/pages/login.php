<h1>Login</h1>
<?php
	echo form_open('user/validate');

	echo '<p>' . form_label('Username / Email: ','username');
	echo form_input('username','Username') . '</p>'; 
	
	echo '<p>' . form_label('Password: ','password');
	echo form_input('password','password') . '</p>';
	
	echo '<p>' . form_submit('submit','Login!');
	echo anchor('user/register','Register!');
	
	echo form_close();
?>
