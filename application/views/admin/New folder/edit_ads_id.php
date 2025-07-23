     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ads ID
                            <small>Edit Ads ID</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                           
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="<?php echo base_url();?>admin/developer/ads-id">Ads ID</a>
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
                <div class="row">
                	<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/developer/ads-id/update">
	                    <div class="col-lg-5">
	                            <div class="form-group">
	                                <label>Choose Page</label>
	                                <select name="page" class="form-control">
	                                	<?php  $page_ar=array();
	                                	     if(isset($pages)){
	                                	     	foreach ($pages as $key => $value) { 
	                                	     		$page_ar[$value['id']]=$value['name'];
	                                	     		?>
													 <option <?php if(isset($result_id[0]['meta_id'])&&$result_id[0]['meta_id']==$value['id'])echo "selected";?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
													 
										<?php	}
	                                	     }
	                                	
	                                	 ?>
	                                	
	                                </select>
	                                <input type="hidden" class="form-control" name="id" value="<?php echo (isset($result_id[0]['id']))?$result_id[0]['id']:"";?>" />
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                                <?php if($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')=="validation"){  ?>
	                                	
			                            <p class="error-message"><i class="fa fa-close"></i>Please check the value you have submitted.</p>
			                            <?php echo  $this->session->flashdata('details'); ?>
			                        <?php }elseif($this->session->flashdata('error')!=FALSE&&$this->session->flashdata('error')!=""){  ?>
	                                	
			                            <div class="error-div"> 
			                            	<?php echo $this->session->flashdata('file_error');?>
			                            	<?php echo $this->session->flashdata('error');?>
			                            </div>
			                            
			                        <?php }elseif($this->session->flashdata('success')){ ?>
			                        	<div class="succe-div">
			                        	<p class="succ-message"><i class="fa fa-check"></i>Successfully saved.</p>	
			                        	</div>
			                        <?php }else{ ?>
			                        	
			                        	<p class="help-block">This field is mandatory.</p>
			                        	
			                        <?php  }   ?>  
	                            </div>
	
	                            <button type="submit" class="btn btn-default spin-waiter">Save Details</button>
	                            <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
	                            <button type="reset" class="btn btn-default">Reset Value</button>
	
	                           
	
	                        
	
	                    </div>
	                    <div class="col-lg-4">
	                    	<div class="form-group">
	                           <label>Ads Id</label>
	                           <input type="text" class="form-control" value="<?php echo (isset($result_id[0]['meta_mode']))?$result_id[0]['meta_mode']:"";?>" name="ads_id">
	                       </div>
	                       <div class="form-group">
	                           <label>Ads Friendly Name</label>
	                           <input type="text" class="form-control" value="<?php echo (isset($result_id[0]['name']))?$result_id[0]['name']:"";?>" name="name">
	                       </div>    
	                    </div>
	                    <div class="col-lg-3">
	                    	<div class="form-group">
	                           <label>Position Width</label>
	                           <input type="text" class="form-control" value="<?php echo (isset($result_id[0]['content']))?$result_id[0]['content']:"";?>" name="width">
	                       </div>
	                       <div class="form-group">
	                           <label>Position Height</label>
	                           <input type="text" class="form-control" value="<?php echo (isset($result_id[0]['meta_content']))?$result_id[0]['meta_content']:"";?>" name="height">
	                       </div>    
	                    </div>
	                   
                    </form>
                </div>
                <div class="row gallery_list">
                   
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title modal-title-in">All Ads ID</h3>
                               
                                	
                            </div>
                           
							<div class="checkbox-large">
                                  	
																      <label><input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																      <select data-action="<?php echo base_url('admin/posts/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																      <div class="list-header-filter"><span>Filter by Pages</span> <select data-action="<?php echo base_url ('admin/developer/ads-id'); ?>" class="form-control category_filter_select" ><option value="default">--Choose Page--</option>
																      	<option value="default">All</option><?php if(isset($pages)){ foreach ($pages as $key => $value) {  ?>
													                  <option <?php if(isset($f_c)&&$f_c==$value['id'])echo "selected";?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } } ?></select></div>
																      <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
						    </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Page Name</th>
			                                        <th>Ads ID</th>
			                                        <th>Ads Friendly Name</th>
			                                        <th>Ads Dimension</th>
			                                        <th>Action</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    
			                                        
					                               <?php if(isset($result)&&!empty($result)){
					                		           
														foreach($result as $key => $row){ 
															    
															?>
															  <tr id="course_list_tr_<?php echo $row['id'];?>">
															  	<td class="bulk_chckbx_parent">
															  		   <div class="checkbox checkbox-primary">
													                        <input value="<?php echo $row['id'];?>"  type="checkbox" class="impt_ckbox_bulk bulk_action_chkbox_chiled" />
													                        <label></label>
													                    </div>
															  		
															  		<!--<input type="checkbox"  class="impt_ckbox_bulk bulk_action_chkbox_chiled" />-->
															  	</td>
															  	<td>
															    	<article><div class="tble_name"><?php echo (!empty($page_ar)&&isset($page_ar[$row['meta_id']]))?$page_ar[$row['meta_id']]:"-"; ?></div></article>
															    	
															    	
															    </td>
															  	<td>
															    	<article><div class="tble_name"><?php echo $row['meta_mode']; ?></div></article>
															    	
															    	
															    </td>
															    <td>
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	
															    </td>
															     <td>
															    	<article><div class="tble_name"><?php echo $row['content']."x".$row['meta_content']; ?></div></article>
															    	
															    	
															    </td>
						                                        
						                                        <td style="position:relative;">
						                                          <article>
						                                        	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url('admin/developer/ads-id/edit');?>" method="post">
						                                        		
	                                                                    
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	 <a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/posts/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	 <div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
						                                        	
						                                           </article>
						                                        </td>
															    
														      </tr>
															
														<?php  }
														
														
								                	}  ?>
			                                        
			                                    
			                                    
			                                </tbody>
			                            </table>
			                     </div>
			                     
                                 
                               
			                	 <div class="col-lg-12 pagination-parent"><?php echo isset($links)?$links:"";?></div>
			                </div>
			                <div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action 
																      <select data-action="<?php echo base_url('admin/posts/bulk-action');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
																    </label>
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
						   </div>
			                
                    </div>
                        
                    
                </div>
                	
                
          
                
            </div>
            

        </div>
       
        
    </div>
