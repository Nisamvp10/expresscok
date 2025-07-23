     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home Tiles
                            <small>Add New Tile</small> 
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/<?php echo(isset($active))?$active:"home-builder";?>/tiles">Home Tiles</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add New Tile
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
                <form role="form" enctype="multipart/form-data" method="post" action="#">
			                <div class="row">
			                	<div class="col-lg-8">
			                		<!--<p class="bg-info info"><i class="fa fa-info"></i>Recommended Image Size for Tile is </p>-->
			                		<div class="row">
						                  <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Title</label>
						                                <input id="name" class="form-control"  name="name">
						                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                <input type="hidden" value="<?php echo $mode;  ?>" id="mode" class="form-control"  name="mode">
						                                
						                            </div>
						
						                    </div>
						                    <div class="col-lg-6">
						                            <div class="form-group">
						                                <label>Image File</label>
						                                <input type="file" class="img_tag" name="file" id="file" accept="image/*" />
						                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
						                                <button style="margin-top: 5px;" type="button" class="btn btn-info" data-toggle="modal" data-target="#mysizechart">View Image Size Chart</button>
						                            </div>
						                    </div>
						                   
						            </div>
						            <div class="row">
						                    <div class="col-lg-6">
						                    	
						                            <div class="form-group">
						                                <label>Redirect Url</label>
						                                <input id="url" class="form-control"  name="url">
						                            </div>
						                           
						                    </div>
						                    <div class="col-lg-3">
						                    	
						                            <div class="form-group">
						                                <label>Background Color</label>
						                                <input id="bgcolor" type="color" class="form-control"  name="bgcolor">
						                            </div>
						                           
						                    </div>
						                    <div class="col-lg-3">
						                    	
						                            <div class="form-group">
						                                <label>Font Color</label>
						                                <input id="fcolor" type="color" class="form-control"  name="fcolor">
						                            </div>
						                           
						                    </div>
						            </div>
								    
								            
						            <div class="row">
						                    <div class="col-lg-12">
						
						                            <div class="form-group">
						                                <label>Description</label>
						                                <textarea name="content" id="post_description" class="form-control" rows="15"></textarea>
						                            </div>
						                    <div class="error-div"></div> 
						                    <div class="succ-div"></div> 
						                    </div>
						                    
						            </div>          
				             </div>       
				             <div class="col-lg-4">
				                           <div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Change Tiles Order</h3>
					                            </div>
					                            <div class="panel-body">
					                            	<div class="row grid tile_p_body">
					                            	
					                            	       <?php if(isset($result)){
					                            	       
																foreach($result as $key=> $row){ ?>
																	
																<div data-id="<?php echo $row['id'];?>" class="well tile_item"><?php echo $row['name'];?></div>
																		   
																	
																	
															<?php  }
						                                	} 
															 ?>
					                            	  
													  </div>
													  <div class="row">
													  	<div class="col-lg-12">
													         <button type="button" id="save_tile_order" data-config="save" class="btn btn-default">Save Details</button>
													         <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
													         <span class="remove_g_image_spin_s_2"  title="success"><i class="fa fa-check"></i>Successfully Saved</span>
													         <span class="remove_g_image_spin_s_3"  title="error"><i class="fa fa-close"></i>Could't save,Try again.</span>
													     </div>
					                            	  </div>
								                </div>
								                
					                    </div>
				  
				             </div>
			                   
			             </div>
	                <button type="submit" id="save_tile" data-config="save" class="btn btn-default">Save Details</button>
	                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
		            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
		            
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
                	
             <div id="mysizechart" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Home Tiles - Image Dimensions</h4>
			      </div>
			      <div class="modal-body">
				        <ul class="list-group">
						  <li style="border-color: #6992B5;" class="list-group-item active">Tile Left One - 296 X 405</li>
						  <li style="border-color: #6992B5;" class="list-group-item active">Tile Left Two - 296 X 405</li>
						  <li style="border-color: #6992B5;" class="list-group-item active">Tile Three - 889 X 90</li>
						  <li style="border-color: #6992B5;" class="list-group-item active">Tile Four - 889 X 90</li>
						  <li style="border-color: #6992B5;" class="list-group-item active">Tile Five - 889 X 90</li>
						</ul>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			
			  </div>
			</div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/nicEdit.js"></script>
    
    <script type="text/javascript"> 
       new nicEditor({
			fullPanel : true
		}).panelInstance('post_description');
        
        
    </script>