     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery
                            <small>Add New Image</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gallery
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
                        </ol>
                    </div>
                </div>
                <div class="row">
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/save-gallery-image">
	                    <div class="col-lg-6">
	
	                        
	
	                            <div class="form-group">
	                                <label>Image Name</label>
	                                <input class="form-control" name="name">
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
	                                <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="no-file"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please choose a file.</p>
			                            
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> <p class="error-message"><i class="fa fa-close"></i>Maximum file size is 1 Mb.</p>
			                            	<?php echo $this->session->flashdata('error');?></div>
			                            
			                        <?php }else{ ?>
			                        	
			                        	<p class="help-block">This will help you to search image by name.</p>
			                        	
			                        <?php  }   ?>  
	                            </div>
	
	                            
	
	                           
	
	                        
	
	                    </div>
	                    <div class="col-lg-6">
	                            <div class="form-group">
	                                <label>Image File</label>
	                                <input type="file" name="file" accept="image/*" required >
	                            </div>
	
	                            
	                            <button type="submit" class="btn btn-default">Save Image</button>
	                            <button type="reset" class="btn btn-default">Reset Value</button>
	
	                    </div>
                    </form>
                </div>
                <div class="row gallery_list">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Gallery Images</h3>
                            </div>
                            <div class="panel-body">
                            		<div class="row">
                                <?php if(isset($result)&&!empty($result)){
                		           
									foreach($result as $key => $row){ 
										    
										?>
										<div class="col-lg-2 img_gallery_set">
											<div class="gallery-image-one">
												<img height="120px" width="139px;" src="<?php echo base_url().$row['file'];  ?>"><?php if(isset($row['name'])&&$row['name']!="") { ?><div class="img_gllry_botton_title"><?php echo $row['name'];  ?></div><?php }   ?>
											</div>
										           <span class="remove_g_image_spin"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
										           <span class="remove_g_image" data-id="<?php echo $row['id'];?>" title="Delete"><i class="fa fa-close"></i></span>
										           
										</div>
										
								<?php  	   }
									
									
			                	}  ?>
			                	</div>
			                	<div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
			                </div>
			                
                    </div>
                </div>
                	
                	
                	
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>