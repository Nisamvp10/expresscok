     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo (isset($mode))?$mode:"";  ?>
                            <small>Add New blog Category</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                            	<?php $f=$this->uri->uri_string(); ?>
                                <i class="fa fa-book"></i> <a href="<?php echo base_url(dirname($f));?>/products"><?php echo (isset($mode))?$mode:"";?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blog Category
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
                <div class="row">
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/blog-category/save">
	                    <div class="col-lg-5">
	
	                            <div class="form-group">
	                                <label>Blog Category Name</label>
	                                <input type="text" class="form-control" name="name">
	                                <input type="hidden" value="<?php echo $f;?>" class="form-control" name="rurl">
	                                <input type="hidden" value="<?php echo strtolower(isset($mode)?$mode:"");?>" class="form-control" name="mode">
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                                <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            <?php echo  $this->session->flashdata('details'); ?>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> 
			                            	<?php echo $this->session->flashdata('file_error');?>
			                            	<?php echo $this->session->flashdata('error');?>
			                            </div>
			                            
			                        <?php }else{ ?>
			                        	
			                        	<p class="help-block">This field is mandatory.</p>
			                        	
			                        <?php  }   ?>  
	                            </div>
	                            <?php if(isset($mode)&&(strtolower($mode)=="blog_category")){ ?>
	                            			<div class="form-group">
										         <label class="landline fibl">Select Slider</label>
										         <select id="category" class="form-control"  name="meta_id">
										                                	     <?php if(isset($slider_result)){
																							foreach($slider_result as $key => $row){ 
																								?>
																								
																								<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
																								
																								
																				 <?php  }   }  ?>				
																								
										         </select>	                      
										    </div>
	                            <?php } 
								 ?>
	                            
						
	
	                    </div>
	                    <div class="col-lg-4">
	                            <div class="form-group">
	                                <label>Image File</label>
	                                <input type="file" class="img_tag" name="file" accept="image/*" />
	                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
	                            </div>
	                            
	                            
	
	                            
	                            <button type="submit" class="btn btn-default spin-waiter">Save Blog Category</button>
	                            <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
	                            <button type="reset" class="btn btn-default">Reset Value</button>
	
	                    </div>
	                    <div class="col-lg-3">
	                            <div class="lib_image_holder">
	                                
	                                
	                                
	                            </div>
	                   </div>
                    </form>
                </div>
                <div class="row gallery_list">
                   
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Blog Categories</h3>
                                
                                	
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
			                                        <th>Blog Category Name</th>
			                                        <th>Image</th>
			                                        <?php  if(isset($mode)&&(strtolower($mode)=="blog_category")){ ?>
			                                         	
			                                         	<th>Slider</th>
			                                         	
			                                        <?php  } ?>
			                                        <!-- <th>Subcategories</th> -->
			                                        <th>Action</th>
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
															  	</td>
															    <td>
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	
															    </td>
															    <td>
															    	<article><div class="tble_file">
															    		<?php if(isset($row['file'])&&$row['file']!=""){  ?>
															    		  <img class="tble_thumb_img" height="50px" width="50px;" src="<?php echo base_url().$row['m_file'];?>">
															    		<?php }else{ 
																		?>
																	      <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																				  
																	    <?php }  ?>
															    	</div></article>
															    	
															    	
															    </td>
															   <?php if(isset($mode)&&(strtolower($mode)=="watches")){ ?>
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
									                                        </td>
			                                         	 
			                                         	
			                                                    <?php  } ?>
						                                        <!-- <td>
						                                        	<article>
						                                        		<div class="tble_subcategory">
						                                        			
						                                        	        <div>
						                                        	        	<a href="<?php echo base_url('admin/watches/category/sub-category/'.$row['id']);?>"><i class="fa fa-angle-double-right"></i> Manage Subcategory</a>
						                                        	        </div>	
						                                                </div>
						                                           </article>
						                                        </td> -->
						                                        
						                                        <td style="position:relative;">
						                                          <article>
						                                        	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url('admin/category/edit');?>" method="post">
						                                        		<input type="hidden" value="<?php echo $f;?>" class="form-control" name="rurl">
	                                                                    <input type="hidden" value="<?php echo strtolower(isset($mode)?$mode:"");?>" class="form-control" name="mode">
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	 <a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/posts/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <a id="gggggg"  class="seo_de_a"  href="<?php echo base_url("admin/global-seo-settings/posts/".strtolower(isset($mode)?$mode:"")."/category/".$row['id']);?>"><i class="fa fa-wrench list_delete_s"></i>Settings</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
						                                        	
						                                        	
						                                        	
						                                        	
						                                           </article>
						                                        </td>
															    <td class="status-indication">
															    	<article>
															    		<form id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url();?>admin/bodhitreebooks/category/status">
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
															    		
															    	</article>
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
            

        </div>
       
        
    </div>
     
