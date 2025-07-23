<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Express International - Admin  Authentication</title>
<link rel="icon" href="<?php echo base_url('favicon.ico');?>" />
<link rel="shortcut icon" href="<?php echo base_url('favicon.ico');?>" />

<link rel="stylesheet" type="text/css" href="<?php echo resource('backend');?>css/style.css" media="screen" />
<script type="text/javascript" src="<?php echo resource('backend');?>js/jquery.js"></script>
<script type="text/javascript">var config={base:"<?php echo base_url();?>"};</script>
</head>
<body>
	<div class="main">
		<div class="login-form">
			<h1>Admin Login</h1>
					<div class="head">
						<img src="<?php echo resource('backend');?>images/user.png" alt=""/>
					</div>
				<div id="msg_e"><?php 
				if(validation_errors()!=false){?>
				 	      
				 	      <div class="n_error"><?php echo validation_errors(); ?></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="validation_error"){?>
				 	      
				 	      <div class="n_error"><p>Please fill out all the field correctly!.</p></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="db_error"){?>
				 	      
				 	      <div class="n_error"><p>The Username or Password is incorrect.</p></div>
				<?php   }
				  ?></div>
				<form action="<?php echo base_url();?>admin/check-authentication" method="post">
					
					<input id="username" name="username" type="text" placeholder="Username" class="text" required />
					
					<input id="pass" name="pass" type="password" placeholder="Password" class="text" required />
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
					
					<div class="sep"></div>
					
						<button type="submit" class="ok">Login</button> 
						
					
					<p><a class="button" href="<?php echo base_url();?>admin/forgot-password">Forgotten password?</a></p>
				</form>
			</div>
			
		
</div>
 <?php   
             
				 if($this->session->flashdata('success')||$this->session->flashdata('error')){?>
				 	  <script type="text/javascript">
				 	        setTimeout(function(){
				 	        	$('#msg_e').children().fadeOut('slow');
				 	        	
				 	        },6000);
				 	  
				 	  </script>
				 	
				<?php   } 
				 
			 ?>

</body>
</html>