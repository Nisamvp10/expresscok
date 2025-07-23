     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Directory
                            <small>Bulk Action</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Bulk Action
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
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/directory/save-file');?>">
	                <div class="row">
	                	<div class="col-lg-8">
	                		
	                		 <div class="row">
					                	<div class="col-lg-6">
											     <div class="form-group">
											                                <label class="landline fibl">Select District</label>
											                                <select id="district" class="form-control"  name="district">
											                                	    <option value="0" >--Choose One--</option>													
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
											
										</div>
					                    <div class="col-lg-6">
											     <div class="form-group">
											             <label>Excel File</label>
											             <input id="file" class="img_tag" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" / >
											             <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">
										                                
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
	                <div class="row">
	                	                                <div class="col-lg-12">
													         <button type="submit"  class="btn btn-default spin-waiter">Upload File</button>
													         <span class="remove_g_image_spin_s_1"  title="Please Wait.."><i class="fa fa-refresh fa-spin"></i></span>
													     </div>
	                </div> 	
	                <div class="row gallery_list">
	                	
	                </div>	
                </form>
                
                
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>