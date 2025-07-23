<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Fransmas-Admin Reset Password</title>
<link rel="icon" href="<?php echo base_url('favicon.ico');?>" />
<link rel="shortcut icon" href="<?php echo base_url('favicon.ico');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo resource('backend');?>css/login.css" media="screen" />
<script type="text/javascript" src="<?php echo resource('backend');?>js/jquery.js"></script>
<script type="text/javascript">var config={base:"<?php echo base_url();?>"};</script>
</head>
<body class="ad_l_bdy">
<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
				<div class="sign_up_here">RESET YOUR PASSWORD</div>
				<div id="msg_e"><?php
				if(validation_errors()!=false){?>
				 	      
				 	      <div class="n_error"><?php echo validation_errors(); ?></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="validation_error"){?>
				 	      
				 	      <div class="n_error"><p>Please fill out all the field correctly!.</p></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="db_error"){?>
				 	      
				 	      <div class="n_error"><p>Couldn't reset the password. Please try again.</p></div>
				<?php   }
				 if($this->session->flashdata('success')&&$this->session->flashdata('success')=="success"){?>
				 	      <div class="n_ok"><p>Password has been reset successfully.</p></div>
				 <?php  }else{}  ?></div>
				<form action="<?php echo base_url();?>admin/reset-password-submit" method="post">
					
					<label for="login">Username:</label>
					<input  value="<?php echo  isset($email)?$email:$this->session->flashdata('email');?>" type="hidden" id="username" name="username" class="text" placeholder="email address" required />
					<input value="<?php echo  isset($email)?$email:$this->session->flashdata('email');?>" type="email" id="email" name="email" class="text" placeholder="email address" required />
					
					<label  for="pass">New Password:</label>
					<input value="<?php echo set_value('pass');?>" id="pass" name="pass" type="password" class="text" pattern=".{6,12}" title="Password must contain 6 - 12 characters" required />
					<label for="cpass">Confirm Password:</label>
					<input value="<?php echo set_value('cpass');?>" id="cpass" name="cpass" type="password" class="text" required />
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
					<div class="sep"></div>
					<button id="btn_sign" type="submit" class="ok">Submit</button> <a class="button btn_signup" href="<?php echo base_url();?>admin" >Login</a>  <a class="button" href="<?php echo base_url();?>admin/forgot-password">Forgotten password?</a>
				</form>
			</div>
			
			<div class="footer">Powered By <a href="http://www.owebso.com">Owebso</a></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_sign').click(function(){
			$('#msg_e').empty();
			if($('#pass').val()==""||$('#cpass').val()==""||$('#pass').val()!=$('#cpass').val()){
				$('#msg_e').append($('<p class="sign_up_error">Password Mismatch</p>').fadeIn('slow'));
				return false;
			}
			
		});
		
	});
	
</script>
             <?php   
             
				 if($this->session->flashdata('success')||$this->session->flashdata('error')){?>
				 	  <script type="text/javascript">
				 	        setTimeout(function(){
				 	        	$('#msg_e').children().fadeOut('slow');
				 	        	
				 	        },6000);
				 	  
				 	  </script>
				 	
				<?php   }if($this->session->flashdata('success')){?>
					      <script type="text/javascript">
				 	        setTimeout(function(){
				 	        	window.location.href=config.base+"admin/?refresh=true";
				 	        	
				 	        },6100);
				 	  
				 	  </script>
					
				<?php  }
				 
			 ?>
</body>
</html>
