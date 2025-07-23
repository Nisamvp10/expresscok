<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ads Registration
                            <small>Register New Item</small>
                        </h1>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Register
                            </li>
                            <?php if($this->session->flashdata('success')||$this->session->flashdata('ssuccess')){  ?>
	                                  <li id="success_message">
			                             <span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>      
			                          </li>
	                        <?php }elseif($this->session->flashdata('error')||$this->session->flashdata('errors')||$this->session->flashdata('eerror')){ ?>
	                        	      
	                        	      <li id="error_message">
			                             <span class="error-message-s"><i class="fa fa-close"></i>Couldn't save,Try again!</span>      
			                          </li>
								
	                       <?php  } ?>  
                           
	                                  	                        
                        </ol>
                    </div>
                </div>
                <div class="row"> 
						                       
						                       <div>
                                                        
													  <!-- Nav tabs -->
													  <ul class="nav nav-tabs" role="tablist">
													    <li role="presentation" class="<?php if(!isset($tab_active))echo "active";?>"><a href="#custom_ads" aria-controls="custom_ads" role="tab" data-toggle="tab">Custom Ads</a></li>
													    <li role="presentation" class="<?php if(isset($tab_active)&&$tab_active=="?tab=1")echo "active";?>"><a href="#google_adsense" aria-controls="google_adsense" role="tab" data-toggle="tab">Google AdSense</a></li>
													  </ul>
													
													  <!-- Tab panes -->
													  <div class="tab-content">
													    <div role="tabpanel" class="tab-pane <?php if(!isset($tab_active))echo "active";?>" id="custom_ads">
															    	      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/ads/save');?>">
																	                
																	                	<div class="col-lg-8">
																	                		<div class="row">
																				                    <div class="col-lg-6">
																				
																				                           <div class="form-group">
																					                                <label class="landline fibl">Select Page</label>
																					                                <select  class="form-control f_s_b"  name="page">
																					                                	    <?php if(isset($pages)){
																						                                		$sel="";
																																foreach ($pages as $key => $value) {
																																	   if($key==0){
																																	   	$sel=$value['id'];
																																	   }
																																	
																																	 ?>
																																	<option value="<?php echo $value['id'];?>"><?php echo $value['content'];?></option>
																															<?php }
																																
																						                                	}  ?>		
																					                                </select>	
																					                                
																					                       </div>
																				
																				                        
																				
																				
																				                    </div>
																				                    <div class="col-lg-6">
																				                    	   <div class="form-group">
																					                                <label class="landline fibl">Select Ads Id</label>
																					                                <select class="form-control s_s_b"  name="ads_id">
																					                                	    <?php if(isset($ads_id)&&$sel!=""){
																																		 foreach ($ads_id as $key => $value) { 
																																			if($value['meta_id']==$sel){  
																																			?>
																																			   <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?> <?php echo (!empty($value['content'])&&!empty($value['meta_content']))?"(".$value['content']." X ".$value['meta_content'].")":"";?></option>
																																			  
																															 <?php           }
																																		  }
																																	
																							                                	   }  ?>		
																					                                </select>	
																					                                
																					                       </div>
																				                    	
																				
																				                    </div>
																				            </div>
																				            
																				            
																				                   
																				            <div class="row">        
																				                    <div class="col-lg-6">
																				
																				                          
																				                            <div class="form-group">
																				                                <label>Company/Customer Name</label>
																				                                <input id="name" class="form-control"  name="name">
																				                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																				                                
																				                            </div>
																				
																				
																				                    </div>
																				                     <div class="col-lg-6">
																				                    	  
																				                    	
																				                            <div class="form-group">
																					                                <label class="web fibl"><i class="fa fa-globe"></i>Redirect URL</label>
																					                                <input class="form-control"  name="url">
																					                                
																					                        </div>
																				                            
																				                            
																				
																				                    </div>
																				                    <div class="col-lg-6">
																				
																				                            <div class="form-group">
																				                            	<label>Activation Date</label>
																				                            	<div class='input-group date datetimepicker' >
																								                    <input type="text" id="activation" class="form-control"  name="activation">
																								                    <span class="input-group-addon">
																								                        <span class="glyphicon glyphicon-calendar"></span>
																								                    </span>
																								                </div>
																				                            </div>
																				
																				
																				                    </div>
																				                    <div class="col-lg-6">
																				                    	  
																				                    	  <div class="form-group">
																				                                <label>Expiration Date</label>
																				                                <div class='input-group date datetimepicker'>
																								                    <input id="expiration" class="form-control"  name="expiration">
																								                    <span class="input-group-addon">
																								                        <span class="glyphicon glyphicon-calendar"></span>
																								                    </span>
																								                </div>
																				                            </div>
																				
																				                    </div>
																				                    <div class="col-lg-12 location-holder-parent">
																				                    	  <label>Ads Target Location</label>
																				                    	  <div class="location-holder">
																				                    	          <div  class="row">
														            
																										                   <div class="col-lg-4">
																										                       
																										                      <?php if(isset($country)){
																																	
																																	foreach ($country as $ckey => $calue) { ?>
																																		
																																		<div class="row country-list-p list-p-h">	
																												                       	    <div class="col-lg-1">
																												                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
																																					<input name="country[]" value="<?php echo $calue['id'];?>" type="checkbox" class="impt_ckbox_bulk country_chkbx_ads">
																																					<label></label>
																																			   </div>
																																		    </div>
																												                       	   <div class="col-lg-9"><label style="margin-top: 3px;"><?php echo $calue['name'];?></label></div>
																												                       	  
																												                       	   <div style="padding-left: 2px;padding-right: 2px;" class="col-lg-1 country-list-hide loca_list_navi">
																												                       	   	 <i val="show_state_<?php echo $calue['id'];?>" class="fa fa-angle-double-right loc-arr-rig-to-ind loca_list_navi_clk"></i>
																												                       	   </div>
																												                       </div>	
																												                       
																														      <?php	}
																										                      	
																										                      	
																										                      } 
																															   ?>
																										                   </div>             
																										                   <div class="col-lg-4">
																										                   	   <?php if(isset($state)){
																																	
																																	foreach ($state as $skey => $salue) { ?>
																																		
																																		<div class="row state-list-p lists-p-h country-list-hide show_state_<?php echo $salue['country'];?>">	
																												                       	    <div class="col-lg-1">
																												                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
																																					<input name="state[]" value="<?php echo $salue['id'];?>" type="checkbox" class="impt_ckbox_bulk state_chkbx_ads">
																																					<label></label>
																																			   </div>
																																		    </div>
																												                       	   <div class="col-lg-9"><label style="margin-top: 3px;"><?php echo $salue['name'];?></label></div>
																												                       	   
																												                       	   <div style="padding-left: 2px;padding-right: 2px;" class="col-lg-1 country-list-hide loca_list_navis">
																												                       	   	 <i val="show_district_<?php echo $salue['id'];?>" class="fa fa-angle-double-right loc-arr-rig-to-ind loca_list_navi_clks"></i>
																												                       	   </div>
																												                       </div>	
																																		
																														      <?php	}
																										                      	
																										                      	
																										                      } 
																															   ?>
																										                   	
																										                   </div>      
																										                   <div class="col-lg-4">
																										                      <?php if(isset($district)){
																																	
																																	foreach ($district as $dkey => $dalue) { ?>
																																		
																																		<div class="row district-list-p country-list-hide show_district_<?php echo $dalue['state'];?>">	
																												                       	    <div class="col-lg-1">
																												                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
																																					<input name="district[]" value="<?php echo $dalue['id'];?>"  type="checkbox" class="impt_ckbox_bulk district_chkbx_ads">
																																					<label></label>
																																			   </div>
																																		    </div>
																												                       	   <div class="col-lg-10"><label style="margin-top: 3px;"><?php echo $dalue['name'];?></label></div>
																												                       	   
																												                       	   	
																												                       	   
																												                       </div>	
																																	
																																		
																														      <?php	}
																										                      	
																										                      	
																										                      } 
																															   ?>
																										                  </div>  
																										          </div>
																				                    	      
																				                    	  
																				                    	  </div>
																				                    </div>
																				            </div>
																				           
																				            <div class="row">
																				                <div class="col-lg-12">
																						          <div class="row">
																						            	
																							               <div class="col-lg-6">
																							                            <div class="form-group">
																							                                <label>Address</label>
																							                                <textarea id="address" rows="5" class="form-control"  name="address" ></textarea>
																							                                
																							                            </div>
																							               </div>
																							               <div class="col-lg-6">
																							                            <div class="form-group">
																							                                <label class="mobile fibl"><i class="fa fa-mobile"></i>Mobile</label>
																							                                <input id="mobile" class="form-control"  name="mobile">
																							                                
																							                            </div>
																							                            <div class="form-group">
																							                                <label class="landline fibl"><i class="fa fa-phone-square"></i>Land Line</label>
																							                                <input id="landline" class="form-control"  name="landline">
																							                                
																							                            </div>
																							               </div>	
																						                   
																						                    
																						          </div> 
																						          <div class="row">
																						            	
																							              
																							               <div class="col-lg-6">
																							                            
																							                            <div class="form-group">
																							                                <label class="email fibl"><i class="fa fa-envelope-o"></i>email</label>
																							                                <input id="email" class="form-control"  name="email">
																							                                
																							                            </div>
																							                           
																							               </div>
																							               <div class="col-lg-6">
																							                            
																							                            <div class="form-group">
																							                                <label>Remarks</label>
																							                                <textarea id="remarks" rows="5" class="form-control"  name="remarks" ></textarea>
																							                                <!-- <p class="help-block">Please add some search queries seperated by comma.</p> -->
																							                            </div>
																							               </div>		
																						                   
																						                    
																						          </div>
																						          
																						     </div> 
														                                 </div>            
																		             </div>       
																		             <div class="col-lg-4">
																		                           <div class="panel panel-primary">
																			                            <div class="panel-heading">
																			                                <h3 class="panel-title">Choose Ad File</h3>
																			                            </div>
																			                            <div class="panel-body">
																			                            	<div class="form-group">
																				                                <label>Image/Flash</label>
																				                                <input id="file" class="img_tag" type="file" name="file" accept=".swf,image/*"  >
																				                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
																				                            </div>
																				                            
																									                            <div class="lib_image_holder">
																									                            	
																									                            </div>
																									                   
																				                            
																						                </div>
																						                
																			                    </div>
																		  
																		             </div>
																	                   
																	             
																		             <div class="col-lg-12">
																		             	  <div class="col-lg-6">
																		             	  	
																		             	  	    <?php if($this->session->flashdata('error')&&$this->session->flashdata('error')=="validation"){  ?>
																                                	
																		                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
																		                            <?php echo  $this->session->flashdata('details'); ?>
																		                        <?php }elseif($this->session->flashdata('error')||$this->session->flashdata('eerrors')){  ?>
																		                            <div class="error-div"> 
																		                            	<?php echo $this->session->flashdata('errors');?>
																		                            	<?php echo $this->session->flashdata('file_error');?>
																		                            	<?php echo $this->session->flashdata('error');?>
																		                            </div>
																		                            
																		                        <?php }else{ ?>
																		                        	
																		                        <?php  }   ?>  
																		             	    
																		             	  </div>
																		            </div>
																			        
																                   <div class="col-lg-12"> 
																                        	<div class="form-group">
																				                <button type="submit"  class="btn btn-default spin-waiter">Save Details</button>
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
													    	
													    	
													    	
													    	
													    	
													    </div>
													    <div role="tabpanel" class="tab-pane <?php if(isset($tab_active)&&$tab_active=="?tab=1")echo "active";?>" id="google_adsense">
													    	      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/google-ads/save');?>">
																	                
																	                	<div class="col-lg-8">
																	                		<div class="row">
																				                    <div class="col-lg-6">
																				
																				                           <div class="form-group">
																					                                <label class="landline fibl">Select Page</label>
																					                                <select  class="form-control f_s_b"  name="page">
																					                                	    <?php if(isset($pages)){
																						                                		$sel="";
																																foreach ($pages as $key => $value) {
																																	   if($key==0){
																																	   	$sel=$value['id'];
																																	   }
																																	
																																	 ?>
																																	<option value="<?php echo $value['id'];?>"><?php echo $value['content'];?></option>
																															<?php }
																																
																						                                	}  ?>		
																					                                </select>	
																					                                
																					                       </div>
																				
																				                        
																				
																				
																				                    </div>
																				                    <div class="col-lg-6">
																				                    	   <div class="form-group">
																					                                <label class="landline fibl">Select Ads Id</label>
																					                                <select  class="form-control s_s_b"  name="ads_id">
																					                                	    <?php if(isset($ads_id)&&$sel!=""){
																																		 foreach ($ads_id as $key => $value) { 
																																			if($value['meta_id']==$sel){  
																																			?>
																																			   <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
																																			  
																															 <?php           }
																																		  }
																																	
																							                                	   }  ?>		
																					                                </select>	
																					                                
																					                       </div>
																				                    	
																				
																				                    </div>
																				            </div>
																				            
																				            
																				                   
																				            
																				            <div class="row">
																				                <div class="col-lg-12">
																						          
																						         
																							                            
																							                            <div class="form-group">
																							                                <label>Add Google Code Here</label>
																							                                <textarea id="remarks" rows="5" class="form-control"  name="code" ></textarea>
																							                                <p class="bg-info info"><i class="fa fa-info"></i>
																							                                  Only three Ad Units per page is allowed.
																							                                </p>
																							                                <p class="bg-info info"><i class="fa fa-info"></i>
																							                                 Size restrictions :<br/>
																							                                    Only one dimension can be greater than 300 pixels<br/>
																																The minimum width is 120 pixels<br/>
																																The minimum height is 50 pixels<br/>
																																Neither height nor width can exceed 1200 pixels.<br/>
																							                                </p>
																							                                <input type="hidden" id="mode" class="form-control" value="google"  name="mode">
																				                                            <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																				                                
																							                            </div>
																							              
																							     </div> 
															                                 </div>            
																		             </div>       
																		             
																		             <div class="col-lg-12">
																		             	  <div class="col-lg-6">
																		             	  	
																		             	  	    <?php if($this->session->flashdata('eerror')&&$this->session->flashdata('eerror')=="validation"){  ?>
																                                	
																		                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
																		                            <?php echo  $this->session->flashdata('edetails'); ?>
																		                        <?php }elseif($this->session->flashdata('eerror')){  ?>
																		                            <div class="error-div"> 
																		                            	
																		                            	<?php echo $this->session->flashdata('file_eerror');?>
																		                            	<?php echo $this->session->flashdata('eerror');?>
																		                            </div>
																		                            
																		                        <?php }else{ ?>
																		                        	
																		                        <?php  }   ?>  
																		             	    
																		             	  </div>
																		            </div>
																			        
																                   <div class="col-lg-12"> 
																                        	<div class="form-group">
																				                <button type="submit"  class="btn btn-default spin-waiter">Save Details</button>
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
													    	
													    	
													    	
													    </div>
													    
													  </div>
												
												</div>
						            
						            
						            
				</div>
                
                <div class="row gallery_list">
                
	                
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript">
     	var s_f_jsa=null;
     	<?php
     	 $str_tmp="";
     	 if(isset($ads_id)){
     	   foreach ($ads_id as $ck => $cvalue) {
     	   	$ads_size=(!empty($cvalue['content'])&&!empty($cvalue['meta_content']))?' ('.$cvalue['content'].' X '.$cvalue['meta_content'].')':'';
     	   	if($ck==0){
     	   		
     	   		$str_tmp="{'id':'".$cvalue['id']."','name':'".($cvalue['name']).$ads_size."','meta_id':'".$cvalue['meta_id']."'}";
     	   	}else{
     	   		$str_tmp=$str_tmp.",{'id':'".$cvalue['id']."','name':'".($cvalue['name']).$ads_size."','meta_id':'".$cvalue['meta_id']."'}";
     	   	} 
		   } ?>
		   s_f_jsa=[<?php echo $str_tmp;  ?>];
		<?php }
     	 ?>
    </script>