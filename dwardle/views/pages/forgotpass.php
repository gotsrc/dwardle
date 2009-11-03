	<h1>Forgot Password</h1>
	
				<?=form_open('user/forgotpw');?>
				<p><?=form_label('E-Mail Address: ','email');?>
				<?=form_input('email');?></p>
				<p><?=form_submit('submit','Login!');?></p>
