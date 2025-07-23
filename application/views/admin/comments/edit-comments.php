     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Product Comments
                            <small>Edit Comments</small>
                            <!-- <a class="inner-settings" href="<?php echo base_url('admin/magazine/articles/settings')?>"><i class="fa fa-wrench"></i>Settings</a> -->
                        </h3>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="<?php echo base_url('admin/cameella/products');?>">Magazine</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-comments"></i> <a href="<?php echo base_url('admin/cameella/comments');?>">Comments</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit
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
                <form role="form" enctype="multipart/form-data" method="post" id="custom_fom" action="<?php echo base_url("admin/".$active."/".$actived."/save");?>">
			                <div class="row">
			                	<div class="col-lg-12">
			                		
			                		
						            <div class="row">
						            	
							               <div class="col-lg-5">
							               	            <div class="form-group">
							                                <label>Auther Name</label>
							                                <input id="name" value="<?php if(isset($result_id[0]['name']))echo $result_id[0]['name'];?>" class="form-control"  name="name">
							                                
							                            </div>
						                    	        <div class="form-group">
							                                <label>Email</label>
							                                <input type="email" id="title" value="<?php if(isset($result_id[0]['email']))echo $result_id[0]['email'];?>"  class="form-control"  name="email">
							                                <input type="file" id="file" style="display: none;" />
							                            </div>
							                            
						                    	        <div class="form-group">
							                                <label>Title</label>
							                                <input type="text" id="title" value="<?php if(isset($result_id[0]['meta_content']))echo $result_id[0]['meta_content'];?>"  class="form-control"  name="meta_content">
							                                
							                            </div>
						                           
							                            
							               </div>
							               
							               
							               
						                   
						                    
						          </div> 
						            
						             
						          
						          <div class="row editer-contner">
						            	
							                                   <div class="col-lg-12">
											
											                            <div class="form-group">
											                                <label>Comment</label>
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
			            
	                <button type="submit" id="save_custom_values" data-url="<?php echo base_url("admin/".$active."/".$actived."/save");?>" data-id="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:"";?>"  data-config="edit" class="btn btn-default">Save Details</button>
	                <span class="remove_g_image_spin_3"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
		            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
		            
               </form>
                
                	
                		
                

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
    
     <article id="sp_co" style="display: none;">
    	  <?php echo isset($result_id[0]['content'])?$result_id[0]['content']:""; ?>
    </article>
 
    <script type="text/javascript">$(document).ready(function(){$('.nicEdit-main').html($('#sp_co').html());});</script>