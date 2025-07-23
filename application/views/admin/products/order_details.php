     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Express International- Order details
                            <small>Add New Item</small>
                            
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Order
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
				
				<?php date_default_timezone_set('Asia/Kolkata');
				$date = date('m/d/Y h:i:s a', time()); ?>
				
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
			                <div class="row">
			                	<div class="col-lg-12">
			                		<?php if(isset($id)&&!empty($id)){ ?> 
			                		<input type="hidden" name="order_id" value="<?php echo $id ;?>" >
									<?php } ?>
									<div class="row">
			                			    <div class="col-lg-6">
												<div class="form-group">
													<label>Order Location</label>
													<input  class="form-control"  name="order_location">
													
												</div>
											</div>
						                    <div class="col-lg-6">
												<div class="form-group">
													<label>Order Description</label>
													<input  class="form-control"  name="order_description">
													
												</div>
											</div>
										   
						            </div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Date</label>
												<input  class="form-control datetimepicker"  name="date">
												
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Time</label>
												<input  class="form-control"  name="time">
												
											</div>
										</div>
										   
						            </div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="form-group">
													<label>Next step</label>
													<input  class="form-control"  name="next_step">
													
												</div>
												
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="form-group">
													<label>Further Details</label>
													<textarea id="further_details" class="form-control"  name="further_details"></textarea>
													
												</div>
												
											</div>
										</div>
									</div>	
						            <div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Piece</label>
												<input  class="form-control"  name="piece">
												
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Status</label>
												<select name="status" class="form-control" >
													<option value="0">Clearance event</option>
													<option value="2">In-transit</option>
													<option value="1">Delivered</option>
													
												</select>
											</div>
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
				                <button type="submit"   data-config="save" class="btn btn-default">Save Details</button>
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
                
	                <div id="search_id" class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Products</h3>
                                
                                	
                            </div>
                           
											
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Order Id</th>
			                                        <th>Order Location</th>
			                                        <th>Order Description</th>
													<th>Date</th>
			                                        <th>Time</th>
			                                       
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    
			                                        
					                               <?php if(isset($details)&&!empty($details)){
					                		           
														foreach($details as $key => $row){
															 
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
															    	<article><div class="tble_name"><?php echo $row['order_name']; ?></div></article>
															        
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url("admin/".$active."/".$actived."/edit");?>" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/'.$actived.'/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	
															    	<br/>
															    	<div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
															    <td><article><div class="tble_content_edtd">
						                                        	<span><?php echo $row['order_location']; ?></span>
						                                        	
						                                        </div></article>
						                                        </td>
						                                        <td><article><div class="tble_category_edt">
																	<span><?php echo $row['order_description']; ?></span>
						                                        </div></article></td>
						                                        <td><article><div class="tble_category_edt">
						                                        	<span><?php echo $row['date']; ?></span>
						                                        </div></article></td>
																
						                                       
						                                         <td><article><div class="tble_category_edt">
						                                        	<span><?php echo $row['time']; ?></span>
						                                        </div></article></td>
						                                       
						                                        
															    
														      </tr>
															
														<?php  }
														
														
								                	}  ?>
			                                        
			                                    
			                                    
			                                </tbody>
			                            </table>
			                     </div>
			                     
                                 
                               
			                	 <div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
			                </div>
			                
			                
                    </div>
                </div>
                
                <!-- /.row -->
                 <!--***********************************************************************************Modal Start Here***********************************************************-->
                       
						
             <!--***********************************************************************************Modal End***********************************************************--> 		
                	
                	<!--***********************************************************************************Media Meta Modal Start Here***********************************************************-->
                      
						
						
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
    var s_f_jsa=null;
	<?php if(isset($subcategory)&&!empty($subcategory)){ ?>
		s_f_jsa=<?php echo json_encode($subcategory); ?>;
	<?php }  ?>
	
	
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