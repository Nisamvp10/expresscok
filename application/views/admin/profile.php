     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Settings
                            <small>Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-book"></i> <a href="<?php echo base_url();?>admin/settings/profile">Settings</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Profile
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
                <div class="row">
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/settings/profile/save-changes">
	                    <div class="col-lg-9">
	                    	 <div class="panel panel-info">
			                            <div class="panel-heading">
			                                <h3 class="panel-title">Profile</h3>
			                            </div>
			                            <div class="panel-body">
			                            	<div class="row">
							                	
								                    <div class="col-lg-6">
										                            	<div class="form-group">
											                                <label>Name</label>
											                                <input class="form-control" value="<?php echo (isset($result[0]['name']))?$result[0]['name']:"";?>" name="name">
											                                <input type="hidden" name="id" value="<?php echo (isset($result[0]['id']))?$result[0]['id']:"";?>" class="form-control">
											                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
											                                
											                            </div>
										                            	
			                            	         </div>
			                            	         <div class="col-lg-6">
			                            	         	                <div class="form-group">
											                                <label>Email</label>
											                                <input class="form-control" value="<?php echo (isset($result[0]['email']))?$result[0]['email']:"";?>" name="email">
											                                
											                            </div>
			                            	         	    
			                            	         </div>
			                            	
			                            	  </div>
			                            	  
			                            	  <div class="row">
							                	
								                    <div class="col-lg-6">
										                            	<div class="form-group">
											                                <label>Password</label>
											                                <input id="pass" type="password" class="form-control" name="password">
											                                
											                            </div>
										                            	
			                            	         </div>
			                            	         <div class="col-lg-6">
			                            	         	                <div class="form-group">
											                                <label>Confirm Password</label>
											                                <input type="password" class="form-control" name="confirmpassword">
											                                
											                            </div>
			                            	         	    
			                            	         </div>
			                            	
			                                  </div>
			                                  <div class="row">
			                            	  	<p class="leave_pass"><i class="fa fa-info-circle"></i>Leave password field, if you dont want to change the current password.</p>
			                            	  </div>
			                                   <div id="pass_strength_div" class="row">
						            	         <div class="col-lg-6">
						            	         	<div class="row">
								            	          <div class="col-lg-2 hiddenn">
								            	          	<span class="pass_indicator weak"></span>
								            	          	<span class="pass_indicator_label">weak</span>
								            	          </div>
								            	          <div class="col-lg-2 hiddenn">
								            	          	<span class="pass_indicator good"></span>
								            	          	<span class="pass_indicator_label">good</span>
								            	          </div>
								            	          <div class="col-lg-2 hiddenn">
								            	          	<span class="pass_indicator strong"></span>
								            	          	<span class="pass_indicator_label">strong</span>
								            	          </div>
						            	             </div>
						            	          </div> 
						            	          <div class="col-lg-6">
						            	          </div>	
						            	
						            	
						                       </div>  
			                                  <div class="row">
							                	
								                    <div class="col-lg-12">
										                            	<div class="form-group">
											                               <button type="submit"  class="btn btn-default">Save Changes</button>
	                
		                                                                   
											                                
											                            </div>
										                            	
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
						                
			                    </div>
	                            
	
	                    </div>
	                 
	                    <div class="col-lg-3">
				                <div class="panel panel-info">
			                            <div class="panel-heading">
			                                <h3 class="panel-title">Image</h3>
			                            </div>
			                            <div class="panel-body profile_picture">
			                            	 <div class="row">
							                	
								                    <div class="col-lg-12">
								                    	<?php if(isset($result[0]['file'])&&$result[0]['file']!=""){ ?>
								                    		 <input type="hidden" name="e_file" value="<?php echo $result[0]['file'];?>" class="form-control">
										                     <img src="<?php echo base_url().$result[0]['file'];?>" alt="profile picture" />       
										                            	
										                <?php }else{  ?>        
										                	<input type="hidden" name="e_file" value="" class="form-control">
										                	<img src="<?php echo resource();?>backend/img/user_3.gif" alt="profile picture" />
										                <?php  }  ?>    	
			                            	         </div>
			                            	        
			                            	
			                                  </div>
			                                  <div class="row">
							                	
								                    <div class="col-lg-12">
								                    	
										                    <input type="file" class="form-control" name="file" />     	
										                     
										                            	
			                            	         </div>
			                            	        
			                            	
			                                  </div>
			                                       
			                            	
			                               
						                </div>
						                
			                    </div>
	                    </div>
                    </form>
                </div>
                
                	
                	
                	
          
                
            </div>
            

        </div>
       

    </div>