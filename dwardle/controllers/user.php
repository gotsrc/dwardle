<?php

class User extends Controller
{
	function User()
	{
		parent::Controller();
	}

	function index()
	{
		$data['name']		= 	"Dwardle Dev";
		$data['mainName']	=	"Dwardle";
		$data['page']		= 	"Welcome";
		$data['content']	=	'pages/index';
		if ($this->session->userdata('logged_in') == TRUE)
		{
			$this->load->view('template/main', $data);
		} else {	
			$this->login();
		}
	}

function login()
	{
		/*
		 * Set some global variables I'm sure this can be used in the controller instantiation
		 * process.
		 */
		$data['name']		= 	"Dwardle Dev";
		$data['mainName']	=	"Dwardle";
		$data['page']		= 	"Login";
		$data['content']	=	'pages/login';
		/*
		 * Set Login form validation rules so that no special characters can be inserted
		 * and also filter out any Cross Site Scripting stuff.
		 */
		$this->form_validation->set_rules('email','email','trim|required|valid_email|htmlspecialchars|xss_clean|callback_email_check');
		$this->form_validation->set_rules('password','Password','trim|required|htmlspecialchars|xss_clean|callback_password_check');
		
		/* If the form doesn't pass validation then return the user to the login page again
		 * else log them in and send them to the index page.
		 */
		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/login/main', $data);
		}
		else
		{
			
			$data[] = array(
						'email'		=>	$this->input->post('email'),
						'password'	=>	$this->input->post('password'),
						'logged_in'	=>	TRUE
						);

			$this->session->set_userdata($data);
			
			$this->load->view('template/main', $data);
		}
	}	
	
	// Check if the email address exists
	function email_check($email)
	{
		$query = $this->db->query("SELECT * FROM `dwl_users` WHERE `email` = '$email'");
		
		if($query->num_rows() === 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	// Check that the password is correct for the email address
	function password_check($password)
	{
		$email = set_value('email'); // assign the value fo the email field to this variable
		
		$query = $this->db->query("SELECT * FROM `dwl_users` WHERE `email` = '$email' AND `password` = '$password'");
		
		if($query->num_rows() == 1)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	

	function register()
	{   
  		$data['name']		= 	"Dwardle Dev";
		$data['mainName']	=	"Dwardle";
		$data['page']		= 	"Register your account";
		$data['content']	=	'pages/register';
		
		/* Generate a random string of integers to use as a salt for the hashing method. */
		$salt = rand(1000000,9999999);
        
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
		$this->form_validation->set_rules('pconf','Password Confirmation','trim|matches[password]|required');
		
		$this->form_validation->set_rules('first_name','First Name','trim|htmlspecialchars|alpha');
		$this->form_validation->set_rules('last_name','Last Name','trim|htmlspecialchars|alpha');
		
		/* 
		 * Tell CodeIgniter to use the error class within a small tag for each error message the error will then appear
		 * to the right of the form field.
		 */
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		/*
		 * If the validation has failed then relocate the user to the registration page where they just were
		 * showing the errors so the user can correct them. Otherwise send them to the successful registration page.
		 */
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/login/main', $data);
		} else {
			$this->load->view('template/login/main', $data);
        
        /* Define an array of data so that the data can be passed to the Users Model. */
        $data = array(
                'username'  => $this->input->post('username'), // Inputted Username.
                'email'     => $this->input->post('email'), // Inputted E-mail address.
                'password'  => $salt . dohash($this->input->post('password')), // Password salted then hashed.
                'salt'      => $salt, // The random number which was generated.
                'first_name'    =>  $this->input->post('first_name'), // Users first name [not required]
                'last_name'     =>  $this->input->post('last_name'), // Users last name [not required]
                'registered'      =>  date('y-m-d h:i:s') // Date the registration took place.
                );
        
        /* 
         * Parse the data array through to the users model so that the users model can create the user within the 
         * database 
         */
        $this->M_Users->create($data);
		}
	}
	
	function forgotpw()
	{
		$data['name']		= 	"Dwardle Dev";
		$data['mainName']	=	"Dwardle";
		$data['page']		= 	"Reset your password";
		$data['content']	=	'pages/forgotpass';
		
		$this->load->view('template/main', $data);
	}
	
}	
