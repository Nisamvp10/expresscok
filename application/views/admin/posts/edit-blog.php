     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Bodhtree Books
                            <small>Edit Blog</small>
                            <!-- <a class="inner-settings" href="<?php echo base_url('admin/magazine/articles/settings')?>"><i class="fa fa-wrench"></i>Settings</a> -->
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-file"></i>  <a href="<?php echo base_url();?>admin/bodhitreebooks/blog/create#search_id">Blog</a>
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
			                	
			                	<div class="col-lg-12">
			                		
			                		<div class="row">
			                			    <div class="col-lg-6">
							               	            <div class="form-group">
							                                <label>Blog Tittle</label>
							                                <input id="name" value="<?php if(isset($result_id[0]['name']))echo $result_id[0]['name'];?>" class="form-control"  name="name">
							                                
							                                
							                            </div>
							              </div>
						                    <div class="col-lg-6">              
						                    	        <div class="form-group">
							                                <label>Small description(Optional-Maximum Character 200)</label>
							                                <textarea id="meta_content" class="form-control"  name="meta_content"><?php if(isset($result_id[0]['meta_content']))echo $result_id[0]['meta_content'];?></textarea>
							                                
							                            </div>
							                </div>
											
						                   
						                    
						                    
						            </div>
						            <div class="row">
							              <div class="col-lg-6">
														<div class="form-group">
															<label class="landline fibl">Select Author</label>
															<select id="author" class="form-control"  name="meta_id">
																<option value="">--Author--</option>
																<?php 
																	if(isset($author_list)){
																	foreach($author_list as $key => $row){ 
																?>
																	<option <?php if(isset($result_id[0]['meta_id'])&&$result_id[0]['meta_id']==$row['id'])echo "selected";?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
																<?php  }   }  ?>				
															</select>	
														</div>
										   </div> 
										   <div class="col-lg-4">
												       <div class="form-group">
												            <label>Product Featured Image</label>
												            <input id="file" class="img_tag" type="file" name="file" accept="image/*"  >
												            <input type="hidden" value="<?php echo (isset($result_id[0]['file']))?$result_id[0]['file']:"";?>" class="form-control" id="e_file" name="e_file">
												            <p class="bg-info info font-small"><i class="fa fa-info"></i>
																This image will show as a post thumbnail.(Recommended dimension is 570 X 492 and its multiples)
															</p>
												       </div>
												       <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
												   </div>
												   <div class="col-lg-2">
														                              <?php if(isset($result_id[0]['m_file'])&&$result_id[0]['m_file']!=""){ ?>
																                            	<div class="form-group ex_image_holder">	
																                            		<div style="position: relative;">
																                            			
																	                            		<img src="<?php echo base_url().$result_id[0]['m_file']; ?>" width="100%" />
																	                            		<div  class="remove_c_image_spin"  title="Please Wait.."><div style="position: relative;height: 100%;width: 100%;"><i class="fa fa-refresh fa-spin"></i></div></div>
																                            		
																                            		
																                            		</div>
																                            		<div class="remv_feat_img">
																                            			
																                            			<a id="rmove_co_img" data-field="file" data-id="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:""; ?>" href="<?php echo base_url('admin/remove-image/posts');?>">Remove image.</a>
																	                            		 
																                            		</div>
																                            		
																                            	</div>	
																                            	<div class="lib_image_holder">
										                                
										                                
										                                
										                                                        </div>
																                            		
																                            <?php  	}else{ ?>
																                            	 <div class="form-group ex_image_holder">	
																                            		 <img  width="50%" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
																                            		
																                            	</div>	
																                            	<div class="lib_image_holder">
										                                
										                                
										                                
										                                                        </div>
																								      
																								      
																                           <?php   }
																								 ?>
										     </div>
										     <div class="col-lg-6">
														<div class="form-group">
															<label>Blog Post Date</label>
															<div class='input-group date datetimepicker' >
																<input type="text" id="meta_file" value="<?php if(isset($result_id[0]['meta_file']))echo $result_id[0]['meta_file'];?>" class="form-control"  name="meta_file">
																<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
														
											</div>
							                       
							        </div>
							       
							        
							        
							             
							      
						                   
						          <div class="row editer-contner">
						            	
							                                   <div class="col-lg-12">
											
											                            <div class="form-group">
											                                <label>Specification And Description</label>
											                                <textarea name="content" id="post_description" class="form-control" rows="20">Loading...</textarea>
											                            </div>
											                    <div class="error-div"></div> 
											                    <div class="succ-div"></div> 
											                    </div>
						                    
						           </div>   
						           
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
     <article id="sp_co" style="display: none;">
    	  <?php echo isset($result_id[0]['content'])?$result_id[0]['content']:""; ?>
    </article>
 
    <script type="text/javascript">$(document).ready(function(){$('.nicEdit-main').html($('#sp_co').html());});</script>
    <script type="text/javascript">$(document).ready(function(){$('.remv_feat_img').show();});</script>