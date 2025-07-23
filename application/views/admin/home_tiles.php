     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home Tiles
                            <small>List All</small> 
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            
                            <li class="active">
                                <i class="fa fa-file"></i> Home Tiles
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
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Home Tiles</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																      <select data-action="<?php echo base_url('admin/posts/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																    
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Title</th>
			                                        <th>Order</th>
			                                        <th>Image</th>
			                                        <th>Content</th>
			                                        <th>Redirect URL</th>
			                                        <th>Status</th>
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
															    	<article><div class="tble_name_edt"><?php echo $row['name']; ?></div></article>
															    	
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/<?php echo $active;?>/tiles/edit" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/posts/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
						                                        <td><article><div class="tble_number"><?php echo $row['meta_mode']; ?></div></article></td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_category_edt">
						                                        			
						                                        			<?php
						                                                         if($row['mode']=="bodhitreebooks_builder")
																				 {
																				 	  if(isset($row['m_file'])&&!empty($row['m_file'])){  ?>
																			    		  <img class="tble_thumb_img" height="50px" width="50px;" src="<?php echo base_url().$row['m_file'];?>">
																			    <?php }else{ 
																						?>
																					      <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																								  
																			    <?php }  
																				
																				 }else{ ?>
																					 
																					    <?php echo $row['meta_name']; ?>
									                                        	         
											                                        	<form style="display: inline-block;" id="sl_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/slider-settings/sliders/edit" method="post">
											                                        		
											                                        		<input type="hidden" name="id" value="<?php echo $row['meta_id'];?>" />
											                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
											                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('sl_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit"></i></a>
											                                        	</form>
																								 
																								 
																				 <?php }
									                                                  ?>
						                                        	        
						                                        	
						                                        	    </div>
						                                        	</article>
						                                        </td>
						                                        <td><article><div class="tble_content_edtd"><?php echo $row['content']; ?></div></article></td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_category_edt">
						                                        			<?php
						                                                        if($row['mode']=="magazine_builder")
																				{
																					if(isset($category)){
																						 foreach ($category as  $cvalue) {
																							if($cvalue['id']==$row['meta_content']){ ?>
																								
																								<a href="<?php echo base_url('admin/'.$active.'/category');?>">Category <i class="fa fa-chevron-right"></i></a> <?php echo $cvalue['name']; ?>
																								
																				   <?php    }
																						  }
																					}
																					
																				}else{
																					 echo $row['meta_content']; 
																				}
						                                                    ?>
						                                                </div>
						                                           </article>
						                                        </td>
						                                        <td class="status-indication" >
															    	 <form id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url();?>admin/<?php echo $active;?>/tiles/status">
																    	   <?php if(isset($row['status'])&&$row['status']=="0"){ ?>  
																    	     
																    	           <span><i class="fa fa-check-circle-o"></i>Active</span>
																    	    
																    	           <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
																    	           <input type="hidden" name="status" value="1" />
						                                        		           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
																    	     <a class="edit_disabled" href="#" onclick="_do_edit_action('status_change_<?php echo $row['id'];?>')">Deactivate</a>
																    	   <?php }else{ ?>  
																    	  	        <span class="inactive_spnn"><i class="fa fa-times-circle-o"></i>Inactive</span>
																    	    
																    	           <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
																    	           <input type="hidden" name="status" value="0" />
						                                        		           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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
																      <select data-action="<?php echo base_url('admin/posts/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
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
    