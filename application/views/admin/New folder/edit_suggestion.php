     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Bodhitree Books - Suggestion
                            <small>Edit Suggestion</small>
                            <!-- <a class="inner-settings" href="<?php echo base_url('admin/magazine/articles/settings')?>"><i class="fa fa-wrench"></i>Settings</a> -->
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Suggestion
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
                <form role="form" enctype="multipart/form-data" method="post" id="custom_fom" action="<?php echo base_url("admin/suggestion/save");?>">
			                <div class="row">
			                	<div class="col-lg-12">
			                		
			                		<div class="row">
			                			  <div class="col-lg-6">
							               	            <div class="form-group">
							                                <label>Title</label>
							                                <input id="name" value="<?php if(isset($result_id[0]['name']))echo $result_id[0]['name'];?>" class="form-control"  name="name">
							                                <input type="file" id="file"  class="form-control" style="display: none;"   name="file">
							                            </div>
							               </div>
						                   <div class="col-lg-6">
												<div class="form-group">
													<label class="landline fibl">Select Auther</label>
													<select id="meta_id" class="form-control"  name="meta_id">
															<?php 	if(isset($author_list)){
																	foreach($author_list as $key => $row){ 
																		?>
																	<option <?php if(isset($result_id[0]['meta_id'])&&$result_id[0]['meta_id']==$row['id'])echo "selected";  ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
															<?php  }   }  ?>				
													</select>	
												</div>
											</div>
											
						                   
						                    
						                    
						            </div>
							        <div class="row"> 
							        	<div class="col-lg-6">
												<div class="form-group">
													<label class="landline fibl">Select Book</label>
													<select id="meta_file" class="form-control"  name="meta_file">
																
																<?php 
																    if(isset($books)&&!empty($books)){
																     foreach ($books as $lkey => $lvalue) { ?>
																      	<option <?php if(isset($result_id[0]['meta_file'])&&$result_id[0]['meta_file']==$lvalue['id'])echo "selected";  ?> value="<?php echo $lvalue['id'];?>"><?php echo $lvalue['name'];?></option> 
																
																<?php }
																	
																	}  ?>
			
													</select>	
												</div>
										 </div>  
							        	
							        </div>	  
						            <div class="row editer-contner">
						            	
							                                   <div class="col-lg-12">
											
											                            <div class="form-group">
											                                <label>Description</label>
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
				                <button type="submit" id="save_custom_values" data-url="<?php echo base_url("admin/suggestion/save");?>" data-id="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:"";?>"  data-config="edit" class="btn btn-default">Update Details</button>
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