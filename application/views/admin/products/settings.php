     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo ucfirst(str_replace("-"," ",$active));?>
                            <small><?php if(isset($active))echo ucfirst(str_replace("-"," ",$actived)); ?> Settings</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>
                                <a href="<?php echo base_url('admin/'.$active.'/'.$actived); ?>" >
                                       <?php echo ucfirst($actived);?>
                                </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Settings
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
	                	              <div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Manage product Slider Image</h3>
					                            </div>
					                            <div class="panel-body">
					                            	   
						                                <div class="row">	
						                                	    <?php  $sdata=array(); 
																       if(isset($result[0]['meta_files'])){
																       	  $sdata=json_decode($result[0]['meta_files'],TRUE);
																       }
																	   
																	    ?>	
											                    <div class="col-lg-12 mang_p_img_n_qty_img_hldr">
											                    	  <div  class="row mang_p_img_n_qty_img_hldr_rw">
											                    	  	     <?php if(!empty($sdata)){
																					foreach($sdata as $i =>$sval){ ?>
																						 
																						 <div class="col-lg-2 mang_p_img_n_qty_img_hldr_ind">
											                    	           	             <img src="<?php echo base_url($sval);?>" width='100%' />
											                    	           	              <span class="remove_mltsldrim_image" data-order="<?php echo $i;?>" data-id="<?php echo $result[0]['id']; ?>" title="Delete"><i class="fa fa-close"></i></span>
											                    	           	              <span class="remove_g_image_spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
											                    	                      </div>
																						
																			<?php	}
																				
											                    	  	     }else{ ?>
											                    	  	     	
																				<div class="mang_p_img_n_qty_img_hldr_nthing">
																					
																					<div>No image found. Upload Image Below</div>
																				</div>
																				
																				
											                    	  	     <?php }  ?>
											                    	           	
											                         </div>
											                    </div>
											                    <form enctype="multipart/form-data" method="post" action="">
												                    <div class="col-lg-12">
												                           <div class="col-lg-6 col-sm-6 col-12 prgrs_hlder">
																		            <h4>Upload product slider image.</h4>
																		            <div class="input-group">
																		                <span class="input-group-btn">
																		                    <span class="btn btn-primary btn-file fileuploadwithprgrssbr">
																		                        Browse&hellip; <input type="file" class="upfile" name="file">
																		                        <input type="hidden" value="<?php echo $result[0]['id'];?>" class="form-control post_id" name="post_id">
																		                    </span>
																		                </span>
																		                <input type="text" class="form-control" readonly>
																		            </div>
																		            <div class="progress">
																					  <div class="progress-bar progress-bar-striped active" role="progressbar"
																					  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
																					    0%
																					  </div>
																					</div>
																		            <span class="help-block">
																		               Recommended dimension is 1419 X 3041 and its multiples.Try to upload image with smaller in size(Less then 100 Kb).
																		            </span>
																		            
																		            
		                                
																		    </div>
																		   	
															               
												                    </div>
												                    <div  class="col-lg-12">
															                	 <div class="msg-div"></div> 
								                	                                      
															         </div>	
											                    </form>
											                    
											            </div>
								                </div>
								                
					                    </div>
	               </div>
	               
	               <div class="row gallery_list">
	                	
	               </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   <script src="<?php echo resource();?>lib/js/jquery.js"></script>
   <script type="text/javascript">
   	   
   	   var $prgss,$prgssbr;
	   $(document).ready( function() {
	   	    $(document).on('change', '.fileuploadwithprgrssbr :file', function() {
	   	      $('.msg-div').empty();
	   	      $prgss=$(this).closest('.prgrs_hlder').find('.progress');
	   	      $prgssbr=$(this).closest('.prgrs_hlder').find('.progress-bar');
	   	      $prgss.show();
	   	      var post_id=$(this).closest('.fileuploadwithprgrssbr').find('.post_id').val();	
			  var input = $(this),
			      numFiles = input.get(0).files ? input.get(0).files.length : 1,
			      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			      input.trigger('fileselect', [numFiles, label]);
			      input.prop('disabled',true);
			      var url=config.base.concat("admin/products/products/update-images");
					   	    	            var formObj=new FormData();
									        var fileId = this;
					                        formObj.append('file', fileId.files[0]);
					                        formObj.append('id',post_id);
									        formObj.append(config.name,config.value);
									        var ajaxReq;
									        try
									        {
											   ajaxReq = new XMLHttpRequest();
										    } 
										    catch(e)
										    { 
										    try{ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");} 
											    	catch (e) { try{ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");} catch (e)
																 {alert("Your browser does not support image upload at this environment.Please update your browser into latest version.");
																	 return false;} }
										    } 
										    ajaxReq.upload.addEventListener("progress", progressHandler, false);
                                            ajaxReq.addEventListener("load", completeHandler, false);
										    ajaxReq.open('POST', url);
									        ajaxReq.setRequestHeader('Cache-Control', 'no-cache');
									        ajaxReq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				                            
									        ajaxReq.send(formObj); 
											ajaxReq.onreadystatechange=function()
									  		{
									  			save_customize_action=false;
									  			if (ajaxReq.readyState==4 && ajaxReq.status==200)
									    		{
									    				
									    				var a=ajaxReq.responseText;
									    				var jsonData=JSON.parse(a);
									                   
									    				if(jsonData.status=="202"){
									    					    $prgss.hide();
									    				        $prgssbr.width('0%');
									    				        $prgssbr.text('0%');
									    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
									    						$('.msg-div').append($('<p class="success-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
									    						setTimeout(function(){
									    							window.location.reload(true);
									    						},2000);
									    						
									    					
									    							    					
									    				}else if(jsonData.status=="203"){
									    					 input.prop('disabled',false);
									    					 $prgss.hide();
									    				     $prgssbr.width('0%');
									    				     $prgssbr.text('0%');
									    					 $('#n_message').append($('<span class="error-message"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
												   	         $('.msg-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
												   	         $('.msg-div').append($(jsonData.error).fadeIn('slow'));
												   	         
									    					
									    				}else{
									    					 input.prop('disabled',false);
									    					 $prgss.hide();
									    				     $prgssbr.width('0%');
									    				     $prgssbr.text('0%');
									    					 $('#n_message').append($('<span class="error-message"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
									    					 
									    					 if(jsonData.error){
									    					 	$('.msg-div').append($(jsonData.error).fadeIn('slow'));
									    					 }
									    					
									    					
									    				}
									    				 setTimeout(function(){
									    							$('.msg-div').empty();
									    				 },7000);
									    				
									    				
									           }
									           
									            
									        }
			      
			      
		    });
		    $('.fileuploadwithprgrssbr :file').on('fileselect', function(event, numFiles, label) {
		        
		        var input = $(this).parents('.input-group').find(':text'),
		            log = numFiles > 1 ? numFiles + ' files selected' : label;
		        
		        if( input.length ) {
		            input.val(log);
		        } 
		        
		    });
		    function progressHandler(event){
			    var percent = (event.loaded / event.total) * 100;
			    $prgssbr.text(percent+'%');
			    $prgssbr.width(percent+'%');
			}
			function completeHandler(){
			  
			    $prgssbr.width('100%');
			}
			$(document).on('click','.remove_mltsldrim_image',function(){
				$('.remove_mltsldrim_image').attr('disabled','disabled');
				var obj=$(this);
				$(this).closest('.mang_p_img_n_qty_img_hldr_ind').find('.remove_g_image_spin').show("slow","swing");
			    var id=$(this).attr('data-id');
			    var order=$(this).attr('data-order');  
				var url=config.base.concat("admin/products/products/delete-image");
				var _token=config.name;
			    var _data={};
				_data['id']=id;
				_data['order']=order;
				_data[_token]=config.value;
				 $.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
							if(data!=null){
									if(data.status=="202"){
										obj.closest('.mang_p_img_n_qty_img_hldr_ind').find('.remove_g_image_spin').empty();
										obj.closest('.mang_p_img_n_qty_img_hldr_ind').remove();
										$('.remove_mltsldrim_image').removeAttr('disabled');
										obj.remove();
										
										
									}else{
										$('.remove_mltsldrim_image').removeAttr('disabled');
										obj.closest('.mang_p_img_n_qty_img_hldr_ind').find('.remove_g_image_spin').hide();
									}	    
											         	  
					 		}else{
					 			window.location.reload(true);
					 		}
				      },error: function(xhr, textStatus, errorThrown) {
									             alert(errorThrown);
									             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
									             obj.closest('.mang_p_img_n_qty_img_hldr_ind').find('.remove_g_image_spin').hide();
									             $('.remove_mltsldrim_image').removeAttr('disabled');
					 }
					
				   });
					return false;
			});
			$(document).on('click','.mang_p_img_n_qty_img_hldr_nthing',function(){
				
				$(this).closest('.panel-body').find('.upfile').trigger('click');
				
			});
					    
		});
   	
   	
   </script>