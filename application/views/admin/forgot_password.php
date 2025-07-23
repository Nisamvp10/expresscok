<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Inspire - Admin | Forgot Password</title>
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
				<div id="msg_e"><?php 
				if(validation_errors()!=false){?>
				 	      
				 	      <div class="n_error"><?php echo validation_errors(); ?></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="validation_error"){?>
				 	      
				 	      <div class="n_error"><p>Please fill out all the field correctly!.</p></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="db_error"){?>
				 	      
				 	      <div class="n_error"><p>The Email adress(Username) You have submitted is not exist.</p></div>
				<?php   }elseif($this->session->flashdata('error')&&$this->session->flashdata('error')=="mail_error"){?>
				 	      
				 	      <div class="n_error"><p>Couldn't send mail to <b><?php echo ($this->session->flashdata('email'))?$this->session->flashdata('email'):"**************" ;?></b>.,Please try again.</p></div>
				<?php   }elseif($this->session->flashdata('ferror')&&$this->session->flashdata('ferror')!=""){?>
				 	      
				 	      <div class="n_error"><p><?php echo $this->session->flashdata('ferror');  ?></p></div>
				<?php   }if($this->session->flashdata('success')&&$this->session->flashdata('success')=="success"){?>
				 	      <div class="n_ok"><p>Your password reset link has been sent to your email(<b><?php echo $this->session->flashdata('email');?></b>), Please check the Mail. </p></div>
				 <?php  }
				  ?></div>
				<form action="<?php echo base_url();?>admin/check-user" method="post">
					<label for="username">Enter your email address:</label>
					<input id="username" name="username" type="email" class="text" placeholder="Username" required />
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
					<div class="sep"></div>
					<button type="submit" class="ok">Submit</button><a class="button btn_signup" href="<?php echo base_url();?>admin" >Login here</a>
				</form>
			</div>
			<div class="footer">&raquo; <a href="">http://www.archifexarchitech.com</a> | Admin Panel</div>
			
		</div>
	</div>
</div>
 <?php   
             
				 if($this->session->flashdata('success')||$this->session->flashdata('error')){?>
				 	  <script type="text/javascript">
				 	        setTimeout(function(){
				 	        	$('#msg_e').children().fadeOut('slow');
				 	        	
				 	        },10000);
				 	  
				 	  </script>
				 	
				<?php   } 
				 
			 ?>

</body>
</html>
