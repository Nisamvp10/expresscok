     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo ucfirst(str_replace("-"," ", $active));  ?>
                            <small>Settings</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <?php echo ucfirst($active);?>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Settings
                            </li>
                            <?php if($this->session->flashdata('success')||$this->session->flashdata('ssuccess')){  ?>
	                                  <li id="success_message">
			                             <span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>      
			                          </li>
	                        <?php }elseif($this->session->flashdata('error')||$this->session->flashdata('eerror')){ ?>
	                        	      
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
	                	<div style="margin-right: 2%;" class="col-lg-5">
	                		
		                		 <div class="row">
		                		 	   <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/web-settings/'.$active.'/slider/save');?>">
		                		 	   <div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Select Slider</h3>
					                                
					                            </div>
					                            <div class="panel-body">
									                	<div class="col-lg-12">
															 <div class="form-group">
											                                <label>Choose Slider</label>
											                                <select name="slider" id="slider" class="form-control">
											                                	<option value="">-Choose One--</option>
											                                	<?php if(isset($all_slider)){
																					foreach($all_slider as $row){ ?>
																						
																						
																						<option <?php if(isset($slider_result[0]['meta_id'])&&$row['id']==$slider_result[0]['meta_id']){ echo "selected";}  ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
																						
																						
																				<?php  }
											                                	} 
																				 ?>
											                                </select>
											                  </div>
															  <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
														      <input  type="hidden" name="mode" value="<?php echo isset($mode)?$mode:"";?>">
														      <input  type="hidden" name="meta_mode" value="<?php echo isset($meta_mode)?$meta_mode:"";?>">
														      <input  type="hidden" name="rurl" value="<?php echo isset($rurl)?$rurl:"";?>">
														                             
															
														</div>
						                                
										                <div class="row">
										                	                                <div class="col-lg-12">
																						         <button type="submit"  class="btn btn-default spin-waiter">Save Changes</button>
																						         <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
																						     </div>
										                </div> 	
									           </div>
								   </div>	         
								   </form>	     
								</div>
								<div class="row">
												             	  
												             	  	
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
						<div  class="col-lg-6">
	                		
		                		 <div class="row">
		                		 	        
								</div>
								
							
						</div>
	                    
	                </div>
	                <form role="form" enctype="multipart/form-data" method="post" action="#">
			                
			                		
						            <div class="row">
						            	<div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Seo Settings</h3>
					                            </div>
					                            <div class="panel-body">
					                            	
						                                <div class="row">		
											                    <div class="col-lg-12">
											                            <div class="form-group">
											                                <label>Page Title</label>
											                                <input type="text" name="title" value="<?php if(isset($seo_result[0]['title']))echo $seo_result[0]['title'];?>" id="seo_title" class="form-control" />
											                            </div>   
											                    </div>
											            </div>
											            <div class="row">		
											                    <div class="col-lg-12">
											                            <div class="form-group">
											                                <label>Header 1 Invisible Title.</h1></label>
											                                <p class="bg-info info"><i class="fa fa-info"></i>If the page does not have any <?php echo htmlentities("<h1>");  ?> element ,add content for <?php echo htmlentities("<h1>");?> element here.(Without tag)</p>
											                                <input type="text" name="h1" id="seo_h1" value="<?php if(isset($seo_result[0]['h1']))echo $seo_result[0]['h1'];?>" class="form-control" />
											                            </div>   
											                    </div>
											            </div>
											            <div class="row">
											                    <div class="col-lg-12">
											
											                            <div class="form-group">
											                                <label>Meta Tags</label>
											                                
											                                <textarea name="content" id="post_description" class="form-control" rows="20"><?php if(isset($seo_result[0]['meta']))echo $seo_result[0]['meta'];?></textarea>
											                            </div>
											                    <div class="error-div"></div> 
											                    <div class="succ-div"></div> 
											                    </div>
											                    
											            </div>  
						                            	
					                            	
					                            	
					                            	
					                            	
								                </div>
								                
					                    </div>
						            	
						            	
								                    
				              </div>
	                <button type="submit" id="save_seo_content" data-url="<?php echo base_url("admin/seo-settings/cameella/seo");?>"; class="btn btn-default">Save Changes</button>
	                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
		            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
		            
               </form>
	                
	                
	                <div class="row gallery_list">
	                	
	                </div>	
                
                
                
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!--
    <script src="<?php echo resource();?>lib/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo resource('backend');?>js/nicEdit.js"></script>
        
        <script type="text/javascript"> 
           new nicEditor({
                fullPanel : true
            }).panelInstance('post_description');
            
            
        </script>
        <article id="sp_co" style="display: none;">
              <?php echo isset($seo[0]['meta'])?$seo[0]['meta']:""; ?>
        </article>
     
        <script type="text/javascript">$(document).ready(function(){$('.nicEdit-main').html($('#sp_co').html());});</script>-->
    