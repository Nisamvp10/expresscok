     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Bodhi Tree Books - Packages
                            <small>Add/Manage Package</small>
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-th-list"></i> Package
                            </li>
                            <?php if(($this->session->flashdata('success')!=FALSE&&$this->session->flashdata('success')==TRUE)||($this->session->flashdata('msuccess')!=FALSE)){  ?>
	                                  <li id="success_message">
			                             <span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>      
			                          </li>
	                        <?php }elseif($this->session->flashdata('error')||$this->session->flashdata('merror')){ ?>
	                        	      
	                        	      <li id="error_message">
			                             <span class="error-message-s"><i class="fa fa-close"></i>Couldn't save,Try again!</span>      
			                          </li>
								
	                       <?php  } ?>  
                            <li id="n_message">
			                              
			               </li>
	                                  	                        
                        </ol>
                    </div>
                </div>
                <form role="form" enctype="multipart/form-data" method="post" id="custom_fom" action="<?php echo base_url("admin/".$active."/".$actived."/save");?>">
			                <div class="row">
			                	<div class="col-lg-12">
			                		<div class="row">
						                    <div class="col-lg-5">
						                            <div class="form-group">
						                                <label>Package Title</label>
						                                <input id="name" class="form-control"  name="name">
						                            </div>
						                    </div>
						                    <div class="col-lg-4">
							                             <div class="form-group">
							                                <label>Package Featured Image</label>
							                                <input id="file" class="img_tag" type="file" name="file" accept="image/*"  >
							                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
							                            </div>
							               </div>
							               <div class="col-lg-3">
											                            <div class="lib_image_holder">
											                            	
											                            </div>
										   </div>
						            </div>
						            
						            <div class="row">
						            	
							               <div class="col-lg-12">
							                            <div class="form-group">
							                                <label>Package Details</label>
							                                <textarea id="post_description" rows="7" class="form-control"  name="content" ></textarea>
							                                
							                            </div>
							               </div>
						                    
						            </div>
						            <div ng-app="bodhitree_dashboard_package" ng-controller="package_controller" class="row">
						            	   <div ng-show="show" ng-style="{opacity: show}"></div>
							               <div class="col-lg-12 cls_pckg_itms_grnd_prnt">
							               	    <div class="cls_pckg_itms_hdr">
							                   	  <h3 class="cls_pckg_itms_hdr_ttl">Select Books For Package</h3>
							                   	  <button  ng-click="packageDialog('lg')" type="button" class="btn btn-primary laod_book_btn"><i class="fa fa-book"></i>Choose Book</button>
							                    </div> 
							                    <div class="cls_pckg_itms_prnt">
							                   	  <div class="row pckge_ind_itms_hdr">
							                         <div class="col-md-1">Order#</div>
							                         <div class="col-md-3">Book Title</div>
							                         <div class="col-md-2">Author</div>
							                         <div class="col-md-2">Qty & Price</div>
							                         <div class="col-md-2">Package Price</div>
							                         <div class="col-md-2">Action</div>
							                   	  </div>
							                   	  <!----------------------- Item Start Here -------------------------->
							                   	  <div class="grid_t">
							                   	  	 
								                   	  
														 <div ng-repeat="s in s_results" class="row pckge_ind_itms">
																<div class="col-md-1 pckge_ind_sn">{{$index+1}}</div>
																<div class="col-md-3 tdtils">
																		<a class="tname" target="_blank" href="#">{{s.name}}</a><br />
																		<a class="tedit" target="_blank" href="<?php echo base_url();?>admin/bodhitreebooks/products/settings/{{s.id}}"><i class="fa fa-pencil-square-o"></i> Settings</a><br />
																</div>
																<div class="col-md-2">{{s.author}}</div>
																<div class="col-md-2">
																	 <input type="hidden"  name="p_id[]" value="{{s.id}}"  class="form-control"/>
																	 <input type="text" value="1" name="quantity[]"  class="form-control"/> X <i class="fa fa-inr"></i> {{s.price}}</div>
																<div class="col-md-2">
																	
																	<div class="input-group">
																		<span class="input-group-addon">
																				<span><i class="fa fa-inr"></i></span>
																		</span>
																		<input type="text"  class="form-control" name="p_price[]">
																	</div>
																	 
																</div>	 
																<div class="col-md-2">
																	<a ng-click="remove_item(s.id)" href="#"><span class="pckge_ind_itm_rmv"><i class="fa fa-times"></i> Remove</span></a>
																	<br /> <a target="_blank" href="<?php echo base_url();?>admin/bodhitreebooks/products/settings/{{s.id}}"><span class="pckge_ind_itm_detls"><i class="fa fa-asterisk"></i> View Details</span></a>
																</div>
														 </div>
														 
								                   	  
							                   	  </div>
							                   	  <span style="color: #D0D2D4;">Drag items to change order.</span>
							                   	 <!----------------------- Item End Here -------------------------->
							                    </div>              
							               </div>
							               
							               <!------------- nG MODAL ------------->
							                   <script type="text/ng-template" id="package_modal_template.html">
                                                        <div class="modal-header">
												            <h3 class="modal-title">Add Book to Package</h3>
												        </div>
												        <div class="modal-body">
												        	<div style="margin: 0;min-height: 358px;" class="row">
												        		
																			
																			<div ng-repeat="x in results | startFrom:currentPage*pageSize | limitTo:pageSize" class="col-lg-3 cls_in_boo_itms_on_pop">
																				<div class="cls_in_boo_itms_cont">
																					<div class="col-lg-4 cls_in_boo_itms_img"><img src="<?php  echo base_url();?>{{x.meta_m_meta_file}}" /></div>
																					<div class="col-lg-8 cls_in_boo_itms_text">{{x.name}}</div>
																					<div class="chk_bx_bk_hldr" ng-class="pac_book_slc_{{x.id}}">
																						<div class="checkbox checkbox-primary">
																							<input value="{{x.id}}" ng-true-value="{{x.id}}" ng-false-value="0"  ng-model="checkboxes[$index]" ng-change="alert($index,x.id)"  type="checkbox" class="impt_ckbox_bulk" />
																							<label></label>
																						</div>
																					</div>
																				</div>
																	        </div>
																			
																
															</div>
															                <button class="btn btn-primary" ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
																		       Previous
																		    </button>
																		    {{currentPage+1}}/{{numberOfPages()}}
																		    <button class="btn btn-primary" ng-disabled="currentPage >= results.length/pageSize - 1" ng-click="currentPage=currentPage+1">
																		        Next
																		    </button>
												        </div>
												        <div class="modal-footer">
												            <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
												            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
												        </div>
                                               </script>
							               <!------------- -------------->
						            </div> 
						            <div class="row">
			                	       <div class="col-lg-12">
			                		     <div class="row">
						                   <div class="col-lg-6">
												<div class="form-group">
													<label class="landline fibl">Suggested By</label>
													<select id="suggested" class="form-control"  name="suggested">
															<?php 	if(isset($author_list)){
																	foreach($author_list as $key => $row){ 
																		?>
																	<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
															<?php  }   }  ?>				
													</select>	
												</div>
											</div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Package Total Price</label>
						                                <input id="price" class="form-control"  name="price">
						                            </div>
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Shipping Charge</label>
						                                <input id="shipping_chrage" class="form-control"  name="shipping_charge">
						                            </div>
						                    </div>             
							                </div>
							              </div>
						            </div>
				             </div>       
			             </div>
			             <div class="row">
			             	  <div class="col-lg-6">
			             	  	
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
			             	      <div class="error-div"></div> 
								  <div class="succ-div"></div> 
			             	  </div>
			            </div>
				        <div class="form-group">    
			                <button type="submit" id="save_custom_values" data-url="<?php echo base_url("admin/".$active."/".$actived."/save");?>" data-config="save" class="btn btn-default">Save Details</button>
			                <div class="facebookG">
												<div id="blockG_1" class="facebook_blockG">
												</div>
												<div id="blockG_2" class="facebook_blockG">
												</div>
												<div id="blockG_3" class="facebook_blockG">
												</div>
											</div>
			                <!-- <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span> -->
				            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
			           </div>
               </form>
                <div class="row gallery_list">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Packages</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																      <select data-action="<?php echo base_url('admin/bulk-action/package');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																    
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Package Name</th>
			                                        <th>Books</th>
			                                        <th>Price</th>
			                                        <th>Shipping Charge</th>
			                                        <th>Sgtd. By</th>
			                                        <th>Image</th>
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
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/package/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	
															    	<div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
															    <td><article><div class="tble_content">--</div></article></td>
															    <td><article><div class="tble_content"><?php echo $row['price'];?></div></article></td>
															    <td><article><div class="tble_content"><?php echo $row['shipping_charge'];?></div></article></td>
						                                        <td><article><div class="tble_content"><?php echo $row['suggested']; ?></div></article></td>
						                                        <td><article><div class="tble_file"><?php  echo (isset($row['m_file'])&&$row['m_file']!="")?'<img src="'.base_url().$row['m_file'].'" width="64px"  />':'';; ?></div></article></td>
															    <td class="status-indication" >
															    	 <form class="display_show" id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url('admin/bodhitreebooks/package/status');?>">
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
																      <select data-action="<?php echo base_url('admin/bulk-action/package');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
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