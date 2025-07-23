     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Add New User</small>
                        </h1>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-wrench"></i>  <a href="<?php echo base_url();?>admin/settings/profile">Settings</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Users
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
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/settings/user/save">
			                <div class="row">
			                	<div class="col-lg-8">
			                		<div class="row">
						                    <div class="col-lg-6">
						
						                        <?php $form_value=($this->session->flashdata('validation')&&$this->session->flashdata('value'))?$this->session->flashdata('value'):"";  ?>
						
						                            <div class="form-group">
						                                <label>Name</label>
						                                <input id="name" value="<?php echo (is_array($form_value))?$form_value['name']:"";?>" class="form-control"  name="name">
						                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                
						                            </div>
						
						                            
						
						                           
						
						                        
						
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Email Id(Username)</label>
						                                <input id="email" value="<?php echo (is_array($form_value))?$form_value['email']:"";?>" class="form-control"  name="email">
						                            </div>
						                            
						
						                    </div>
						            </div>
						            <div class="row">
						                     <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Password</label>
						                                <input id="pass" type="password" value="<?php echo (is_array($form_value))?$form_value['password']:"";?>" class="form-control"  name="password">
						                            </div>
						                            
						
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Confirm Password</label>
						                                <input id="cpass" type="password" value="<?php echo (is_array($form_value))?$form_value['confirmpassword']:"";?>" class="form-control"  name="confirmpassword">
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
                <div class="row gallery_list">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Users</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent" /> Bulk Action  </label>
																      <select data-action="<?php echo base_url('admin/settings/users/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="users" value="delete">Delete</option></select>
																   
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-user">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Name</th>
			                                        <th>Email ID</th>
			                                        <th>Role</th>
			                                        <th style="text-align: center;">Profile Image</th>
			                                        <th style="text-align: center;">Status</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    
			                                        
					                               <?php if(isset($result)&&!empty($result)){
					                		           
														foreach($result as $key => $row){ 
															    
															?>
															  <tr id="course_list_tr_<?php echo $row['id'];?>">
															  	<td class="bulk_chckbx_parent">
															  		   <div class="checkbox checkbox-primary">
													                        <input value="<?php echo $row['id'];?>"  type="checkbox" class="impt_ckbox_bulk bulk_action_chkbox_chiled" />
													                        <label></label>
													                    </div>
															  		
															  		<!--<input type="checkbox"  class="impt_ckbox_bulk bulk_action_chkbox_chiled" />-->
															  	</td>
															    <td style="position:relative;">
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/settings/users/edit" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/settings/users/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
						                                        <td><?php echo $row['email']; ?></td>
						                                        <td>User</td>
						                                        <td style="text-align: center;"><article><?php  echo (isset($row['file'])&&$row['file']!="")?'<img src="'.base_url().$row['file'].'" style="max-width:50px;" />':'';; ?></td>
															    <td class="status-indication" >
															    	 <form id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url();?>admin/settings/users/status">
																    	   <?php if(isset($row['status'])&&$row['status']=="0"){ ?>  
																    	     
																    	     <span><i class="fa fa-check-circle-o"></i>Active</span>
																    	    
																    	           <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
																    	           <input type="hidden" name="status" value="1" />
						                                        		           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																    	     <a class="edit_disabled" href="#" onclick="_do_edit_action('status_change_<?php echo $row['id'];?>')">Deactivate</a>
																    	   <?php }else{ ?>  
																    	  	        <span class="inactive_spnn"><i class="fa fa-times-circle-o"></i>Inactive</span>
																    	    
																    	           <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
																    	           <input type="hidden" name="status" value="0" />
						                                        		           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																    	     <a class="edit_disabled" href="#" onclick="_do_edit_action('status_change_<?php echo $row['id'];?>')">Activate</a>
																    	  	
																    	  <?php }  ?>
															    	  </form>
															    </td>
														      </tr>
															
														<?php  }
														
														
								                	}  ?>
			                                        
			                                    
			                                    
			                                </tbody>
			                            </table>
			                     </div>
			                     
                                 
                               
			                	 <div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
			                </div>
			                <div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action 
																      <select data-action="<?php echo base_url('admin/settings/users/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
																    </label>
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
					       </div>
			                
                    </div>
                </div>
                	
                	
                	
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   