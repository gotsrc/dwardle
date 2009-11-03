				<h1>Register with Dwardle!</h1>
				
				<?=form_open('user/register');?>
				<?=validation_errors('<div class="error"><p>','</div>');?>
				<fieldset>
					<legend>Required Information</legend>
					<p><?=form_label('Username: ','username');?>
					<?=form_input('username');?>
					</p>
	
					<p><?=form_label('E-Mail: ','email');?>
					<?=form_input('email');?>
					</p>
	
					<p><?=form_label('Password: ','password');?>
					<?=form_password('password');?>
					</p>
					
					<p><?=form_label('Confirm Password: ','pconf');?>
					<?=form_password('pconf');?>
					</p>
				</fieldset>
				
				<fieldset>
					<legend>Optional Information</legend>
					<p><?=form_label('First Name: ','first_name');?>
					<?=form_input('first_name');?>
	
					<p><?=form_label('Last Name: ','last_name');?>
					<?=form_input('last_name');?>
				</fieldset>
				
				<p><?=form_submit('submit','Register!');?></p>
				
				<?=form_close();?>
