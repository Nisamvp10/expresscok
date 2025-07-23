     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo (isset($mode))?$mode:"";  ?>
                            <small>Edit News Scroll</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                            	
                                <i class="fa fa-book"></i> <a href="<?php echo base_url();?><?php echo (isset($rurl))?dirname($rurl):""  ?>"><?php echo (isset($mode))?$mode:"";?></a>
                            </li>
                            <li class="active">
                            	
                                <i class="fa fa-book"></i> <a href="<?php echo base_url();?><?php echo (isset($rurl))?$rurl:""  ?>">News Scroll</a>
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
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/news_scroll/update">
	                    <div class="col-lg-5">
	
	                        
	
	                            <div class="form-group">
	                                <label>Edit news_scroll</label>
	                                <input type="text" class="form-control" value="<?php echo (isset($result[0]['content']))?$result[0]['content']:"";  ?>" name="content">
									
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
						</div>		
						<div class="col-lg-4" style="margin-top:25px;">
	                            <!--div class="form-group">
	                                <label>Image File</label>
	                                <input type="file" class="img_tag" name="file" accept="image/*" />
	                                <button type="button" class="btn btn-default btn_media_l"><i class="fa fa-picture-o"></i>Media Library</button>
	                            </div-->
	                            
	                            
	
	                            
	                            <button type="submit" class="btn btn-default spin-waiter">Save news</button>
	                            <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
	                            
	                    </div>
	                    <div class="col-lg-3">
	                            <div class="lib_image_holder">
	                                
	                                
	                                
	                            </div>
	                   </div>
	                    </div>
	                   
	                    
                    </form>
                </div>
                   <!--***********************************************************************************Modal Start Here***********************************************************-->
                       	
                	
                	<!--***********************************************************************************Media Meta Modal Start Here***********************************************************-->
                      
						
						
             <!--***********************************************************************************Media Meta Modal Start***********************************************************--> 	
                
                
                
                
                
                
                
            </div>
            

        </div>
       

    </div>
    <script src="<?php echo resource();?>lib/js/jquery.js"></script>
    <script type="text/javascript">$(document).ready(function(){$('.remv_feat_img').show();});</script>