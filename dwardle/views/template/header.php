<!DOCTYPE html>
<html>
	<head>
		<title><?=$name . ': ' . $page; ?></title>

		<link rel="stylesheet" href="<?=base_url();?>static/styles/main.css" type="text/css" media="screen,projector" />
		<link rel="shortcut icon" href="<?=base_url();?>static/images/favicon.ico">
		<script type="text/javascript" src="<?=base_url();?>static/js/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url();?>static/js/fade.js"></script>		
	</head>

	<body>
		<div id="inner_wrap">
			<a href="<?=base_url();?>" alt="Home!"><img src="<?=base_url();?>static/images/logo.png"/></a>
			
				<div id="nav" class="n_pad">
					<div class="n_left"><span class="name">Welcome to Dwardle!</span></div>
					
					<div class="n_right">
						<?php
							$this->db->select('name, slug, link');
							$tabs = $this->db->get('nav');
							
							foreach($tabs->result() as $tab)
							{
							
								if($tab->link === $this->uri->segment(2))
								{
									echo '<span class="active">' . $tab->name . '</span>';
								} else	{
									echo '<a href="' . base_url() . $tab->slug . '">' . $tab->name . '</a></a>';
								}
							}						
						?>
					</div>
				</div>
			
			<div id="main">
				<div id="left" class="l_pad">
