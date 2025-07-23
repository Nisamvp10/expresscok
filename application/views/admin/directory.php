     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Directory
                            <small>Add New Item</small>
                        </h1>
                        <ol class="breadcrumb act_msg">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Directory
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
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/directory/save');?>">
			                <div class="row">
			                	<div class="col-lg-8">
			                		<div class="row">
						                    <div class="col-lg-6">
						
						                           <div class="form-group">
							                                <label class="landline fibl">Select City/Town</label>
							                                <select id="district" class="form-control"  name="district">
							                                	    <option value="0">--Choose One--</option>													
																	<option value="Thiruvananthapuram">Thiruvananthapuram</option>
																	<option value="Kollam">Kollam</option>
																	<option value="Alappuzha">Alappuzha</option>
																	<option value="Pathanamthitta">Pathanamthitta</option>
																	<option value="Kottayam">Kottayam</option>
																	<option value="Idukki">Idukki</option>
																	<option value="Ernakulam">Ernakulam</option>
																	<option value="Thrissur">Thrissur</option>
																	<option value="Palakkad">Palakkad</option>
																	<option value="Malappuram">Malappuram</option>
																	<option value="Kozhikode">Kozhikode</option>
																	<option value="Wayanad">Wayanad</option>	
									                            	<option value="Kannur">Kannur</option>					                            	
																	<option value="Kasaragod">Kasaragod</option>	
							                                </select>	
							                                
							                       </div>
						
						                            <div class="form-group">
						                                <label>Name</label>
						                                <input id="name" class="form-control"  name="name">
						                                <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                
						                            </div>
						
						
						                    </div>
						                    <div class="col-lg-6">
						                    	   <div class="form-group">
							                                <label class="landline fibl">City</label>
							                                <input id="city" class="form-control typeahead" autocomplete="off" name="city">
							                                
							                       </div>
						                    	
						                            <div class="form-group">
						                                <label>Image</label>
						                                <input id="file" class="img_tag" type="file" name="file" accept="image/*"  >
						                            </div>
						
						                            
						                            
						
						                    </div>
						            </div>
						            <div class="row">
						            	
							               <div class="col-lg-6">
							                            <div class="form-group">
							                                <label>Address</label>
							                                <textarea id="address" rows="5" class="form-control"  name="address" ></textarea>
							                                
							                            </div>
							               </div>
							               <div class="col-lg-6">
							                            <div class="form-group">
							                                <label class="mobile fibl"><i class="fa fa-mobile"></i>Mobile</label>
							                                <input id="mobile" class="form-control"  name="mobile">
							                                
							                            </div>
							                            <div class="form-group">
							                                <label class="whatsapp fibl"><i class="fa fa-whatsapp"></i>Whatsapp</label>
							                                <input id="wtsapp" class="form-control"  name="wtsapp">
							                                
							                            </div>
							               </div>	
						                   
						                    
						          </div> 
						          <div class="row">
						            	
							               <div class="col-lg-6">
							                            <div class="form-group">
							                                <label class="landline fibl"><i class="fa fa-phone-square"></i>Land Line</label>
							                                <input id="landline" class="form-control"  name="landline">
							                                
							                            </div>
							                            <div class="form-group">
							                                <label class="fax fibl"><i class="fa fa-fax"></i>Fax</label>
							                                <input id="fax" class="form-control"  name="fax">
							                                
							                            </div>
							               </div>
							               <div class="col-lg-6">
							                            <div class="form-group">
							                                <label class="web fibl"><i class="fa fa-globe"></i>web</label>
							                                <input id="web" class="form-control"  name="web">
							                                
							                            </div>
							                            <div class="form-group">
							                                <label class="email fibl"><i class="fa fa-envelope-o"></i>email</label>
							                                <input id="email" class="form-control"  name="email">
							                                
							                            </div>
							               </div>	
						                   
						                    
						          </div>
						          <div class="row">
						            	
							               <div class="col-lg-12">
							                            <div class="form-group">
							                                <label>Details</label>
							                                <textarea id="query" rows="5" class="form-control"  name="query" ></textarea>
							                                <!-- <p class="help-block">Please add some search queries seperated by comma.</p> -->
							                            </div>
							               </div>
							               	
						                   
						                    
						          </div>         
				             </div>       
				             <div class="col-lg-4">
				                           <div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title cat-left-p-t">Select Category</h3>
					                                <div class="cat-left-p-i"><i class="fa fa-search"></i></div><input type="search" class="form-control search-in-tbl-cat" />
					                            </div>
					                            <div class="panel-body panel-course-cate">
					                            	<table class="table table-hover cat_tble">
				                                
								                            <tbody>
											                               <tr>
														                           <td class="cat_radio_td">
																                          <input class="cat_radio" checked  name="category" type="radio" value="0"  />
																                   </td>
																                   <td  class="cat_radio_name">None</td>
																                                        
																          </tr>
											                               
											                               
											                                <?php if(isset($category)){
											                		            $k=FALSE;
																				foreach($category as $key => $row){ 
																					    
																					?>
																					
																								<tr>
														                                    	        <td class="cat_radio_td">
																                                        	<input class="cat_radio" name="category" type="radio" value="<?php echo $row['id'];?>"  />
																                                        </td>
																                                        <td class="cat_radio_name"><?php echo $row['name'];?></td>
																                                        
																                                </tr>
																                                
																                                <?php if(isset($subcategory)&&!empty($subcategory)){
																                                       $i=0; 			
																									  foreach ($subcategory as $subkey => $subrow) { 
																									  	                   
																									  	                    if($row['id']==$subrow['meta_id']) {?>
																									  	                               <?php if($i==0){  $k=TRUE; ?>
																																  	    <tr class="subcat_hiddn sub_cat_drp_dwn_<?php echo $row['id'];?>">
																								                                    	        <td></td>
																								                                    	        <td>
																										                                        	<table class="table table-hover cat_tble">
																										                                        		<tbody>
																										                               <?php }  ?>         		
																										                                        		
																										                                        		
																												                                        		<tr>
																												                                        			<td class="subcat_radio_td"><input class="subcat_radio" name="subcategory" type="radio" value="<?php echo $subrow['id'];?>"  /></td>
																												                                        			<td class="subcat_radio_name"><?php echo $subrow['name'];?> </td>
																												                                        		</tr>
																										                                        		
																										                                        		
																										                                        		
																										                                        	
																									  	
																										  
																								<?php unset($subcategory[$subkey]); $i++; }	  
                                                                                                      }			
                                                                                                     

		
																                                 } 

                                                                                                  if($k){  ?>                                           </tbody>
																																  	                </table>
																										                                        </td>
																										                                </tr>
																									  	
																										                               <?php }
																					  }
																				
																				
														                	}  ?>
														                	                    
									                	        </tbody>
									                   </table>
								                </div>
								                
					                    </div>
				  
				             </div>
			                   
			             </div>
			             <div class="row">
			             	  <div class="col-lg-6">
			             	  	
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
				        <div class="form-group">    
			                <button type="submit"  data-config="save" class="btn btn-default spin-waiter">Save Details</button>
			                <div class="facebookG">
												<div id="blockG_1" class="facebook_blockG">
												</div>
												<div id="blockG_2" class="facebook_blockG">
												</div>
												<div id="blockG_3" class="facebook_blockG">
												</div>
											</div>
			                <!-- <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span> -->
				            <button type="reset" class="btn btn-default reset_btn">Reset Value</button>
			           </div>
               </form>
                <div class="row gallery_list">
                
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Courses</h3>
                                
                                	
                            </div>
                           
								<div class="checkbox-large">
                                  	
																    <label>
																      <input  type="checkbox" class="bulk_action_chkbox_parent"> Bulk Action </label>
																      <select data-action="<?php echo base_url('admin/bulk-action/directory');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option data-action="courses" value="delete">Delete</option></select>
																    
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
								 </div>
														
							   
                            <div class="panel-body">
                            	
                                
                                <div class="table-responsive">
			                            <table class="table table-hover table-striped table-special">
			                                <thead>
			                                    <tr>
			                                    	<th></th>
			                                        <th>Name</th>
			                                        <th>Category</th>
			                                        <th>Address</th>
			                                        <th>Location</th>
			                                        <th>Contact#</th>
			                                        <th>Image</th>
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
															    <td style="position:relative;">
															    	<article><div class="tble_name"><?php echo $row['name']; ?></div></article>
															    	
															    	<form style="display: inline-block;" id="course_form_<?php echo $row['id'];?>" class="course_edit_form" action="<?php echo base_url();?>admin/directory/edit" method="post">
						                                        		
						                                        		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
						                                        		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
						                                        		<a title="Edit" class="edit_disabled" href="#" onclick="_do_edit_action('course_form_<?php echo $row['id'];?>')" ><i class="fa fa-edit list_edit_s"></i>Edit</a>
						                                        	</form>
						                                        	
															    	
															    	
															    	<a id="ffffff"  class="course_de_a" data-post="<?php echo base_url('admin/directory/delete');?>" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash list_delete_s"></i>Delete</a>
															    	<a id="gggggg"  class="seo_de_a"  href="<?php echo base_url("admin/global-seo-settings/directory/".strtolower(isset($active)?$active:"")."/directory/".$row['id']);?>"><i class="fa fa-wrench list_delete_s"></i>Settings</a>
															    	<div class="remove_c_spin_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></div>
															    </td>
						                                        <td><article><div class="tble_category"><?php echo $row['m_name']; ?></div></article></td>
						                                        <td><article><div class="tble_content_address"><?php echo $row['address']; ?></div></article></td>
						                                        <td><article><div class="tble_content_contact">
						                                        	<span><i class="fa fa-map-marker"></i><?php echo $row['district']; ?></span>
						                                        	<span><i class="fa fa-location-arrow"></i><?php echo $row['city']; ?></span>
						                                        </div></article></td>
						                                        <td>
						                                        	<article>
						                                        		<div class="tble_content_contact">
						                                        	       <?php  
						                                        	          if($row['mobile']!=""){ ?>
						                                        	          	<span><i class="fa fa-mobile"></i><?php echo $row['mobile'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                        	        <?php  
						                                        	          if($row['wtsapp']!=""){ ?>
						                                        	          	<span class="whatsapp"><i class="fa fa-whatsapp"></i><?php echo $row['wtsapp'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                        	        <?php  
						                                        	          if($row['landline']!=""){ ?>
						                                        	          	 <span><i class="fa fa-phone-square"></i><?php echo $row['landline'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                        	        <?php  
						                                        	          if($row['fax']!=""){ ?>
						                                        	          	<span><i class="fa fa-fax"></i><?php echo $row['fax'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                        	        <?php  
						                                        	          if($row['email']!=""){ ?>
						                                        	          	<span><i class="fa fa-envelope-o"></i><?php echo $row['email'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                        	        <?php  
						                                        	          if($row['web']!=""){ ?>
						                                        	          	<span><i class="fa fa-globe"></i><?php echo $row['web'];?></span>
						                                        	         <?php   }
						                                        	        ?>
						                                                </div>
						                                            </article></td>
						                                        <td><article><div class="tble_file"><?php  echo (isset($row['file'])&&$row['file']!="")?'<img src="'.base_url().$row['file'].'" width="76px" height="60px" />':'';; ?></div></article></td>
															    
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
																      <select data-action="<?php echo base_url('admin/bulk-action/directory');?>" class="bulk_action_slctbox"><option selected  value="default">--Action--</option><option value="delete">Delete</option></select>
																    </label>
																     <span class="bulk_action_spin"  title="Please Wait..">Please wait...<i class="fa fa-circle-o-notch fa-spin"></i></span>
						    </div>
			                
                    </div>
                </div>
                	
                	
                	
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>