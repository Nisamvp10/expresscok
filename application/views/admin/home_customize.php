     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            <?php if(isset($header_t)&&$header_t!=""){echo $header_t;}else{ echo "Testimonials";} ?>
                            <small>Add Testimonial</small> 
                            
                        </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i> <?php echo ucwords(str_replace("-"," ",$active));?>
                            </li>
                           
                            <li class="active">
                                <i class="fa fa-file"></i> Add Testimonials
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
	                       <li id="n_message">
			                              
			               </li>
                        </ol>
                    </div>
                </div>
                <form role="form" enctype="multipart/form-data" method="post" action="#">
			                
			                		<div class="row">
						                   <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Name</label>
						                                <input id="name" class="form-control"  name="name">
						                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                
						                            </div>
						                            <div style="display: none;" class="form-group">
							                                <label>Redirect Url</label>
							                                <input id="url" class="form-control"  name="url">
							                        </div> 
						                            
						                            
						
						                    </div>
						                    <div style="display: none;" class="col-lg-6">
						                    	   <div class="form-group">
							                                <label>Description</label>
							                                <textarea id="description" rows="5" class="form-control"  name="description" ></textarea>
							                                
							                        </div>     
						                    </div>
						                    
						            </div>
						            <div  class="row">
						            	<div class="panel panel-default">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Description</h3>
					                            </div>
					                            <div class="panel-body">
					                            	
						                            	 <div style="display: none;" class="row">
											            	    <div class="col-lg-3">
											            	    	   <div class="form-group">
											                                <label>Image/Flash</label>
											                                <input id="file" class="img_tag" type="file" name="file" accept=".swf,image/*"  >
											                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
											                            </div>
											            	    	  
											            	    	
											            	    </div>
											            	    <div class="col-lg-3">
											                            <div class="lib_image_holder">
											                            	
											                            </div>
											                    </div>	
											                    <div class="col-lg-6">
											                            <div class="form-group">
											                                <label>Choose Slider</label>
											                                <select name="slider" id="slider" class="form-control">
											                                	<option value="">-Choose One--</option>
											                                	<?php if(isset($slider_result)){
																					foreach($slider_result as $row){ ?>
																						
																						
																						<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
																						
																						
																				<?php  }
											                                	} 
																				 ?>
											                                </select>
											                            </div>   
											                    </div>
											            </div>
											            <div class="row">
											                    <div class="col-lg-12">
											
											                            <div class="form-group">
											                                <label>Content</label>
											                                <textarea name="content" id="post_description" class="form-control" rows="20"></textarea>
											                            </div>
											                    <div class="error-div"></div> 
											                    <div class="succ-div"></div> 
											                    </div>
											                    
											            </div>  
						                            	
					                            	
					                            	
					                            	
					                            	
								                </div>
								                
					                    </div>
						            	
						            	
								                    
				              </div>
	                <button type="submit" id="save_home_custome" data-url="<?php echo base_url("admin/".$active."/customisation")?>" data-config="save" class="btn btn-default">Save Details</button>
	                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
		            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
		            
               </form>
               <div class="row gallery_list">
               </div>
               <div class="row">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Testimonials</h3>
                                
                                	
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
			                                        <th>Name</th>
			                                        <!--<th>Details</th>
			                                        <th>Redirect URL</th>
			                                        <th>Image/Flash</th>
			                                        <th>Slider</th> -->
			                                        <th>Content</th>
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
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url("admin/".$active."/customize-home/edit");?>" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/posts/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
						                                        <!-- <td><article><div class="tble_number"><?php echo $row['meta_content']; ?></div></article></td>
						                                        <td><article><div class="tble_url"><?php echo $row['meta_file']; ?></div></article></td>
						                                        <td>
															    	<article><div class="tble_file">
															    		<?php if(isset($row['m_file'])&&$row['m_file']!=""){
															    			       $path_parts = pathinfo(base_url($row['m_file']));
		  		                                                                   if($path_parts['extension']=="swf"){ ?>
		  		                                                                   	<a><object width="100%" height="auto" data="<?php echo base_url($row['m_file']); ?>"></object></a>
																			<?php  }else{
																			  ?>
															    		            <img class="tble_thumb_img" height="50px" width="50px;" src="<?php echo base_url().$row['m_file'];?>">
															    		<?php   
																		     
																				   }
																		      }else{ 
																		?>
																	                   <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																				  
																	    <?php }  ?>
															    	</div></article>
															    	
															    	
															    </td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_category">
						                                        	        <?php if(isset($slider_result)){
																					foreach($slider_result as $row2){
																						  if($row['meta_id']==$row2['id']){
																						 ?>
																						          
																						           <?php echo $row2['name']; ?>
						                                        	       
														                                        	<form style="display: inline-block;" id="sl_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/slider-settings/sliders/edit" method="post">
														                                        		
														                                        		<input type="hidden" name="id" value="<?php echo $row['meta_id'];?>" />
														                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
														                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('sl_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit"></i></a>
														                                        	</form>
																						
																						
																						
																						
																				<?php      }
																				
																					  }
											                                	} 
																				 ?>
						                                        	    </div>
						                                        	</article>
						                                        </td> -->
						                                        <td><article><div class="tble_content_ed_2"><?php echo $row['content']; ?></div></article></td>
						                                        <td class="status-indication" >
															    	 <form id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url("admin/".$active."/customize-home/status");?>">
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
                	
                <!--***********************************************************************************Modal Start Here***********************************************************-->
                       <div id="myModal" class="modal fade modal-wide">
						  <div class="modal-dialog">
						    <div class="modal-content"><div  id="overlayy"></div>
						      <div class="modal-header">
						        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title modal-title-in">Media Library</h4>
						        <div class="pagination-parent-small pagination-aling-right"><?php echo isset($lib_links)?$lib_links:"";?></div>
						      </div>
						      <div class="modal-body">
						           
						           <div  class="row pagination_spin_parent">
						           	
						           	
						           		
						           		
						           		<?php if(isset($result_lib)){
						           			
											foreach($result_lib as $row_f){ 
												
												  $path_parts = pathinfo(base_url($row_f['file']));
												
		  		                                   if(isset($path_parts['extension'])&&$path_parts['extension']=="swf"){?>
		  		                                   	
		  		                                   	      <div  class="col-lg-2 library_ind_s">
														  	   
														  	   <a><object width="100%" height="auto" data="<?php echo base_url($row_f['file']); ?>"></object></a>
														  	
														  	   <input type="checkbox" value="<?php echo $row_f['id'];?>" data-img="<?php echo base_url($row_f['file']);?>" class="lib_insert_img" />
														  	   <span style="display: none;" class="edit_l_image" data-id="<?php echo $row_f['id'];?>" title="Edit Image"><i class="fa fa-pencil"></i></span>   
														  </div>
		  		                                   	    
		  		                                   	
		  		                                   	
		  		                             <?php }elseif(isset($path_parts['extension'])){  ?>	
												
														  <div class="col-lg-2 library_ind_s center-cropped" style="background-image: url('<?php echo base_url($row_f['file']);?>');">
														  	   <input type="checkbox" value="<?php echo $row_f['id'];?>" data-img="<?php echo base_url($row_f['file']);?>" class="lib_insert_img" />
														  	   <span style="display: none;" class="edit_l_image" data-id="<?php echo $row_f['id'];?>" title="Edit Image"><i class="fa fa-pencil"></i></span>  
														  	   
														  </div>
												  
												  
									 <?php        }
											}
											
						           			
						           		} 
										
										
										 ?>
						           		
						           	
						           	 <div class="lib-pagination-spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
						           	
						           </div>	
						       
						       
						       
						      </div>
						      <div class="modal-footer">
						      	<div class="pagination-parent-small pagination-aling-left"><?php echo isset($lib_links)?$lib_links:"";?></div>
						        <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary media_insert">Insert</button>
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						
						
             <!--***********************************************************************************Modal End***********************************************************--> 		
                	
                	<!--***********************************************************************************Media Meta Modal Start Here***********************************************************-->
                       <div id="mediametaModal" class="modal fade modal-wide">
                       	 
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close modal-close-btnn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title modal-title-in">Edit Media Library</h4>
						        <div class="modal-title-in l_d_p"><a data-id="0" class="click_to_de_li" href="#"><i class="fa fa-trash-o"></i>Delete</a></div>
						      </div>
						      <div class="modal-body whole_b_rel">
						           
						           <div style="padding:0px 8px;"  class="row">
						           	      <div id="media_li_ed_img_hldr"  class="col-lg-3 center-cropped-g">
											   			  	   
													 
										  </div>
						           	      <div  class="col-lg-9">
											    <div class="form-group">
					                                <label>Image Name</label>
					                                <input class="form-control" name="name" id="img_name">
					                                <input type="hidden" name="id" id="filee_id" >
					                                <input type="hidden" name="e_file" id="ex_m_file" > 
					                            </div>
					                            <div class="form-group">
					                                <label>Alt Tag</label>
					                                <input class="form-control" name="meta_content" id="alt_tag">
					                                  
					                            </div>
					                            <div class="form-group">
					                                <label>Image Url Segment</label>
					                                <input class="form-control" name="content" id="img_url_segment">
					                                
					                            </div>
					                           				   	   
												 
										  </div>
										  
						           </div>	
						           
						       
						       <span id="media_meta_content_insert_spinner_center" style="position: absolute;display: none;top: 50%;left: 50%;"><img  src="<?php echo base_url('resource/backend/css/spinner_2.gif');?>" /></span>
                               
						       
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default modal-close-btnn" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary media_meta_content_insert">Save Changes</button>
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						
						
             <!--***********************************************************************************Media Meta Modal Start***********************************************************--> 		
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/nicEdit.js"></script>
    
    <script type="text/javascript"> 
       new nicEditor({
			fullPanel : true
		}).panelInstance('post_description');
        
        
    </script>