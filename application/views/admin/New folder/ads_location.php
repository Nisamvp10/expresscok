     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ads Location
                            <small>Add/Manage Locations</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                            </li>
                           
                            <li class="active">
                                <i class="fa fa-location-arrow"></i> Location
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
                	   <div class="col-lg-4">
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
			                        	
			                        	
			                        	
			                        <?php  }   ?>  
			           </div>             
                </div>
                <div class="row">
                	    
	                    <div class="location-mang-parnt col-lg-4">
	                        
	                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/developer/location/country/save">
	                            <div class="form-group">
	                                <label>Country Name</label>
	                                <input type="text" class="form-control" name="name">
	                                <input type="hidden" name="mode" value="country">
	                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	                                
	                            </div>
	                            <div class="form-group">
		                            <button type="submit" class="btn btn-default spin-waiter">Save Details</button>
		                            <div class="facebookG">
										<div id="blockG_1" class="facebook_blockG">
										</div>
										<div id="blockG_2" class="facebook_blockG">
										</div>
										<div id="blockG_3" class="facebook_blockG">
										</div>
									</div>
		                            <button type="reset" class="btn btn-default">Reset Value</button>
	                            </div>
	                            
	                           
	
	                        </form>
	
	                    </div>
	                    <div class="col-lg-4">
	                          <div  class="row location-mang-parnt">  
	                          	  <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/developer/location/state/save">
	                          	  	
				                    <div class="form-group">
				                                <label>Choose Country</label>
				                                <select name="country" class="form-control">
				                                	<?php if(isset($country)){
				                                		
														foreach ($country as $key => $value) { ?>
															<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
													<?php }
														
				                                	}  ?>
				                                </select>
				                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
				                                <input type="hidden" name="mode" value="state">
				                    </div>
				                    
				
		                            <div class="form-group">
		                                <label>State/Provinance Name</label>
		                                <input type="text" class="form-control" name="name">
		                            </div>
		
		                            <div class="form-group">
			                            <button type="submit" class="btn btn-default spin-waiter">Save Details</button>
			                            <div class="facebookG">
											<div id="blockG_1" class="facebook_blockG">
											</div>
											<div id="blockG_2" class="facebook_blockG">
											</div>
											<div id="blockG_3" class="facebook_blockG">
											</div>
										</div>
			                            <button type="reset" class="btn btn-default">Reset Value</button>
		                            </div>
		                            
		                        </form>
	                          	
	                          </div>		
	
	                    </div>
	                    <div class="col-lg-4">
	                          <div  class="row location-mang-parnt">  
	                          	  <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/developer/location/district/save">
	                          	  	
				                      <div class="form-group">
				                                <label>Choose Country</label>
				                                <select name="country"  class="form-control f_s_b">
				                                	 <?php if(isset($country)){
				                                		$sel="";
														foreach ($country as $key => $value) {
															   if($key==0){
															   	$sel=$value['id'];
															   }
															
															 ?>
															<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
													<?php }
														
				                                	}  ?>
				                                </select>
				                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
				                                <input type="hidden" name="mode" value="district">
				                    </div>
				                    
				                    <div class="form-group">
				                                <label>Choose State/Provinance</label>
				                                
				                                <select name="state"  class="form-control s_s_b">
				                                	
												    <?php if(isset($state)&&$sel!=""){
				                                		      
															  foreach ($state as $key => $value) { 
																if($value['country']==$sel){  
																?>
																  <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
												   <?php        }
															  }
														
				                                	      }  ?>
												
				                                	
				                                </select>
				                                
				                    </div>
				
		                            <div class="form-group">
		                                <label>City/District Name</label>
		                                <input type="text" class="form-control" name="name">
		                               
		                            </div>
		
		                            <div class="form-group">
			                            <button type="submit" class="btn btn-default spin-waiter">Save Details</button>
			                            <div class="facebookG">
											<div id="blockG_1" class="facebook_blockG">
											</div>
											<div id="blockG_2" class="facebook_blockG">
											</div>
											<div id="blockG_3" class="facebook_blockG">
											</div>
										</div>
			                            <button type="reset" class="btn btn-default">Reset Value</button>
		                            </div>
		                            
		                            
		                           
		
		                        </form>
	                          	
	                          </div>	
	
	                    </div>
	                   
                    
                    
                </div>
                <div  class="row gallery_list row-bor-pad">
            
                   <div class="col-lg-4">
                       
                      <?php if(isset($country)){
							
							foreach ($country as $ckey => $calue) { ?>
								
								<div class="row country-list-p">	
		                       	    <div class="col-lg-1">
		                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
											<input value="show_state_<?php echo $calue['id'];?>" type="checkbox" class="impt_ckbox_bulk country_chkbx">
											<label></label>
									   </div>
								    </div>
		                       	   <div class="col-lg-7"><label style="margin-top: 3px;"><?php echo $calue['name'];?></label></div>
		                       	   <div class="col-lg-3">
		                       	   	<a title="Edit" data-toggle="modal" data-target="#myModal_loc_<?php echo $calue['id'];?>"  href="#"><i class="fa fa-edit list_edit_s"></i></a>
		                       	   	<a class="other_de_a" href="<?php echo base_url("admin/developer/location/delete/".$calue['id']);?>"  title="Are you sure, You want to delete this?"><i class="fa fa-trash list_edit_s"></i></a>
		                       	   	
		                       	   </div>
		                       	   <div class="col-lg-1 country-list-hide loca_list_navi">
		                       	   	 <i class="fa fa-angle-double-right loc-arr-rig-to-ind"></i>
		                       	   </div>
		                       </div>	
		                       
		                       
		                        <div class="modal fade" id="myModal_loc_<?php echo $calue['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									  	<form action="<?php echo base_url("admin/developer/location/update");?>" method="post">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
										      </div>
										      <div class="modal-body">
										            <div class="row">
										                   <div class="col-lg-12">
										                       
										                       <div class="form-group">
									                                <label>Edit Name</label>
									                                <input type="text" class="form-control" value="<?php echo $calue['name'];?>" name="name">
									                                <input type="hidden" class="form-control" value="<?php echo $calue['id'];?>" name="id">
									                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
									                            </div>
										                   
										                   
										                   </div>
										            </div>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        <button type="submit" class="btn btn-primary">Save changes</button>
										      </div>
										    </div>
									    </form>
								  </div>
								</div>
								
								
								
				      <?php	}
                      	
                      	
                      } 
					   ?>
                   </div>             
                   <div class="col-lg-4">
                   	   <?php if(isset($state)){
							
							foreach ($state as $skey => $salue) { ?>
								
								<div class="row state-list-p country-list-hide show_state_<?php echo $salue['country'];?>">	
		                       	    <div class="col-lg-1">
		                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
											<input value="show_district_<?php echo $salue['id'];?>" type="checkbox" class="impt_ckbox_bulk state_chkbx">
											<label></label>
									   </div>
								    </div>
		                       	   <div class="col-lg-7"><label style="margin-top: 3px;"><?php echo $salue['name'];?></label></div>
		                       	   <div class="col-lg-3">
		                       	   	<a title="Edit" data-toggle="modal" data-target="#myModal_loc_<?php echo $salue['id'];?>" href="#"><i class="fa fa-edit list_edit_s"></i></a>
		                       	   	<a class="other_de_a" title="Are you sure, You want to delete this?" href="<?php echo base_url("admin/developer/location/delete/".$salue['id']);?>"  title="Delete"><i class="fa fa-trash list_edit_s"></i></a>
		                       	   	
		                       	   </div>
		                       	   <div class="col-lg-1 country-list-hide loca_list_navi">
		                       	   	 <i class="fa fa-angle-double-right loc-arr-rig-to-ind"></i>
		                       	   </div>
		                       </div>	
								
							   <div class="modal fade" id="myModal_loc_<?php echo $salue['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									  	<form action="<?php echo base_url("admin/developer/location/update");?>" method="post">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
										      </div>
										      <div class="modal-body">
										            <div class="row">
										                   <div class="col-lg-12">
										                       
										                       <div class="form-group">
									                                <label>Edit Name</label>
									                                <input type="text" class="form-control" value="<?php echo $salue['name'];?>" name="name">
									                                <input type="hidden" class="form-control" value="<?php echo $salue['id'];?>" name="id">
									                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
									                            </div>
										                   
										                   
										                   </div>
										            </div>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        <button type="submit" class="btn btn-primary">Save changes</button>
										      </div>
										    </div>
									    </form>
								  </div>
								</div>	
								
				      <?php	}
                      	
                      	
                      } 
					   ?>
                   	
                   </div>      
                   <div class="col-lg-4">
                      <?php if(isset($district)){
							
							foreach ($district as $dkey => $dalue) { ?>
								
								<div class="row district-list-p country-list-hide show_district_<?php echo $dalue['state'];?>">	
		                       	    <div class="col-lg-1">
		                       	   	   <div style="margin-top: 5px;" class="checkbox checkbox-default">
											<input disabled type="checkbox" class="impt_ckbox_bulk bulk_action_chkbox_chiled">
											<label></label>
									   </div>
								    </div>
		                       	   <div class="col-lg-7"><label style="margin-top: 3px;"><?php echo $dalue['name'];?></label></div>
		                       	   <div class="col-lg-3">
		                       	   	<a title="Edit" data-toggle="modal" data-target="#myModal_loc_<?php echo $dalue['id'];?>" href="#"><i class="fa fa-edit list_edit_s"></i></a>
		                       	   	<a class="other_de_a" title="Are you sure, You want to delete this?" href="<?php echo base_url("admin/developer/location/delete/".$dalue['id']);?>"  title="Delete"><i class="fa fa-trash list_edit_s"></i></a>
		                       	   	
		                       	   </div>
		                       	   	
		                       	   
		                       </div>	
							
							   <div class="modal fade" id="myModal_loc_<?php echo $dalue['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									  	<form action="<?php echo base_url("admin/developer/location/update");?>" method="post">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
										      </div>
										      <div class="modal-body">
										            <div class="row">
										                   <div class="col-lg-12">
										                       
										                       <div class="form-group">
									                                <label>Edit Name</label>
									                                <input type="text" class="form-control" value="<?php echo $dalue['name'];?>" name="name">
									                                <input type="hidden" class="form-control" value="<?php echo $dalue['id'];?>" name="id">
									                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
									                            </div>
										                   
										                   
										                   </div>
										            </div>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        <button type="submit" class="btn btn-primary">Save changes</button>
										      </div>
										    </div>
									    </form>
								  </div>
								</div>	
								
								
				      <?php	}
                      	
                      	
                      } 
					   ?>
                   </div>  
                </div>
                <div class="row gallery_list">
                   
                                
                        
                    
                </div>
                
            </div>
            

        </div>
       
        
    </div>
    
    
    
    
    
    
     <script type="text/javascript">
     	var s_f_jsa=null;
     	<?php
     	 $str_tmp="";
     	if(isset($state)){
     	   foreach ($state as $ck => $cvalue) {
     	   	if($ck==0){
     	   		$str_tmp="{'id':'".$cvalue['id']."','name':'".$cvalue['name']."','meta_id':'".$cvalue['country']."'}";
     	   	}else{
     	   		$str_tmp=$str_tmp.",{'id':'".$cvalue['id']."','name':'".$cvalue['name']."','meta_id':'".$cvalue['country']."'}";
     	   	} 
		   } ?>
		   s_f_jsa=[<?php echo $str_tmp;  ?>];
		<?php }
     	 ?>
     </script>