     <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                          Express International
                            <small>Dashboard</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            
            <!-- /.container-fluid -->
              
			<div class="container-fluid dynamicTile">
					<div class="row ">
					    <div class="col-sm-2 col-xs-4">
					    	<div id="tile1" class="tile">
					        
					         <div class="carousel slide" data-ride="carousel">
					          
								<div class="carousel-inner">
									<div class="item item-rel">
										<a href="<?php echo base_url("admin/products/products");?>">
											<img src="<?php echo resource('backend');?>images/product.png" class="img-responsive"/>
											<h3 class="tilecaption-cntre theme-four">Products</h3>
										</a>
									</div>
									<div class="item active theme-five">
					            		<h3 class="tilecaption"><a href="<?php echo base_url("admin/products/products");?>">Products <br><small>Add New Product</small></a>	</h3>
					            	</div>	
								</div>
					        </div>
					         
					    	</div>
						</div>
						
						
						
					    <!--div class="col-sm-2 col-xs-4">
							<div id="tile5" class="tile">
					    	 
					         <div class="carousel slide" data-ride="carousel">
					          
					          <div class="carousel-inner">
					            <div class="item active">
					              <a href="<?php echo base_url("admin/products/comments");?>">
					             	 <img src="<?php echo resource('backend');?>images/comments.png" class="img-responsive"/>
					             	 <h3 class="tilecaption-cntre theme-four">Comments</h3>
					              </a>	 
					            </div>
					            <div class="item">
					              <h3 class="tilecaption theme-seven"><a href="<?php echo base_url("admin/products/comments");?>">Comments </a>	</h3>
					            </div>
					          </div>
					        </div>
					         
							</div>
						</div-->
						<div class="col-sm-2 col-xs-4">
							<div id="tile6" class="tile">
					    	 
					         <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					          <div class="carousel-inner">
					            <div class="item active">
					               <a href="<?php echo base_url("admin/settings/profile");?>">
					               	 <img src="<?php echo resource('backend');?>images/settings.png" class="img-responsive"/>
					               </a>	 
					            </div>
					            <div class="item theme-six">
					            	
					            		<h3 class="tilecaption"><a href="<?php echo base_url("admin/settings/users");?>">User Settings <br><small>Manage Users</small></a>	</h3>
					            	
					            </div>	
					            <div class="item theme-five">
					            	
					            		<h3 class="tilecaption"><a href="<?php echo base_url("admin/settings/profile");?>">Profile <br><small>Manage Profile</small></a>	</h3>
					            	
					            </div>	
					          </div>
					        </div>
					         
							</div>
						</div>
					</div>
					
					<!--div class="row">
						<div class="col-sm-4 col-xs-8">
							<div id="tile7" class="tile">
					    	 
					        <div class="carousel slide" data-ride="carousel">
					         
					          <div class="carousel-inner">
					          	
					          	<?php if(isset($slides)&&!empty($slides)){
					          		  foreach ($slides as $skey => $svalue) { ?>
											
											<div class="item <?php if($skey==0)echo "active";?>">
												<a href="<?php echo base_url("admin/slider-settings/slides");?>">
												 <div style="background-image: url('<?php echo base_url($svalue['m_file'])?>');height: 100%;width: 100%;" class="center-cropped"></div>
								                </a>
								                <?php if($skey%2==0){ ?>
								                	
								                	<h3 class="tilecaption-cntre theme-one">Slides<br>
									                  <small>Add New</small>
									                </h3>
								                	
								                <?php }  ?>
								              
								            </div>
											
								<?php array_splice($slides,$skey); if($skey==6){break;} }
									
					          	}  ?>
					          </div>
					        </div>
					         
							</div>
						</div>
						<!--div class="col-sm-2 col-xs-4">
							<div id="tile8" class="tile">
					    	 
					         <div class="carousel slide" data-ride="carousel">
					          
					          <div class="carousel-inner">
					            <div class="item active">
									<a href="<?php echo base_url("admin/order");?>">
										<img src="<?php echo resource('backend');?>images/order.png" class="img-responsive"/>
										<h3 class="tilecaption-cntre theme-two">Order Details</h3>
									</a>
					            </div>
					            <div class="item">
									<a href="<?php echo base_url("admin/order");?>">
										<img src="<?php echo resource('backend');?>images/order2.png" class="img-responsive"/>
										<h3 class="tilecaption-cntre theme-two">View All Order</h3>
									</a>	
					            </div>
					            </div>
					         </div>
					         
							</div>
						</div>
						<div class="col-sm-2 col-xs-4">
							<div id="tile9" class="tile">
					    	 
					          <div class="carousel slide" data-ride="carousel">
					          
					          <div class="carousel-inner">
					            <div class="item active theme-seven">
					            	
					            		<h3 class="tilecaption"><a href="<?php echo base_url("admin/products/settings");?>">Home Settings <br><small>Home Seo Settings</small></a>	</h3>
					            	
					            </div>	
					            <div class="item theme-eight">
					            	
					            		<h3 class="tilecaption"><a href="<?php echo base_url("admin/products/settings");?>">Home Settings <br><small>Home Page Slider</small></a>	</h3>
					            	
					            </div>	
					          </div>
					        </div>
					         
							</div>
						</div>
						
					</div-->
			              
			</div>           
            
            <!--end-------------------------------------->
        </div>
        <!-- /#page-wrapper -->

    </div>