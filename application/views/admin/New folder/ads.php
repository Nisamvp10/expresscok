     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ads
                            <small>List All</small>
                        </h1>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Ads
                            </li>
                            <?php if($this->session->flashdata('success')!=FALSE&&($this->session->flashdata('success')==TRUE||$this->session->flashdata('success')=='modal')){  ?>
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
                                <h3 class="panel-title">All Ads</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																      <select data-action="<?php echo base_url('admin/bulk-action/ads');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																    
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Name</th>
			                                        <th>Position</th>
			                                        <th>URL</th>
			                                        <th>Act & Exp Date</th>
			                                        <!-- <th>Target Location</th> -->
			                                        <th>Address</th>
			                                        <th>Contact#</th>
			                                        <th>File</th>
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
															    	<article><div class="tble_name"><?php echo ($row['mode']=="google")?"Google AdSense":$row['name']; ?></div></article>
															    	
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/ads/edit/<?php echo $row['mode'];?>" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_delete_s"></i></a>
						                                        		
						                                        	</form>
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/ads/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i></a>
															    	<?php  if($row['mode']=="google"){ ?>
															    		        <?php    if($row['status']=="0"){ ?>
																										    	  
																					<a title="Active"  class="course_de_ads_active" data-toggle="modal" data-target="#status_modal_<?php echo $row['id'];?>"  data-id="<?php echo $row['id'];?>"><i class="fa fa-check-circle-o"></i></a>
																										    	  
																				<?php }else{?>
																					
																					<a title="Active"  class="course_de_ads_inactive" data-toggle="modal" data-target="#status_modal_<?php echo $row['id'];?>"  data-id="<?php echo $row['id'];?>"><i title="Inactive" class="fa fa-exclamation-circle modal-expired-i"></i></a>					    	  
																										    	  
																				<?php  }?>
																	    		
																	    		      	<!--****************************************************************Media Modal*****************************************************************-->
																				                   <div id="status_modal_<?php echo $row['id'];?>" class="modal fade modal-wide">
																									  <div class="modal-dialog">
																									    <div class="modal-content">
																									      <div class="modal-header">
																									        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																									        <h4 class="modal-title modal-title-in-expired"><?php    if(isset($pages)){foreach ($pages as $pk => $pr) {
																																										if($pr['id']==$row['page'])echo $pr['name'];
																																									} } ?> 
																																									<i class="fa fa-angle-right"></i>
																																									<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																										if($ar['id']==$row['ads_id'])echo $ar['name'];
																																									} } ?>
																										    </h4>
																										    <?php    if($row['status']=="0"){ ?>
																										    	  
																										    	  <i title="Active" class="fa fa-check modal-success-i"></i>
																												
																										    <?php }else{?>
																										    	  <i title="Inactive" class="fa fa-exclamation-circle modal-expired-i"></i>
																										    <?php  }?>
																										    
																										                <div style="width: 28%;" class="cls-mdl-bttom-left">
																												      		
																												      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																			                                	                     <?php if($this->session->flashdata('error')){  ?>
																			                                	                    
																									                                    <p class="error-message"><i class="fa fa-close"></i>Couldn't save,see details at bottom.</p>
																									                            
																									                                  <?php }else{ ?>
																									                                  	
																									                                  	<!-- <p class="succe-pa"><i class="fa fa-check"></i>Successfully updated.</p> -->
																									                                  	
																									                                  <?php } ?>  
																									                                 
																									                            
																									                        <?php } ?>  
																												      	</div>
																									      </div>
																									      <form method="post" action="<?php echo base_url("admin/ads/status/update");?>">
																									      	
																									      	      <input type="hidden"   name="id" value="<?php echo $row['id'];?>">
																									      	      <input type="hidden"   name="modal_id" value="status_modal_<?php echo $row['id'];?>">
																									      	      <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																											      <div class="modal-body">
																											      	   <div class="row">
																											      	   	   <?php    if($row['status']!="0"){ ?>
																										    	  
																														    	   <div class="col-lg-12 date-modal-info-inactive" > 
																													      	   	   	  <i class="fa fa-exclamation-circle"></i> It seems to be that the ad has deactivated.
																													      	   	   </div>
																																
																														    <?php } ?>
																											      	   	   <div class="col-lg-5 background-slction"> 
																											      	   	   	    <div style="margin-bottom: 0px;" class="form-group">
																									                                <label>Ads Info</label>
																									                               
																									                            </div>
																									                            <div class="form-group modal-ads-status-group">
																									                                <label>Ad Position</label>
																									                                <div class='input-group date'>
																													                    <?php if(isset($pages)){foreach ($pages as $pk => $pr) {
																																			if($pr['id']==$row['page'])echo $pr['name'];
																																		} } ?> 
																																		<i class="fa fa-angle-right"></i>
																																		<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																			if($ar['id']==$row['ads_id'])echo $ar['name'];
																																		} } ?>
																													                </div>
																									                            </div>
																									                            <div class="form-group">
																									                                <label>Ad Status</label>
																									                                <div style="width: 100%;" class='input-group'>
																									                                	
																													                        <div class="rss custom-rss-one">
																																			  <input name="status" <?php echo ($row['status']=="0")?"checked":"";?> type="checkbox" value="active" class="radio-switch" id="radio_switch_<?php echo $row['id']; ?>" />
																																			  <label for="radio_switch_<?php echo $row['id']; ?>"> <!-- class="attention" -->
																																			    <i></i>
																																			  </label>
																																			</div>
																													                </div>
																									                            </div>
																									                            
																									                            
																											      	   	   </div>
																											      	   	   <div class="col-lg-7"> 
																											      	   	   	        <div class="form-group">
																										                                <label>Adsense Code</label>
																										                                <textarea rows="12" name="code"  class="form-control"><?php echo $row['code'];?></textarea>
																										                            </div>
																											      	   	   	   
																											      	   	   </div>
																											      	   	
																											      	   </div>
																											      </div>
																											      <div class="modal-footer">
																											      	<div class="form-group">
																											      		<div class="cls-mdl-bttom-left">
																												      		
																												      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																			                                	                
																									                            <?php echo $this->session->flashdata('status_modal_'.$row['id']);?>
																									                            
																									                        <?php } ?>  
																									                        
																												      	</div>
																										                <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
																											            <button type="submit" class="btn btn-primary change_ads_status spin-waiter">Save Changes</button>
																											            <div class="facebookG">
																																	<div id="blockG_1" class="facebook_blockG">
																																	</div>
																																	<div id="blockG_2" class="facebook_blockG">
																																	</div>
																																	<div id="blockG_3" class="facebook_blockG">
																																	</div>
																														</div>
																										            </div>
																											      </div>
																									      </form>
																									    </div>
																									  </div>
																									</div><!-- /.modal -->
																			            <!--****************************************************************End of Media Modal*****************************************************************-->
															    		
															    	<?php }elseif($row['status']=="0"&&time()<=strtotime($row['expiration'])){ ?>
															    		
															    		            <a id="ffffff" title="status" class="course_de_ads_active" data-toggle="modal" data-target="#status_modal_<?php echo $row['id'];?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-check-circle-o"></i>
															    		            	                       <?php     $now = time(); 
																													     $exp_date = strtotime($row['expiration']);
																													     $datediff = $exp_date-$now;
																													     if (floor($datediff/(60*60*24))<=30){ ?>
																													     		
																													     	<i title="The Ad will expire in <?php echo (floor($datediff/(60*60*24))>0)?floor($datediff/(60*60*24))." day/s":"today"; ?>." class="fa fa-exclamation modal-warning-i"></i>
																												<?php	 }
																											    ?>
															    		            	
															    		            </a>
																		    		<!--****************************************************************Media Modal*****************************************************************-->
																					                   <div id="status_modal_<?php echo $row['id'];?>" class="modal fade modal-wide">
																										  <div class="modal-dialog">
																										    <div class="modal-content">
																										      <div class="modal-header">
																										        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										        <h4 class="modal-title modal-title-in-expired"><?php    if(isset($pages)){foreach ($pages as $pk => $pr) {
																																											if($pr['id']==$row['page'])echo $pr['name'];
																																										} } ?> 
																																										<i class="fa fa-angle-right"></i>
																																										<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																											if($ar['id']==$row['ads_id'])echo $ar['name'];
																																										} } ?>
																											    </h4><i title="Active" class="fa fa-check modal-success-i"></i>
																											    <?php    
																													     if (floor($datediff/(60*60*24))<=30){ ?>
																													     		
																													     	<i title="The Ad will expire in <?php echo (floor($datediff/(60*60*24))>0)?floor($datediff/(60*60*24))." day/s":"today"; ?>." class="fa fa-exclamation modal-warning-i"></i>
																												<?php	 }
																											    ?>
																											    
																											    
																											    
																											                <div style="width: 28%;" class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                     <?php if($this->session->flashdata('error')){  ?>
																				                                	                    
																										                                    <p class="error-message"><i class="fa fa-close"></i>Couldn't save,see details at bottom.</p>
																										                            
																										                                  <?php }else{ ?>
																										                                  	
																										                                  	
																										                                  	
																										                                  <?php } ?>  
																										                                 
																										                            
																										                        <?php } ?>  
																													      	</div>
																										      </div>
																										      <form method="post" action="<?php echo base_url("admin/ads/status/update");?>">
																										      	
																										      	      <input type="hidden"   name="id" value="<?php echo $row['id'];?>">
																										      	      <input type="hidden"   name="modal_id" value="status_modal_<?php echo $row['id'];?>">
																										      	      
																										      	      <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																												      <div class="modal-body">
																												      	   <div class="row">
																												      	   	 <?php if (floor($datediff/(60*60*24))<=30){ ?>
																													     		
																													     	   <div class="col-lg-12 modal-info-warning-s" > 
																												      	   	   	  <i class="fa fa-exclamation-triangle"></i>This advertisment will expire in <?php echo (floor($datediff/(60*60*24))>0)?floor($datediff/(60*60*24))." day/s":"today"; ?>. If you want change the expiration date,do it below.
																												      	   	   </div>
																												      	   	   
																															  <?php	 }
																															  ?>
																												      	   	   <div class="col-lg-5"> 
																												      	   	   	    <div class="form-group modal-ads-status-group">
																										                                <label>Reg. Company/Person Name</label>
																										                                <div class='input-group date'>
																														                    <?php echo $row['name'];?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Ad Position</label>
																										                                <div class='input-group date'>
																														                    <?php if(isset($pages)){foreach ($pages as $pk => $pr) {
																																				if($pr['id']==$row['page'])echo $pr['name'];
																																			} } ?> 
																																			<i class="fa fa-angle-right"></i>
																																			<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																				if($ar['id']==$row['ads_id'])echo $ar['name'];
																																			} } ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Redirect URL</label>
																										                                <div class='input-group date'>
																														                    <?php echo (!empty($row['url']))?$row['url']:"<span>-Nill-</span>"; ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Act Date/Exp date</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
																								                                        		<span>Act. <?php echo date('d-m-Y',strtotime($row['activation'])); ?></span> / 
																								                                        	    <span>Exp. <?php echo date('d-m-Y',strtotime($row['expiration'])); ?></span>
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>		
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Address</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
									                                        		     		
																								                                        		<span><i class="fa fa-location-arrow"></i><?php echo $row['address']; ?></span>
																								                                        	    
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>	
																														                </div>
																										                            </div>
																												      	   	   </div>
																												      	   	   <div class="col-lg-4 date-modal-min-height background-slction" > 
																												      	   	   	   <div class="form-group">
																										                                <label>Update Expiration Date</label>
																										                                <div class='input-group date datetimepicker'>
																														                    <input  value="<?php echo$row['expiration'];?>" class="form-control"  name="expiration">
																														                    
																														                    <span class="input-group-addon">
																														                        <span class="glyphicon glyphicon-calendar"></span>
																														                    </span>
																														                </div>
																										                            </div>
																										                            <div class="form-group">
																										                                <label>-OR-</label>
																										                            </div>
																										                            <div class="form-group background-slction">
																										                                <label>Change Status</label>
																										                                <div style="width: 100%;" class='input-group'>
																										                                	
																														                        <div class="rss">
																																				  <input checked name="status" type="checkbox" value="active" class="radio-switch" id="radio_switch_<?php echo $row['id']; ?>" />
																																				  <label for="radio_switch_<?php echo $row['id']; ?>"> <!-- class="attention" -->
																																				    <i></i>
																																				  </label>
																																				</div>
																														                </div>
																										                            </div>
																										                            
																												      	   	   </div>
																												      	   	   <div class="col-lg-3"> 
																												      	   	   	        <?php if(isset($row['m_file'])&&$row['m_file']!=""){
																															    			       $path_parts = pathinfo(base_url($row['m_file']));
																		  		                                                                   if($path_parts['extension']=="swf"){ ?>
																		  		                                                                   	<a><object width="100%" height="auto" data="<?php echo base_url($row['m_file']); ?>"></object></a>
																																			<?php  }else{
																																			  ?>
																															    		            <img class="tble_thumb_img" width="100%" src="<?php echo base_url().$row['m_file'];?>">
																															    		<?php   
																																		     
																																				   }
																																		      }else{ 
																																		?>
																																	                   <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																																				  
																																	    <?php }  ?>
																												      	   	   	   
																												      	   	   </div>
																												      	   	
																												      	   </div>
																												      </div>
																												      <div class="modal-footer">
																												      	<div class="form-group">
																												      		<div class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                
																										                            <?php echo $this->session->flashdata('status_modal_'.$row['id']);?>
																										                            
																										                        <?php } ?>  
																										                        
																													      	</div>
																											                <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
																												            <button type="submit" class="btn btn-primary change_ads_status spin-waiter">Save Changes</button>
																												            <div class="facebookG">
																																		<div id="blockG_1" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_2" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_3" class="facebook_blockG">
																																		</div>
																															</div>
																											            </div>
																												      </div>
																										      </form>
																										    </div>
																										  </div>
																										</div><!-- /.modal -->
																				            <!--****************************************************************End of Media Modal*****************************************************************-->
																		    		      	
																		    		
																		    		
																		    	<?php  }elseif($row['status']=="1"&&time()<=strtotime($row['expiration'])){  ?>
																		    			
																		    		      	<a title="Active"  class="course_de_ads_inactive" data-toggle="modal" data-target="#status_modal_<?php echo $row['id'];?>"  data-id="<?php echo $row['id'];?>"><i class="fa fa fa-exclamation-circle"></i></a>
																		    		      	<!--****************************************************************Media Modal*****************************************************************-->
																					                   <div id="status_modal_<?php echo $row['id'];?>" class="modal fade modal-wide">
																										  <div class="modal-dialog">
																										    <div class="modal-content">
																										      <div class="modal-header">
																										        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										        <h4 class="modal-title modal-title-in-expired"><?php    if(isset($pages)){foreach ($pages as $pk => $pr) {
																																											if($pr['id']==$row['page'])echo $pr['name'];
																																										} } ?> 
																																										<i class="fa fa-angle-right"></i>
																																										<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																											if($ar['id']==$row['ads_id'])echo $ar['name'];
																																										} } ?>
																											    </h4><i title="Inactive" class="fa fa-exclamation-circle modal-expired-i"></i>
																											                <div style="width: 28%;" class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                     <?php if($this->session->flashdata('error')){  ?>
																				                                	                    
																										                                    <p class="error-message"><i class="fa fa-close"></i>Couldn't save,see details at bottom.</p>
																										                            
																										                                  <?php }else{ ?>
																										                                  	
																										                                  	
																										                                  	
																										                                  <?php } ?>  
																										                                 
																										                            
																										                        <?php } ?>  
																													      	</div>
																										      </div>
																										      <form method="post" action="<?php echo base_url("admin/ads/status/update");?>">
																										      	
																										      	      <input type="hidden"   name="id" value="<?php echo $row['id'];?>">
																										      	      <input type="hidden"   name="modal_id" value="status_modal_<?php echo $row['id'];?>">
																										      	      
																										      	      <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																												      <div class="modal-body">
																												      	   <div class="row">
																												      	   	  <div class="col-lg-12 date-modal-info-inactive" > 
																													      	   	   	  <i class="fa fa-exclamation-circle"></i> It seems to be that the ad has deactivated.
																													      	  </div>
																												      	   	   <div class="col-lg-5"> 
																												      	   	   	    <div class="form-group modal-ads-status-group">
																										                                <label>Reg. Company/Person Name</label>
																										                                <div class='input-group date'>
																														                    <?php echo $row['name'];?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Ad Position</label>
																										                                <div class='input-group date'>
																														                    <?php if(isset($pages)){foreach ($pages as $pk => $pr) {
																																				if($pr['id']==$row['page'])echo $pr['name'];
																																			} } ?> 
																																			<i class="fa fa-angle-right"></i>
																																			<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																				if($ar['id']==$row['ads_id'])echo $ar['name'];
																																			} } ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Redirect URL</label>
																										                                <div class='input-group date'>
																														                    <?php echo (!empty($row['url']))?$row['url']:"<span>-Nill-</span>"; ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Act Date/Exp date</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
																								                                        		<span>Act. <?php echo date('d-m-Y',strtotime($row['activation'])); ?></span> / 
																								                                        	    <span>Exp. <?php echo date('d-m-Y',strtotime($row['expiration'])); ?></span>
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>		
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Address</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
									                                        		     		
																								                                        		<span><i class="fa fa-location-arrow"></i><?php echo $row['address']; ?></span>
																								                                        	    
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>	
																														                </div>
																										                            </div>
																												      	   	   </div>
																												      	   	   <div class="col-lg-4 date-modal-min-height background-slction" > 
																												      	   	   	  <div class="form-group">
																										                                <label>Update Expiration Date</label>
																										                                <div class='input-group date datetimepicker'>
																														                    <input checked value="<?php echo$row['expiration'];?>" class="form-control"  name="expiration">
																														                    
																														                    <span class="input-group-addon">
																														                        <span class="glyphicon glyphicon-calendar"></span>
																														                    </span>
																														                </div>
																										                            </div>
																										                            <div class="form-group">
																										                                <label>-OR-</label>
																										                            </div>
																										                            <div class="form-group">
																										                                <label>Change Status</label>
																										                                <div style="width: 100%;" class='input-group'>
																										                                	
																														                        <div class="rss">
																																				  <input name="status" type="checkbox"  value="active" class="radio-switch" id="radio_switch_<?php echo $row['id']; ?>" />
																																				  <label for="radio_switch_<?php echo $row['id']; ?>"> <!-- class="attention" -->
																																				    <i></i>
																																				  </label>
																																				</div>
																														                </div>
																										                            </div>
																										                            
																												      	   	   </div>
																												      	   	   <div class="col-lg-3"> 
																												      	   	   	        <?php if(isset($row['m_file'])&&$row['m_file']!=""){
																															    			       $path_parts = pathinfo(base_url($row['m_file']));
																		  		                                                                   if($path_parts['extension']=="swf"){ ?>
																		  		                                                                   	<a><object width="100%" height="auto" data="<?php echo base_url($row['m_file']); ?>"></object></a>
																																			<?php  }else{
																																			  ?>
																															    		            <img class="tble_thumb_img" width="100%" src="<?php echo base_url().$row['m_file'];?>">
																															    		<?php   
																																		     
																																				   }
																																		      }else{ 
																																		?>
																																	                   <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																																				  
																																	    <?php }  ?>
																												      	   	   	   
																												      	   	   </div>
																												      	   	
																												      	   </div>
																												      </div>
																												      <div class="modal-footer">
																												      	<div class="form-group">
																												      		<div class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                
																										                            <?php echo $this->session->flashdata('status_modal_'.$row['id']);?>
																										                            
																										                        <?php } ?>  
																										                        
																													      	</div>
																											                <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
																												            <button type="submit" class="btn btn-primary change_ads_status spin-waiter">Save Changes</button>
																												            <div class="facebookG">
																																		<div id="blockG_1" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_2" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_3" class="facebook_blockG">
																																		</div>
																															</div>
																											            </div>
																												      </div>
																										      </form>
																										    </div>
																										  </div>
																										</div><!-- /.modal -->
																				            <!--****************************************************************End of Media Modal*****************************************************************-->
																		    		      	
															    		<?php }else{ ?>
																		    			
																		    		      	<a title="Inactive"  class="course_de_ads_expired" data-toggle="modal" data-target="#status_modal_<?php echo $row['id'];?>"  data-id="<?php echo $row['id'];?>"><i class="fa fa-exclamation-triangle"></i></a>
																		    		      	<!--****************************************************************Media Modal*****************************************************************-->
																					                   <div id="status_modal_<?php echo $row['id'];?>" class="modal fade modal-wide">
																										  <div class="modal-dialog">
																										    <div class="modal-content">
																										      <div class="modal-header">
																										        <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										        <h4 class="modal-title modal-title-in-expired"><?php    if(isset($pages)){foreach ($pages as $pk => $pr) {
																																											if($pr['id']==$row['page'])echo $pr['name'];
																																										} } ?> 
																																										<i class="fa fa-angle-right"></i>
																																										<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																											if($ar['id']==$row['ads_id'])echo $ar['name'];
																																										} } ?>
																											    </h4><i title="exipred" class="fa fa-exclamation-triangle modal-expired-i"></i>
																											                <div style="width: 28%;" class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                     <?php if($this->session->flashdata('error')){  ?>
																				                                	                    
																										                                    <p class="error-message"><i class="fa fa-close"></i>Couldn't save,see details at bottom.</p>
																										                            
																										                                  <?php }else{ ?>
																										                                  	
																										                                  	<p class="succe-pa"><i class="fa fa-check"></i>Successfully updated.</p>
																										                                  	
																										                                  <?php } ?>  
																										                                 
																										                            
																										                        <?php } ?>  
																													      	</div>
																										      </div>
																										      <form method="post" action="<?php echo base_url("admin/ads/status/update");?>">
																										      	
																										      	      <input type="hidden"   name="id" value="<?php echo $row['id'];?>">
																										      	      <input type="hidden"   name="modal_id" value="status_modal_<?php echo $row['id'];?>">
																										      	      
																										      	      <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
																												      <div class="modal-body">
																												      	   <div class="row">
																												      	   	   <div class="col-lg-12 date-modal-info-error" > 
																												      	   	   	  <i class="fa fa-exclamation-triangle"></i>This advertisment has expired on <?php echo date('d-m-Y',strtotime($row['expiration'])); ?>. If you want change the expiration date,do it below.
																												      	   	   </div>
																												      	   	   <div class="col-lg-5"> 
																												      	   	   	    <div class="form-group modal-ads-status-group">
																										                                <label>Reg. Company/Person Name</label>
																										                                <div class='input-group date'>
																														                    <?php echo $row['name'];?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Ad Position</label>
																										                                <div class='input-group date'>
																														                    <?php if(isset($pages)){foreach ($pages as $pk => $pr) {
																																				if($pr['id']==$row['page'])echo $pr['name'];
																																			} } ?> 
																																			<i class="fa fa-angle-right"></i>
																																			<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																																				if($ar['id']==$row['ads_id'])echo $ar['name'];
																																			} } ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Redirect URL</label>
																										                                <div class='input-group date'>
																														                    <?php echo (!empty($row['url']))?$row['url']:"<span>-Nill-</span>"; ?>
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Act Date/Exp date</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
																								                                        		<span>Act. <?php echo date('d-m-Y',strtotime($row['activation'])); ?></span> / 
																								                                        	    <span>Exp. <?php echo date('d-m-Y',strtotime($row['expiration'])); ?></span>
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>		
																														                </div>
																										                            </div>
																										                            <div class="form-group modal-ads-status-group">
																										                                <label>Address</label>
																										                                <div class='input-group date'>
																														                    <?php if($row['mode']=="custom"){?>
									                                        		     		
																								                                        		<span><i class="fa fa-location-arrow"></i><?php echo $row['address']; ?></span>
																								                                        	    
																								                                        	<?php }else{  ?>
																								                                        		<span>-Nill-</span>
																								                                            <?php }  ?>	
																														                </div>
																										                            </div>
																												      	   	   </div>
																												      	   	   <div class="col-lg-4 date-modal-min-height background-slction" > 
																												      	   	   	  <div class="form-group">
																										                                <label>Update Expiration Date</label>
																										                                <div class='input-group date datetimepicker'>
																														                    <input checked value="<?php echo$row['expiration'];?>" class="form-control"  name="expiration">
																														                    
																														                    <span class="input-group-addon">
																														                        <span class="glyphicon glyphicon-calendar"></span>
																														                    </span>
																														                </div>
																										                            </div>
																										                            <div class="form-group">
																										                                <label>-OR-</label>
																										                            </div>
																										                            <div class="form-group">
																										                                <label>Change Status</label>
																										                                <div style="width: 100%;" class='input-group'>
																										                                	
																														                        <div class="rss">
																																				  <input name="status" type="checkbox"  value="active" class="radio-switch" id="radio_switch_<?php echo $row['id']; ?>" />
																																				  <label for="radio_switch_<?php echo $row['id']; ?>"> <!-- class="attention" -->
																																				    <i></i>
																																				  </label>
																																				</div>
																														                </div>
																										                            </div>
																										                            
																												      	   	   </div>
																												      	   	   <div class="col-lg-3"> 
																												      	   	   	        <?php if(isset($row['m_file'])&&$row['m_file']!=""){
																															    			       $path_parts = pathinfo(base_url($row['m_file']));
																		  		                                                                   if($path_parts['extension']=="swf"){ ?>
																		  		                                                                   	<a><object width="100%" height="auto" data="<?php echo base_url($row['m_file']); ?>"></object></a>
																																			<?php  }else{
																																			  ?>
																															    		            <img class="tble_thumb_img" width="100%" src="<?php echo base_url().$row['m_file'];?>">
																															    		<?php   
																																		     
																																				   }
																																		      }else{ 
																																		?>
																																	                   <img height="55px" width="55px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																																				  
																																	    <?php }  ?>
																												      	   	   	   
																												      	   	   </div>
																												      	   	
																												      	   </div>
																												      </div>
																												      <div class="modal-footer">
																												      	<div class="form-group">
																												      		<div class="cls-mdl-bttom-left">
																													      		
																													      		<?php if($this->session->flashdata('status_modal_'.$row['id'])){  ?>
																				                                	                
																										                            <?php echo $this->session->flashdata('status_modal_'.$row['id']);?>
																										                            
																										                        <?php } ?>  
																										                        
																													      	</div>
																											                <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal">Cancel</button>
																												            <button type="submit" class="btn btn-primary change_ads_status spin-waiter">Save Changes</button>
																												            <div class="facebookG">
																																		<div id="blockG_1" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_2" class="facebook_blockG">
																																		</div>
																																		<div id="blockG_3" class="facebook_blockG">
																																		</div>
																															</div>
																											            </div>
																												      </div>
																										      </form>
																										    </div>
																										  </div>
																										</div><!-- /.modal -->
																				            <!--****************************************************************End of Media Modal*****************************************************************-->
																		    		      	
															    		<?php }   ?>
															    	<div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
						                                        <td><article>
						                                        	<div class="tble_content_contact">
						                                        		<span>
						                                        	    <?php if(isset($pages)){foreach ($pages as $pk => $pr) {
																			if($pr['id']==$row['page'])echo $pr['name'];
																		} } ?> 
																		<i class="fa fa-angle-right"></i>
																		<?php if(isset($ads_id)){foreach ($ads_id as $ak => $ar) {
																			if($ar['id']==$row['ads_id'])echo $ar['name'];
																		} } ?>
																		</span>
						                                            </div>
						                                        </article></td>
						                                        <td><article><div class="tble_content_contact"><span> <?php echo (!empty($row['url']))?$row['url']:""; ?></span></div></article></td>
						                                        <td><article><div class="tble_content_contact">
						                                        	<?php if($row['mode']=="custom"){?>
						                                        		<span>Act. <?php echo date('d-m-Y',strtotime($row['activation'])); ?></span>
						                                        	    <span>Exp. <?php echo date('d-m-Y',strtotime($row['expiration'])); ?></span>
						                                        	<?php }else{  ?>
						                                        		<span>-Nill-</span>
						                                            <?php }  ?>		
						                                        	
						                                        </div></article></td>
						                                        <!-- <td><article><div class="tble_content_contact">
						                                        	<?php if($row['mode']=="custom"){?>
						                                        		<span>Target locations</span>
						                                        	    
						                                        	<?php }else{  ?>
						                                        		<span>-Nill-</span>
						                                            <?php }  ?>		
						                                        	
						                                        </div></article></td> -->
						                                        <td>
						                                        	<article>
						                                        		     <div class="tble_content_contact">
						                                        		     	<?php if($row['mode']=="custom"){?>
						                                        		     		
									                                        		<span><i class="fa fa-location-arrow"></i><?php echo $row['address']; ?></span>
									                                        	    
									                                        	<?php }else{  ?>
									                                        		<span>-Nill-</span>
									                                            <?php }  ?>		
						                                        	
						                                                     </div>
						                                            </article>
						                                        </td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_content_contact">
						                                        			
						                                        	       <?php  
						                                        	          if($row['mobile']!=""){ ?>
						                                        	          	
						                                        	          	<span><i class="fa fa-mobile"></i><?php echo $row['mobile'];?></span>
						                                        	          	
						                                        	         <?php   }
						                                        	        ?>
						                                        	        
						                                        	        <?php  
						                                        	          if($row['landline']!=""){ ?>
						                                        	          	
						                                        	          	 <span><i class="fa fa-phone-square"></i><?php echo $row['landline'];?></span>
						                                        	          	 
						                                        	         <?php   }
						                                        	        ?>
						                                        	        
						                                        	        <?php  
						                                        	          if($row['email']!=""){ ?>
						                                        	          	
						                                        	          	<span><i class="fa fa-envelope-o"></i><?php echo $row['email'];?></span>
						                                        	          	
						                                        	         <?php   }
						                                        	        ?>
						                                        	        
						                                        	        <?php if($row['mode']=="google"){?>
						                                        		     		
									                                        		<span>-Nill-</span>
									                                        	    
									                                        	<?php } ?>
						                                        	        
						                                                </div>
						                                            </article></td>
						                                        <td>
															    	 <article>
															    		<div class="tble_file">
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
															    	   </div>
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
																      <select data-action="<?php echo base_url('admin/bulk-action/ads');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
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