<?php

class Site extends Controller 
{
	function __construct()
	{
		parent::Controller();
		$this->is_logged_in();
	}
	
	function home()
	{
		$this->load->view('site/home');
	}
	
	function is_logged_in()
	{
		$is_logged_in	=	$this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'Sorry, but it seems like you haven\'t registered with Dwardle. Please ';
			echo anchor(base_url(),'Login') .' or ' . anchor('user/register', 'Register');
			die();
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('is_logged_in');
		redirect(base_url());
	}
}
