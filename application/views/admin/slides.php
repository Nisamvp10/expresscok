<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Slides
                            <small>Add New Slide</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Slides
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
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/slider-settings/slides/save-slide-image">
	                    <div class="col-lg-5">
	                            <div class="form-group">
	                                <label>Slide Name</label>
	                                <input class="form-control" name="name">
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                               
	                            </div>
	                            <div class="form-group">
	                               
	                               
	                                <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="no-file"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please choose a file.</p>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> 
			                            	<?php echo $this->session->flashdata('file_error');?>
			                            	<?php echo $this->session->flashdata('error');?>
			                            </div>
			                            
			                        <?php }else{ ?>
			                        	
			                        	<p class="help-block">Only one media file is allowed.Either image or Video.</p>
			                        	
			                        <?php  }   ?>  
	                            </div>
	
	                            
	
	                           
	
	                        
	
	                    </div>
	                    <div class="col-lg-4">
	                            <div class="form-group">
	                                <label>Image File</label>
	                                <input type="file" class="img_tag" name="file" accept="image/*" />
	                                <p class="help-block">Recommended Image Dimension is 781 X 445.</p>
	                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
	                            </div>
	
	                            
	                            <button type="submit" class="btn btn-default spin-waiter">Save Slide</button>
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
                                <h3 class="panel-title">All Slides</h3>
                            </div>
                            <div class="panel-body">
                            		<div class="row">
                                <?php if(isset($result)&&!empty($result)){
                		           
									foreach($result as $key => $row){ 
										    
										?>
										<div class="col-lg-2 img_gallery_set">
											       <div class="gallery-image-one center-cropped-g" style="background-image: url('<?php 
											                                   if(isset($row['m_file'])&&$row['m_file']!=""){
											                                   	   echo base_url($row['m_file']);
																			   }else{
																			   	   
																			   	   echo base_url('resource/frontend/images/no_image_fount_220x220.png');
																				   
																				   
																			   } ?>');" >
														
														<div class="img_gllry_botton_title">
															<?php echo $row['name'];  ?>
														</div>															  
														<span class="remove_g_image_spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
											            <span class="remove_g_image" data-id="<?php echo $row['id'];?>" title="Delete"><i class="fa fa-close"></i></span>
											           
											            <span class="edit_g_image" data-id="<?php echo base_url()."admin/slider-settings/slides/edit/".$row['id'];?>" title="Edit Slide"><i class="fa fa-pencil"></i></span>   
											       </div>
										           
										           
										</div>
										
								<?php  	   }
									
									
			                	}  ?>
			                	</div>
			                	<div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
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