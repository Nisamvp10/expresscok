     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Sliders
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Sliders
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
                <div style="margin-top: 0px;" class="row gallery_list">
                   
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Sliders</h3>
                                
                                	
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
			                                        <th>Slider Title</th>
			                                        <th>Slides</th>
			                                        <th style="text-align: center;">Status</th>
			                                        <th>Action</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    
			                                        
					                               <?php if(isset($slider_result)&&!empty($slider_result)){
					                		           
														foreach($slider_result as $key => $row){ 
															    
															?>
															  <tr id="course_list_tr_<?php echo $row['id'];?>">
															  	<td class="bulk_chckbx_parent">
															  		   <div class="checkbox checkbox-primary">
													                        <input value="<?php echo $row['id'];?>"  type="checkbox" class="impt_ckbox_bulk bulk_action_chkbox_chiled" />
													                        <label></label>
													                    </div>
															  		
															  		<!--<input type="checkbox"  class="impt_ckbox_bulk bulk_action_chkbox_chiled" />-->
															  	</td>
															    <td>
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	
															    </td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_category ">
						                                        	        <?php   
						                                        	           
						                                        	         $slid_str=$row['content'];
																			 if(!empty($slid_str)){
																			   	
																				 $sl_arr=explode("##",$slid_str);
																				
																			  if(!empty($sl_arr)){
																			   	
																				 for($i=0;$i<count($sl_arr);$i++){
																				 	    if(isset($result)&&!empty($result)){
                		           
																								foreach($result as $key2 => $row2){ 
																									 if($sl_arr[$i]==$row2['id']){   
																									?>
																									       
																									        <?php 
																				                                   if(isset($row2['m_file'])&&$row2['m_file']!=""){ ?>
																				                                   	   <span><img class="tble_thumb_img" height="50px" width="50px;" src="<?php echo base_url().$row2['m_file'];?>"></span>
																										    <?php  }else{ ?>
																												   	   	
																												   	        <span><img class="tble_thumb_img" height="50px" width="50px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png');?>"></span>
																												   	   
																									         <?php	} ?>
																									       
																									       
																									       
																									
																									
																									
																							<?php  	  } 
																								
																								 }
																								
																								
																		                	}else{ ?>
																		                		
																								
																		              <?php }
																				  }
																				 
																			   }else{ ?>
																			   	
																			   	 -
																				
																			  <?php  }
																				 
																			   }else{ ?>
																			   	
																			   	 -
																				
																			  <?php  }
						                                        	        
						                                        	        
						                                        	        
						                                        	         ?>
						                                                </div>
						                                           </article>
						                                        </td>
						                                        <td class="status-indication" >
															    	 <form id="status_change_<?php echo $row['id'];?>" method="post" action="<?php echo base_url();?>admin/slider-settings/sliders/status">
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
						                                        <td style="position:relative;">
						                                          <article>
						                                        	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/slider-settings/sliders/edit" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	 <a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/posts/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
						                                        	
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
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/slider-settings/sliders/save-slider">
                <div class="row">
                	    <h1 class="page-header">
                            <small>Add New Slider</small>
                        </h1>
	                    <div class="col-lg-4">
	
	                        
	
	                            <div class="form-group">
	                                <label>Slider Name</label>
	                                <input type="text" class="form-control" name="name" />
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                                <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            <?php echo $this->session->flashdata('validation');  ?>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="no-file"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please choose a file.</p>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> 
			                            	<?php echo $this->session->flashdata('file_error');?>
			                            	<?php echo $this->session->flashdata('error');?>
			                            </div>
			                            
			                        <?php }else{ ?>
			                        	
			                        	<p class="help-block">This will help you to search slider by name.</p>
			                        	
			                        <?php  }   ?>  
	                            </div>
	
	                            
	
	                           
	
	                        
	
	                    </div>
	                    <div class="col-lg-8">
	                         <div class="panel panel-info">
		                            <div class="panel-heading">
		                                <h3 class="panel-title">Selected Slides</h3>
		                            </div>
		                            <div class="panel-body">
		                            	<div class="row pnel_slctd_slides_f_sdr">
		                            		
		                            		
		                            		
		                            		
		                            	</div>
					                </div>
		                    </div>
	                            
	                            
	                    </div>
	                    
	                    
	                    
                    
                </div>
                <div class="row">
                	 <div class="col-lg-12">
                	        <input type="hidden" class="form-control" name="type" value="save" />
                	        <button type="submit" id="save_slider" data-config="save" class="btn btn-default">Save Slider</button>
			                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
				            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
                	
                	
                	</div>
                </div>	
                </form>
                <div style="margin-top: 0px;" class="row gallery_list">
                
	                <div class="panel panel-info pane-height-scroll">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Slides</h3>
                            </div>
                            <div class="panel-body">
                            		<div class="row re-append-to-p">
                                <?php if(isset($result)&&!empty($result)){
                		           
									foreach($result as $key => $row){ 
										    
										?>
										<div data-id="<?php echo $row['id'];?>" class="col-lg-2 img_gallery_set">
											       <div class="gallery-image-one center-cropped-g" style="background-image: url('<?php 
											                                   if(isset($row['m_file'])&&$row['m_file']!=""){
											                                   	   echo base_url($row['m_file']);
																			   }else{
																			   	   
																			   	   echo base_url('resource/backend/img/no_image_fount_220x220.png');
																				   
																				   
																			   } ?>');" >
																			   
											       	   
														<?php if(isset($row['name'])&&$row['name']!="") { ?>
											       	    	<div class="img_gllry_botton_title">
											       		        <?php echo $row['name'];  ?>
											       		    </div>
											       		<?php }   ?>														  
														   
														
												  
												           <span class="remove_g_image_spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
												           <span class="add_to_slider" data-id="<?php echo $row['id'];?>" title="Add to slider"><i class="fa fa-plus"></i></span>
												           <span style="display: none;" class="remove_from_slider" data-id="<?php echo $row['id'];?>" title="Remove slide"><i class="fa fa-close"></i></span>
												           <input type="hidden" class="form-control" name="sid[]" value="<?php echo $row['id'];?>" />   
														   
											       </div>
											      
										           
										</div>
										
								<?php  	   }
									
									
			                	}  ?>
			                	</div>
			                	<div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
			                </div>
			                
                    </div>
                </div>
                
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
		 
		}); 
	
     </script> 