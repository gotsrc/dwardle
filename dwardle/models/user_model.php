<?php

class user_model extends Model
{
	function verify()
	{
	
	}
	
	function create_user()
	{
		$salt = mt_rand(5, 15);
		$user_data = array(
				'username'	=>	$this->input->post('username'),
				'email'		=>	$this->input->post('email'),
				'password'	=>	sha1($this->input->post('password')) . $salt,
				
				'first_name'	=>	$this->input->post('first_name'),
				'last_name'		=>	$this->input->post('last_name')
		);
	}
}
