     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            products
                            <small>Edit Product</small>
                            <!-- <a class="inner-settings" href="<?php echo base_url('admin/magazine/articles/settings')?>"><i class="fa fa-wrench"></i>Settings</a> -->
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-file"></i>  <a href="<?php echo base_url();?>admin/products/products">Products</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-o"></i> Edit
                            </li>
                            <?php if($this->session->flashdata('success')!=FALSE&&$this->session->flashdata('success')==TRUE){  ?>
	                                  <li id="success_message">
			                             <span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>      
			                          </li>
	                        <?php }elseif($this->session->flashdata('error')){ ?>
	                        	      
	                        	      <li id="error_message">
			                             <span class="error-message-s"><i class="fa fa-close"></i>Couldn't save,Try again!</span>      
			                          </li>
								
	                       <?php  }elseif($this->session->flashdata('display_error')){ ?>
	                        	      
	                        	      <li id="error_message">
			                             <span class="error-message-s"><i class="fa fa-close"></i>Sorry, The display exceeds the limit of 4 products.</span>      
			                          </li>
								
	                       <?php  } ?> 
                           
                           <li id="n_message">
			                              
			               </li>
	                                  	                        
                        </ol>
                    </div>
                </div>
                <form role="form" enctype="multipart/form-data" method="post" id="custom_fom" action="<?php echo base_url("admin/".$active."/".$actived."/save");?>">
			                <div class="row">
			                	<?php date_default_timezone_set('Asia/Kolkata');
								$date = date('m/d/Y h:i:s a', time()); ?>
								<input class="form-control"  name="date" type="hidden" value="<?php echo $date; ?>">
			                	<div class="col-lg-12">
			                		
			                		<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Order Name</label>
												<input id="name" value="<?php if(isset($result_id[0]['name']))echo $result_id[0]['name'];?>" class="form-control"  name="name">
												
												
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Track URL</label>
												<input  class="form-control"  name="track_url" value="<?php if(isset($result_id[0]['track_url']))echo $result_id[0]['track_url'];?>">
												
											</div>
										</div>
									   
						            </div>
									<div class="row">
			                			    <div class="col-lg-6">
												<div class="form-group">
													<label>Sender name</label>
													<input  class="form-control" value="<?php if(isset($result_id[0]['sender']))echo $result_id[0]['sender'];?>"  name="sender">
													
												</div>
											</div>
						                    <div class="col-lg-6">
												<div class="form-group">
													<label>Sender Address</label>
													<input  class="form-control" value="<?php if(isset($result_id[0]['address_sender']))echo $result_id[0]['sender'];?>"  name="address_sender">
													
												</div>
											</div>
										   
						            </div>
									<div class="row">
			                			    <div class="col-lg-6">
												<div class="form-group">
													<label>Receiver name</label>
													<input  class="form-control" value="<?php if(isset($result_id[0]['receiver']))echo $result_id[0]['receiver'];?>"  name="receiver">
													
												</div>
											</div>
						                    <div class="col-lg-6">
												<div class="form-group">
													<label>Receiver Address</label>
													<input  class="form-control" value="<?php if(isset($result_id[0]['address_receiver']))echo $result_id[0]['address_receiver'];?>"  name="address_receiver">
													
												</div>
											</div>
										   
						            </div>
						            <!--div class="row">
							               
										<div class="col-lg-6">
											 <?php $model= $result_id[0]['location_status']; ?>
											<div class="form-group">
												<label>Location Status</label>
												<select class="form-control"  name="location_status">
													<option value="0" <?php if($model==0) { ?> selected <?php } ?> >--Select--</option>
													<option value="1" <?php if($model==1) { ?> selected <?php } ?> >Sender Location</option>
													<option value="2" <?php if($model==2) { ?> selected <?php } ?>  >Send from sender location</option>
													<option value="3" <?php if($model==3) { ?> selected <?php } ?> >Despach locaton</option>
													<option value="4" <?php if($model==4) { ?> selected <?php } ?>  >Delivered</option>
													
												</select>	
											</div>
										</div>  
										<div class="col-lg-6">
												<div class="form-group">
													<label>Location</label>
													<input  class="form-control" value="<?php if(isset($result_id[0]['address_receiver']))echo $result_id[0]['address_receiver'];?>"  name="address_receiver">
													
												</div>
										</div>
							        </div-->
									
										
								</div>	
									
										 
							</div>		
									  
							       
								    
							     
						          
						           
						     
						          
			           
			             <div class="row">
			             	  <div class="col-lg-6 hehe">
			             	  	
			             	  	    <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            <?php echo  $this->session->flashdata('details'); ?>
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> 
			                            	<?php echo $this->session->flashdata('file_error');?>
			                            	<?php echo $this->session->flashdata('error');?>
			                            </div>
			                            
			                        <?php }else{ ?>
			                        	
			                        <?php  }   ?>  
			             	    
			             	  </div>
			            </div>
			            <div class="row">
					        <div class="form-group">    
				                <button type="submit" id="save_custom_values" data-url="<?php echo base_url("admin/".$active."/".$actived."/save");?>" data-id="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:"";?>"  data-config="edit" class="btn btn-default">Save Details</button>
				                <!-- <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span> -->
				                <div class="facebookG">
										<div id="blockG_1" class="facebook_blockG">
										</div>
										<div id="blockG_2" class="facebook_blockG">
										</div>
										<div id="blockG_3" class="facebook_blockG">
										</div>
								</div>
					            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
				            </div>
				       </div>     
               </form>
                <div class="row gallery_list">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Articles</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label><input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																    <select data-action="<?php echo base_url('admin/bulk-action/'.str_replace('-',"_",$active));?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																    
																   <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
								 <div style="height: 56px;" class="checkbox-large">
								 	                              <div class="list-header-filter">
																    	<div class="facebookG">
																				<div id="blockG_1" class="facebook_blockG">
																				</div>
																				<div id="blockG_2" class="facebook_blockG">
																				</div>
																				<div id="blockG_3" class="facebook_blockG">
																				</div>
																		</div>
																    	<span>Filter by Category</span> 
																    	<select data-action="<?php echo base_url ('admin/'.$active.'/products'); ?>" class="form-control category_filter_select" >
																    		<option value="default">--Choose Category--</option>
																      	    <option value="default">All</option>
																      	       <?php if(isset($category)){ foreach ($category as $key => $value) {  ?>
																      	       	
													                                <option <?php if(isset($f_c)&&$f_c==$value['id'])echo "selected";?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
													                          
													                          <?php } } ?>
													                       </select>
													               </div>  
								 	                              <div class="list-header-filter" style="margin-right: 2px;width: 31%;">
																    	<div class="facebookG">
																				<div id="blockG_1" class="facebook_blockG">
																				</div>
																				<div id="blockG_2" class="facebook_blockG">
																				</div>
																				<div id="blockG_3" class="facebook_blockG">
																				</div>
																		</div>
																    	<span>Filter by Code</span> 
																    	<input type="text" placeholder="Product Code" class="form-control flter_re_by_code" value="<?php if(isset($p_code)&&!empty($p_code))echo $p_code;?>" />
																    	<button data-search="code" data-action="<?php echo base_url ('admin/'.$active.'/products'); ?>" type="button" class="btn btn-primary flter_re_by_code_btn"><span class="glyphicon glyphicon-search"></span></button>
													               </div> 
								 	                               <div class="list-header-filter" style="margin-right: 2px;width: 44%;">
																    	<div class="facebookG">
																				<div id="blockG_1" class="facebook_blockG">
																				</div>
																				<div id="blockG_2" class="facebook_blockG">
																				</div>
																				<div id="blockG_3" class="facebook_blockG">
																				</div>
																		</div>
																    	<span>Filter by Name</span> 
																    	<input style="width: 55%;" placeholder="Search by name" type="text" class="form-control flter_re_by_code" value="<?php if(isset($p_name)&&!empty($p_name))echo urldecode($p_name);?>" />
																    	<button data-search="name" data-action="<?php echo base_url ('admin/'.$active.'/products'); ?>" type="button" class="btn btn-primary flter_re_by_code_btn"><span class="glyphicon glyphicon-search"></span></button>
													               </div>
								 	
								         </div>	
										 <?php $reslbl=""; $reslval="";
								 
										      if(isset($f_c)&&!empty($f_c)){
										      	$reslbl="Results showing for Category "; $reslval=$cat_val;
										      }
											  if(isset($p_code)&&!empty($p_code)){
										      	$reslbl="Results showing for Product Code "; $reslval=$p_code;
										      }
											  if(isset($p_name)&&!empty($p_name)){
										      	$reslbl="Results showing for Product Name "; $reslval=$p_name;
										      }
										 
										  ?>
										  <?php if((isset($f_c)&&!empty($f_c))||(isset($p_code)&&!empty($p_code))||(isset($p_name)&&!empty($p_name))){ ?>
										  	
										  	<div class="checkbox-large">	
												 	<div class="srch_rslt_indctr"><?php echo $reslbl; ?> "<span><?php echo $reslval;?></span>"</div>
										    </div>	
										  	
										  <?php }  ?>		
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Order Id</th>
			                                        <th>Code</th>
			                                        <th>Sender</th>
													<th>Receiver</th>
			                                        <!--th>Location Status</th-->
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
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url("admin/".$active."/".$actived."/edit");?>" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/'.$active.'/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	<a id="hhhhhh"  class="settings_de_a"  href="<?php echo base_url("admin/products/products/order_details/".$row['id']);?>"><i class="fa fa-wrench list_delete_s"></i>Order Details</a>
															    	<br/>
															    	
															    </td>
															    <td><article><div class="tble_content_edtd">
						                                        	<span><?php echo '# '.$row['id']; ?></span>
						                                        	
						                                        </div></article>
						                                        </td>
						                                        <td><article><div class="tble_category_edt">
																	<span><?php echo $row['sender']; ?></span>
						                                        </div></article></td>
						                                        <td><article><div class="tble_category_edt">
						                                        	<span><?php echo $row['receiver']; ?></span>
						                                        </div></article></td>
																<!--
						                                        </*?php $location_id= $row['location_status'];
																if ($location_id==1){$status_location="Sender Location"; }
																if ($location_id==2){$status_location="Send from sender location"; }
																if ($location_id==3){$status_location="Despach locaton"; }
																if ($location_id==4){$status_location="Delivered"; }
						                                        ?>
						                                         <td><article><div class="tble_category_edt">
						                                        	<span><?php echo $status_location; ?></span>
						                                        </div></article></td>
						                                        */
						                                       -->
															    <td class="status-indication" >
															    	 <form class="display_show" id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url('admin/'.$active.'/'.$actived.'/status');?>">
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
																      <select data-action="<?php echo base_url('admin/bulk-action/'.str_replace('-',"_",$active));?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
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
										  <form>
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
										  </form>
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
             <!--****************************************************************Media Modal*****************************************************************-->
	                   <div id="mediaModal" class="modal fade modal-wide">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title modal-title-in"></h4>
						        
						      </div>
						      <div class="modal-body">
						           
						           
						       
						       
						       
						      </div>
						      <div class="modal-footer">
						      	
						        <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
						        
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
            <!--****************************************************************End of Media Modal*****************************************************************-->	   
                	
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script src="<?php echo resource();?>lib/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/nicEdit.js"></script>
    
    <script type="text/javascript"> 
       new nicEditor({
			fullPanel : true
		}).panelInstance('post_description');
        
        
    </script>
    
    
    <script type="text/javascript">
    
	$(document).ready(function(){
		
		    

			$('.youtube_video_f').on('click', function(e){
			   
				var queryString = $(this).attr('href').slice($(this).attr('href').indexOf('?') + 1);
				
				var queryStringArray = queryString.split("&");
				var queryVars = new Array();
				
				for(i = 0; i < queryStringArray.length; i++) {
				    queryVars[queryStringArray[i].split("=")[0]] = queryStringArray[i].split("=")[1];
				}
				
				if ( 'v' in queryVars )
				{
					e.preventDefault();
					var vidWidth = 560; 
					var vidHeight = 315;
					if ( $(this).attr('data-width') ) { vidWidth = parseInt($(this).attr('data-width')); }
					if ( $(this).attr('data-height') ) { vidHeight =  parseInt($(this).attr('data-height')); }
					var iFrameCode = '<iframe width="' + vidWidth + '" height="'+ vidHeight +'" scrolling="no" allowtransparency="true" allowfullscreen="true" src="http://www.youtube.com/embed/'+  queryVars['v'] +'?rel=0&wmode=transparent&showinfo=0" frameborder="0"></iframe>';
					$('#mediaModal .modal-body').html(iFrameCode);
					$('#mediaModal').on('show.bs.modal', function () {
						var modalBody = $(this).find('.modal-body');
						var modalDialog = $(this).find('.modal-dialog');
						var newModalWidth = vidWidth + parseInt(modalBody.css("padding-left")) + parseInt(modalBody.css("padding-right"));
						newModalWidth += parseInt(modalDialog.css("padding-left")) + parseInt(modalDialog.css("padding-right"));
						newModalWidth += 'px';
					    $(this).find('.modal-dialog').css('width', newModalWidth);
					});
					$('#mediaModal').modal();
				}
			});
			$('#mediaModal').on('hidden.bs.modal', function () {
				$('#mediaModal .modal-body').html('');
			});
	        $(document).on("keypress",'.bootstrap-tagsinput input[type="text"]',function(e) {if(e.keyCode == 13) {return false;}});
	}); 
	
     </script> 
    
    <script type="text/javascript">$(document).ready(function(){$('.nicEdit-main').html($('#sp_co').html());});</script>
    <script type="text/javascript">$(document).ready(function(){$('.remv_feat_img').show();});</script>