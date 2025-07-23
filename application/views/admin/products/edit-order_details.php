     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Order Details
                            <small>Edit Order Details</small>
                            <!-- <a class="inner-settings" href="<?php echo base_url('admin/magazine/articles/settings')?>"><i class="fa fa-wrench"></i>Settings</a> -->
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-file"></i>  <a href="#">order_details</a>
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
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("admin/".$active."/".$actived."/edit_save");?>">
				
				<?php date_default_timezone_set('Asia/Kolkata');
				$date = date('m/d/Y h:i:s a', time()); ?>
				
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
			                <div class="row">
			                	<div class="col-lg-12">
			                		<input type="hidden" name="id" value="<?php echo $details[0]['id'] ;?>" >
			                		<input type="hidden" name="order_id" value="<?php echo $details[0]['order_id'] ;?>" >
									<div class="row">
			                			    <div class="col-lg-6">
												<div class="form-group">
													<label>Order Location</label>
													<input  class="form-control"  name="order_location"  value="<?php if(isset($details[0]['order_location']))echo $details[0]['order_location'] ?>" >
													
												</div>
											</div>
						                    <div class="col-lg-6">
												<div class="form-group">
													<label>Order Description</label>
													<input  class="form-control"  name="order_description"  value="<?php if(isset($details[0]['order_description']))echo $details[0]['order_description'] ?>" >
													
												</div>
											</div>
										   
						            </div>
									<div class="row">
			                			    <div class="col-lg-6">
												<div class="form-group">
													<label>Date</label>
													<input  class="form-control datetimepicker"  name="date"  value="<?php if(isset($details[0]['date']))echo $details[0]['date'] ?>">
													
												</div>
											</div>
						                    <div class="col-lg-6">
												<div class="form-group">
													<label>Time</label>
													<input  class="form-control"  name="time"  value="<?php if(isset($details[0]['time']))echo $details[0]['time'] ?>">
													
												</div>
											</div>
										   
						            </div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="form-group">
													<label>Next step</label>
													<input  class="form-control"  name="next_step"  value="<?php if(isset($details[0]['next_step']))echo $details[0]['next_step'] ?>" >
													
												</div>
												
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="form-group">
													<label>Further Details</label>
										            <textarea id="further_details" class="form-control"  name="further_details"><?php if(isset($details[0]['further_details']))echo $details[0]['further_details'];?></textarea>
										        </div>
										    </div>  
										 </div>   
									</div>	
						            <div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Piece</label>
												<input  class="form-control"  name="piece"  value="<?php if(isset($details[0]['piece']))echo $details[0]['piece'] ?>">
												
											</div>
										</div>
										<div class="col-lg-6">
										 <?php $status= $details[0]['status'] ; ?>
											<div class="form-group">
												<label>Select status</label>
												<select  class="form-control"  name="status">
													<option value="0" <?php if($status==0) ?> selected > Clearance event</option>
													<option value="2" <?php if($status==2) ?> selected > In-transit</option>
													<option value="1" <?php if($status==1) ?> selected > Delivered</option>
																															
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
    
    <script type="text/javascript">$(document).ready(function(){$('.nicEdit-main').html($('#sp_co').html());});</script>
    <script type="text/javascript">$(document).ready(function(){$('.remv_feat_img').show();});</script>