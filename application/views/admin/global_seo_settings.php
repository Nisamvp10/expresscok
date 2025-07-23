     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo ucfirst(str_replace("-"," ",$active));?>
                            <small>Seo Settings</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>
                                <a href="<?php if($mode=="directory")echo base_url('admin/home-directory/'.$meta_mode);
                                               else echo base_url('admin/'.$mode.'/'.$meta_mode); ?>" >
                                       <?php echo ucfirst($meta_mode);?>
                                </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Seo Settings
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
						            	<div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title">Seo Settings</h3>
					                            </div>
					                            <div class="panel-body">
					                            	    <?php if(isset($page_result[0])){ ?>
					                            	    	
					                            	    	<div class="row">		
											                    <div class="seo_page_contnt"> 
											                    	<div class="seo_page_contnt_one">
											                    		<?php echo ucwords(str_replace("-"," ",$mode)); ?><i class="fa fa-angle-double-right"></i>
											                    	</div>
											                    	<div class="seo_page_contnt_two">
											                    		<?php echo ucwords(str_replace("-"," ",$meta_mode)); ?><i class="fa fa-angle-double-right"></i>
											                    	</div>
											                    	<?php  
											                    	     if(isset($category_result[0])){ ?>
											                    	       <div class="seo_page_contnt_three">
													                    		<?php echo ucfirst($category_result[0]['name']); ?><i class="fa fa-angle-double-right"></i>
													                    	</div>	
											                    	       
																	<?php }elseif(isset($page_result[0]['category'])&&!is_numeric($page_result[0]['category'])){ ?>
																		    
																		    <div class="seo_page_contnt_three">
													                    		<?php echo ucfirst($page_result[0]['category']); ?><i class="fa fa-angle-double-right"></i>
													                    	</div>
																		
																		
																	<?php  }
											                    	 ?>		
											                        <div class="seo_page_contnt_three">
											                    		<?php echo ucfirst($page_result[0]['name']);  ?>
											                    	</div>		
											                    </div>
											                    
											                 </div>
														
					                            	    <?php } 
														 ?>
						                                <div class="row">		
											                    <div class="col-lg-12">
											                            <div class="form-group">
											                                <label>Page Title</label>
											                                <input type="text" name="title" value="<?php if(isset($seo_result[0]['title']))echo $seo_result[0]['title'];?>" id="seo_title" class="form-control" />
											                                <input type="hidden" name="post_meta" value="<?php if(isset($post_meta))echo $post_meta;?>" id="post_meta" class="form-control" />
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
								                
								                <div style="margin: 0;" class="row gallery_list">
								                	<div class="col-lg-12">
										                <button type="submit" id="save_seo_content" data-url="<?php echo base_url("admin/seo-settings/$mode/$meta_mode/$meta_id");?>"; class="btn btn-primary">Save Changes</button>
										                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
											            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
											        </div>    
								                </div>
					                    </div>
						            	
						            	
								                    
				              </div>
		                
			            
	               </form>
	               <div class="row gallery_list">
	                	
	               </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>