<?php

class User extends Controller
{
	function index()
	{
		$this->load->library('firephp');
		$data['content']	=	'pages/login';
		$this->load->view('user/login', $data);
	}

	function validate()
	{
		$this->load->model('user_model', 'User');
		$send = $this->User->verify();
					$this->load->library('firephp');
		if($send)
		{
			$user_data = array(
				'username'	=>	$this->input->post('username'),
				'is_logged_in'	=>	true
			);
			
			$this->session->set_userdata($user_data);
			redirect('site/home');
		}
			else
		{
			$this->firephp->log($send);
			$this->index();
		}
	}	

	function register()
	{
		$data['content']	=	'pages/register';
		$this->load->view('user/index', $data);
	}	

	function register_user()
	{   
       /* 
         * Set registrtion validation rules. Username must be a minimum of 4 characters and maximum of 25 characters,
         * it must be alpha numerical but allow hyphens and underscores. Email must be a valid email address
         * the password must match the password confirmation field, and be a minimum length of 4 characters and max length
         * of 34 characters. First & Last names can only contain Alphabetical Characters.
         */
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[25]|
										   xss_clean|htmlspecialchars|alpha_dash');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[34]|htmlspecialchars');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|matches[password]|required');
		
		$this->form_validation->set_rules('first_name','First Name','trim|htmlspecialchars|alpha');
		$this->form_validation->set_rules('last_name','Last Name','trim|htmlspecialchars|alpha');
		

		/*
		 * If the validation has failed then relocate the user to the registration page where they just were
		 * showing the errors so the user can correct them. Otherwise send them to the successful registration page.
		 */
		if ($this->form_validation->run() == FALSE) 
		{
			$this->register();
		} 
			else 
		{
			$this->load->model('user_model','User');
				/* Set E-Mail Configuration Options */
			$config = array(
				'protocol'	=>	'smtp',
				'smtp_host'	=>	'ssl://smtp.googlemail.com',
				'smtp_port'	=>	465,
				'smtp_user'	=>	'noreply@dwardle.com',
				'smtp_pass'	=>	'dwlnorep!!!',
				'mailtype'	=>	'html',
				'validate'	=>	true
			);
			$this->load->library('email', $config);
			
			$this->email->set_newline("\r\n");
			
			if($send = $this->User->create_user())
			{
				$data['content']	=	'pages/member_created';
				$this->load->view('user/index', $data);
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$first_name	=	$this->input->post('first_name');
		
				$this->email->from('noreply@dwardle.com','Dwardle User Registration');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Dwardle Registration Successful.');
				$this->email->message('
				<h1>Congratulations ' . $first_name . '!</h1>
				<p>Your account has successfully been created and you can now ' . anchor(base_url(), 'Login') . ' 
				using the credentials below.</p>
		
<p>				<strong>Username:</strong> ' . $username . '</p>
<p>				<strong>Password:</strong> ' . $password . '.
		
<p>				Regards,<br />
				Dwardle Team</p>');
				$this->email->send();
			}
				else
			{
				$this->load-view('pages/register');
			}
		}
	}
	
	function forgotpw()
	{

	}
	
}	
