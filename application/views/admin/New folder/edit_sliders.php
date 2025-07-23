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
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/slider-settings/sliders">Sliders</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Edit
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
                
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/slider-settings/sliders/edit/update-slider">
                <div class="row">
                	    <h1 class="page-header">
                            <small>Edit Slider </small>
                        </h1>
	                    <div class="col-lg-4">
	
	                        
	
	                            <div class="form-group">
	                                <label>Slider Name</label>
	                                <input type="text" class="form-control" value="<?php echo (isset($result_id[0]['name']))?$result_id[0]['name']:"";?>" name="name" />
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                                <input type="hidden" name="id" value="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:"";?>">
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
		                            		  
		                            		  <?php $ids=array(); if(isset($slides_result)&&!empty($slides_result)){
                		                            $order=explode("##",$slides_result[0]['slider_order']);
													for ($i=0; $i <count($order) ; $i++) { 
														
													
													foreach($slides_result as $key => $row){
														
														    array_push($ids,$row['id']);
														   if(!empty($row['id'])&&($row['id']==$order[$i])){
														?>
														<div data-id="<?php echo $row['id'];?>" class="col-lg-3 img_gallery_set">
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
															           <span style="display: none;"  class="add_to_slider" data-id="<?php echo $row['id'];?>" title="Add to slider"><i class="fa fa-plus"></i></span>
															           <span class="remove_from_slider" data-id="<?php echo $row['id'];?>" title="Remove slide"><i class="fa fa-close"></i></span>
															           <input type="hidden" class="form-control" name="sid[]" value="<?php echo $row['id'];?>" />   
																	   
														       </div>
														      
													           
													     </div>
														
												<?php  unset($row[$key]);break;	}   } }

                                                
													
													
							                	}  ?>
		                            		
		                            		
		                            		
		                            		
		                            		
		                            	</div>
					                </div>
		                    </div>
	                            
	                            
	                    </div>
	                    
	                    
	                    
                    
                </div>
                <div class="row">
                	 <div class="col-lg-12">
                	        <input type="hidden" class="form-control" name="type" value="save" />
                	        <button type="submit" id="save_slider" data-config="save" class="btn btn-default spin-waiter">Save Slider</button>
			                <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
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
										foreach($result as $key => $row2){ 
											    if(in_array($row2['id'], $ids)){ 
											    }else{  ?> 
											<div data-id="<?php echo $row2['id'];?>" class="col-lg-2 img_gallery_set">
												       <div class="gallery-image-one center-cropped-g" style="background-image: url('<?php 
											                                   if(isset($row2['m_file'])&&$row2['m_file']!=""){
											                                   	   echo base_url($row2['m_file']);
																			   }else{
																			   	   
																			   	   echo base_url('resource/backend/img/no_image_fount_220x220.png');
																				   
																				   
																			   } ?>');" >
																			   
											       	  
															<?php if(isset($row2['name'])&&$row2['name']!="") { ?>
												       	    	<div class="img_gllry_botton_title">
												       		        <?php echo $row2['name'];  ?>
												       		    </div>
												       		<?php }   ?>														  
															   
															
													  
													           <span class="remove_g_image_spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
													           <span class="add_to_slider" data-id="<?php echo $row2['id'];?>" title="Add to slider"><i class="fa fa-plus"></i></span>
													           <span style="display: none;" class="remove_from_slider" data-id="<?php echo $row2['id'];?>" title="Remove slide"><i class="fa fa-close"></i></span>
													           <input type="hidden" class="form-control" name="sid[]" value="<?php echo $row2['id'];?>" />   
															   
												       </div>
												      
											           
											</div>
											
									<?php  	}   }
									
									
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