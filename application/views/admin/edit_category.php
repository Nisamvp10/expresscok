     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo (isset($mode))?$mode:"";  ?>
                            <small>Edit Category</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                            	
                                <i class="fa fa-book"></i> <a href="<?php echo base_url();?><?php echo (isset($rurl))?dirname($rurl):""  ?>"><?php echo (isset($mode))?$mode:"";?></a>
                            </li>
                            <li class="active">
                            	
                                <i class="fa fa-book"></i> <a href="<?php echo base_url();?><?php echo (isset($rurl))?$rurl:""  ?>">Category</a>
                            </li>
                            
                            <li class="active">
                                <i class="fa fa-file"></i>Edit
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
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/category/update">
	                    <div class="col-lg-5">
	
	                        
	
	                            <div class="form-group">
	                                <label>Edit Category Name</label>
	                                <input type="text" class="form-control" value="<?php echo (isset($result[0]['name']))?$result[0]['name']:"";  ?>" name="name">
	                                <input type="hidden" value="<?php echo (isset($result[0]['id']))?$result[0]['id']:"";?>" class="form-control" name="id">
	                                <input type="hidden" value="<?php echo $rurl;?>" class="form-control" name="rurl">
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
	                            <?php if(isset($mode)&&(strtolower($mode)=="bhodhitreebooks")){ ?>
	                            			<div class="form-group">
										         <label class="landline fibl">Select Slider</label>
										         <select id="category" class="form-control"  name="meta_id">
										                                	     <?php if(isset($slider_result)){
																							foreach($slider_result as $key => $row){ 
																								?>
																								
																								<option <?php echo (isset($result[0]['meta_id'])&&$result[0]['meta_id']==$row['id'])?"selected":"";?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
																								
																								
																				 <?php  }   }  ?>				
																								
										         </select>	                      
										    </div>
	                            <?php } 
								 ?>
	                            
	
	                           
	
	                        
	
	                    </div>
	                    <div class="col-lg-4">
	                            <div class="form-group">
	                                <label>Change Image File</label>
	                                <input type="file" class="img_tag"  name="file" accept="image/*" >
	                                <input type="hidden" value="<?php echo (isset($result[0]['file']))?$result[0]['file']:"";?>" class="form-control" name="e_file">
	                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
	                            </div>
	
	                            
	                            
	                            <button type="submit" class="btn btn-default spin-waiter">Save Changes</button>
	                            <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
	
	                    </div>
	                    <div class="col-lg-3">
	                    	    
	                    	    <div class="panel panel-primary panel-course-cate">
					                              <div class="panel-heading">
					                                <h3 class="panel-title">Image</h3>
					                              </div>
							                      <div class="panel-body">
							                            	<?php if(isset($result[0]['m_file'])&&$result[0]['m_file']!=""){?>
							                            	<div class="form-group ex_image_holder">	
							                            		<div style="position: relative;">
							                            			
								                            		<img src="<?php echo base_url().$result[0]['m_file']; ?>" width="100%" />
								                            		<div  class="remove_c_image_spin"  title="Please Wait.."><div style="position: relative;height: 100%;width: 100%;"><i class="fa fa-refresh fa-spin"></i></div></div>
							                            		
							                            		
							                            		</div>
							                            		<div class="remv_feat_img">
							                            			
							                            			<a id="rmove_co_img" data-id="<?php echo (isset($result[0]['id']))?$result[0]['id']:""; ?>" href="<?php echo base_url('admin/remove-image/posts');?>">Remove featured image.</a>
								                            		 
							                            		</div>
							                            		
							                            	</div>	
							                            	<div class="lib_image_holder">
	                                
	                                
	                                
	                                                        </div>
							                            		
							                            <?php  	}else{ ?>
							                            	 <div class="form-group ex_image_holder">	
							                            		 <img  width="100%" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
							                            		
							                            	</div>	
							                            	<div class="lib_image_holder">
	                                
	                                
	                                
	                                                        </div>
															      
															      
							                           <?php   }
															 ?>
							                            	
										       </div>
								 </div>
	                    	
	                            <!--<div class="form-group ex_image_holder">
	                            	<?php if((isset($result[0]['m_file'])&&$result[0]['m_file']!="")){ ?>
	                            		
										 <img height="120px" width="139px;" src="<?php echo base_url().$result[0]['m_file'];?>">
										
	                            	<?php  }else{ 
									 ?>
									     <img height="110px" width="110px;" src="<?php echo base_url('resource/backend/img/no_image_fount_220x220.png'); ?>">
									  
									 <?php }  ?>
	                               
	                            </div>
	                            <div class="lib_image_holder">
	                                
	                                
	                                
	                            </div>-->
	                            
	                    </div>
                    </form>
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
    <script src="<?php echo resource();?>lib/js/jquery.js"></script>
    <script type="text/javascript">$(document).ready(function(){$('.remv_feat_img').show();});</script>