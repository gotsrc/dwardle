<?php

class user_model extends Model
{
	function verify()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		$get = $this->db->get('users');
		
		if($get->num_rows == 1)
		{
			return true;
		}
	}
	
	function create_user()
	{
		// $salt = mt_rand(5, 15);
		
		$user_data = array(
				'username'	=>	$this->input->post('username'),
				'email'		=>	$this->input->post('email'),
				'password'	=>	sha1($this->input->post('password')),
				'first_name'	=>	$this->input->post('first_name'),
				'last_name'		=>	$this->input->post('last_name'),
				'registered'	=>  date("Y-m-d h:i:s")
		);
		
		$send = $this->db->insert('users', $user_data);
				
		return $send;
	}
}
