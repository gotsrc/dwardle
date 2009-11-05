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
		$data['content']	=	"pages/home";
		$this->load->view('site/index', $data);
	}
	
	function about()
	{	
		$data['content']	=	"pages/about";
		$this->load->view('site/index', $data);
	}
	
	function is_logged_in()
	{
		$is_logged_in	=	$this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo '<div id="error">Sorry, but it seems like you haven\'t registered with Dwardle. Please ';
			echo anchor(base_url(),'Login') .' or ' . anchor('user/register', 'Register') . '</div>';
			die();
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
