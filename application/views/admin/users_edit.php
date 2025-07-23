     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Edit User</small>
                        </h1>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-wrench"></i>  <a href="<?php echo base_url();?>admin/settings/profile">Settings</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i> <a href="<?php echo base_url();?>admin/settings/users">Users</a>
                            </li>
                              <li class="active">
                                <i class="fa fa-file"></i> Edit
                            </li>
                           
	                                    <?php if($this->session->flashdata('success')!=FALSE&&$this->session->flashdata('success')==TRUE){  ?>
				                                  <li id="success_message">
						                             <span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>      
						                          </li>
				                        <?php }elseif($this->session->flashdata('error')){ ?>
				                        	      
				                        	      <li id="error_message">
						                             <span class="error-message-s"><i class="fa fa-close"></i>Couldn't save,Try again!</span>      
						                          </li>
											
				                        <?php  } ?>  
	                        
                        </ol>
                    </div>
                </div>
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/settings/user/edit">
			                <div class="row">
			                	<div class="col-lg-8">
			                		<div class="row">
						                    <div class="col-lg-6">
						
						                        <?php $form_value=($this->session->flashdata('validation')&&$this->session->flashdata('value'))?$this->session->flashdata('value'):"";  ?>
						
						                            <div class="form-group">
						                                <label>Name</label>
						                                <input id="name" value="<?php echo (isset($result))?$result[0]['name']:"";?>" class="form-control"  name="name">
						                                <input class="form-control" type="hidden" value="<?php echo isset($result[0]['id'])?$result[0]['id']:"0";  ?>" name="id">
						                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                
						                            </div>
						
						                            
						
						                           
						
						                        
						
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Email Id(Username)</label>
						                                <input id="email" value="<?php echo (isset($result))?$result[0]['email']:"";?>" class="form-control"  name="email">
						                            </div>
						                            
						
						                    </div>
						            </div>
						            <div class="row">
						                     <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Password</label>
						                                <input id="pass" type="password" value="" class="form-control"  name="password">
						                            </div>
						                            
						
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Confirm Password</label>
						                                <input id="cpass" type="password" value="" class="form-control"  name="confirmpassword">
						                            </div>
						                            
						
						                    </div>
						                            
								                    
						                   
						                    
						            </div>
						            <div id="pass_strength_div" class="row">
						            	
						            	          <div class="col-lg-1 hiddenn">
						            	          	<span class="pass_indicator weak"></span>
						            	          	<span class="pass_indicator_label">weak</span>
						            	          </div>
						            	          <div class="col-lg-1 hiddenn">
						            	          	<span class="pass_indicator good"></span>
						            	          	<span class="pass_indicator_label">good</span>
						            	          </div>
						            	          <div class="col-lg-1 hiddenn">
						            	          	<span class="pass_indicator strong"></span>
						            	          	<span class="pass_indicator_label">strong</span>
						            	          </div>
						            	
						            	           
						            	
						            	
						            	
						            </div>  
						            <div class="row">
						            	           <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
							                            <!--<p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>-->
							                         
							                            	<?php echo  $this->session->flashdata('validation'); ?>
							                            
							                         
							                        <?php }else{ ?>
							                        	
							                        	<p class="help-block"></p>
							                        	
							                        <?php  }   ?>  
						            </div>	        
				             </div>       
				             <div class="col-lg-4">
				                          
				  
				             </div>
			                   
			             </div>
	                <button type="submit" id="save_user" data-config="save" class="btn btn-default">Save Details</button>
	                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
		            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
		            
               </form>
                
                	
                	
                	
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   