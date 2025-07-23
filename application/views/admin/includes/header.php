<!DOCTYPE html>
<html  lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Express International| Admin Dashboard<?php echo isset($p_title)?"|".$p_title:"";?></title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="icon" href="<?php echo resource('frontend')?>images/favicon.png" type="image/png" sizes="32x32">
    
    <link href="<?php echo resource('backend');?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo resource();?>lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo resource();?>backend/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo auto_version('/resource/backend/css/sb-admin.css'); ?>" rel="stylesheet">
    <link href="<?php echo resource();?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php if(isset($actived)&&$actived=="products"){ ?>
    
    <link href="<?php echo resource();?>backend/css/bootstrap-tagsinput.css" rel="stylesheet">
    
    <?php } ?>	
    <script type="text/javascript">var config={base:"<?php echo base_url();?>",
                                               name:"<?php echo $this->security->get_csrf_token_name();?>",
                                               value:"<?php echo $this->security->get_csrf_hash();  ?>"},slctd_pckg_books=[];</script>
    <?php if(isset($actived)&&$actived=="package"){ ?>
    	<script src="<?php echo resource();?>lib/js/angular.min.js" type="text/javascript"></script>
    	<script src="<?php echo resource();?>lib/js/bootstrap_angular_ui.min.js" type="text/javascript"></script>
    	<link href="<?php echo resource();?>lib/css/ngprogress-lite.css" rel="stylesheet">
    	<script src="<?php echo resource();?>lib/js/ngprogress-lite.min.js" type="text/javascript"></script>
    	
    	
	<?php }  ?>                                           
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Express International</a> 
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    	         <?php if(isset($user_info['file'])&&$user_info['file']!=""){ ?>
								         
								         <img style="max-width: 18px;"  src="<?php echo base_url().$user_info['file'];?>" />           		 
										                            	
								 <?php }else{  ?>
								 	        
										 <i class="fa fa-user"></i> 
										                	
								 <?php  }  ?> 
                    	<?php echo isset($user_info['name'])?$user_info['name']:"";?> <b class="caret"></b>
                    
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>admin/settings/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                         <?php if(isset($user_info['privilage'])&&$user_info['privilage']==md5('superadmin')){ ?>
                         	
						    <li>
	                            <a href="<?php echo base_url();?>admin/settings/users"><i class="fa fa-fw fa-gear"></i> Settings</a>
	                        </li>
							
							
                        <?php }?> 
                       
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>admin/user-logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="side-menu" class="nav navbar-nav side-nav">
                    <li class="<?php echo (isset($active)&&$active=="dashboard")?"active":"";  ?>">
                        <a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li class="<?php echo (isset($active)&&$active=="slider-settings")?"active":"";  ?>">
                    
                        <a href="javascript:;" data-toggle="collapse" data-target="#slider-settings"><i class="fa fa-sliders"></i> Slider Settings <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="slider-settings" class="ul-left-align <?php echo (isset($actived)&&($actived=="sliders"||$actived=="slides"))?"":"collapse";  ?>">
                            <li class="<?php echo (isset($actived)&&$actived=="slides")?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/slider-settings/slides"><i class="fa fa-fw fa-file"></i> Slides</a>
                            </li>
                            
                        </ul>
                        
                    </li>
                    
                    
                    
                    <li class="<?php echo (isset($active)&&($active=="products"||$active=="products-customize"))?"active":"";  ?>">
                    
                        <a href="javascript:;" data-toggle="collapse" data-target="#products"><i class="fa fa-book"></i> Online Store <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="products" class="ul-left-align <?php echo (isset($active)&&($active=="dress_category"||$active=="products-customize"||$active=="news_scroll"||$active=="stiching_category")&&isset($actived)&&($actived=="package"||$actived=="comments"||$actived=="review"||$actived=="products"||$actived=="subcategory"||$actived=="category"||$actived=="list"||$actived=="add"||$actived=="customize"||$actived=="settings"||$actived=="stiching_category"||$actived=="category_fasion"))?"":"collapse";  ?>">
                           <li class="<?php echo ((isset($active)&&($active=="products"))&&isset($actived)&&($actived=="news_scroll"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/news_scroll/news"><i class="fa fa-filter"></i> Add News Scroll</a>
                            </li>
							<!--li class="<?php echo ((isset($active)&&($active=="products"))&&isset($actived)&&($actived=="sub_category"||$actived=="subcategory"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/sub_category"><i class="fa fa-filter"></i> Add Sub Category</a>
                            </li>
							<!--li class="<?php echo ((isset($active)&&($active=="products"))&&isset($actived)&&($actived=="category_fasion"||$actived=="subcategory"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/category_fasion/category"><i class="fa fa-filter"></i> Fasion Category</a>
                            </li>
							<li class="<?php echo ((isset($active)&&($active=="products"))&&isset($actived)&&($actived=="stiching_category"||$actived=="subcategory"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/stiching_category/category"><i class="fa fa-filter"></i> Stiching Category</a>
                            </li-->
							
                            
                            
                            <li>
                                <a href="<?php echo base_url();?>admin/products/products"><i class="fa fa-file-text-o"></i> Products</a>
                            </li>
							
							
                           
                            <!--li class="<?php echo (isset($active)&&($active=="products")&&(isset($actived)&&$actived=="review"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/review"><i class="fa fa-file-text-o"></i> Review</a>
                            </li-->
                            <!--li class="<?php echo (isset($active)&&($active=="products")&&isset($actived)&&$actived=="settings")?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/settings"><i class="fa fa-fw fa-wrench"></i> Settings</a>
                            </li-->
                            
                        </ul>
                        
                    </li>
                    <!--li class="<?php echo (isset($active)&&($active=="blog"))?"active":"";  ?>">
                    
                        <a href="javascript:;" data-toggle="collapse" data-target="#blog"><i class="fa fa-book"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="blog" class="ul-left-align <?php echo (isset($active)&&($active=="blog")&&isset($actived)&&($actived=="blog"||$actived=="list"))?"":"collapse";  ?>">
                            <li class="<?php echo ((isset($active)&&($active=="blog"))&&isset($actived)&&($actived=="blog"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/blog/create"><i class="fa fa-pencil"></i> Create New Blog</a>
                            </li>
							<li class="<?php echo (isset($active)&&($active=="blog")&&(isset($actived)&&$actived=="category"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/blog/category"><i class="fa fa-file-text"></i>Blog Category List</a>
                            </li>
                            <li class="<?php echo (isset($active)&&($active=="blog")&&isset($actived)&&$actived=="blog")?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/blog/create#search_id"><i class="fa fa-th-large"></i> Manage All Blog</a>
                            </li>
                            
                            
                        </ul>
                        
                    </li-->
					
					</li>
                    <!--li class="<?php echo (isset($active)&&($active=="suggestion"))?"active":"";  ?>">
                    
                        <a href="javascript:;" data-toggle="collapse" data-target="#suggestion"><i class="fa fa-book"></i> Suggestion <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="suggestion" class="ul-left-align <?php echo (isset($active)&&($active=="suggestion")&&isset($actived)&&($actived=="suggestion"||$actived=="suggestion"))?"":"collapse";  ?>">
                            <li class="<?php echo ((isset($active)&&($active=="suggestion"))&&isset($actived)&&($actived=="suggestion"))?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/suggestion"><i class="fa fa-pencil"></i> Suggestion</a>
                            </li>
                            <li class="<?php echo (isset($active)&&($active=="suggestion")&&isset($actived)&&$actived=="suggestion")?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/products/suggestion#search_id"><i class="fa fa-th-large"></i> Manage All Suggestion</a>
                            </li>
                            
                            
                        </ul>
                        
                    </li-->
                    <!--li class="<?php echo (isset($active)&&$active=="order")?"active":"";  ?>">
                        <a href="<?php echo base_url();?>admin/order"><i class="fa fa-fw fa-dashboard"></i> Order Details</a>
                    </li-->
                    <li class="<?php echo (isset($active)&&$active=="settings")?"active":"";  ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-wrench"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="ul-left-align <?php echo (isset($actived)&&($actived=="users"||$actived=="profile"))?"":"collapse";  ?>">
                            
                             <?php if(isset($user_info['privilage'])&&($user_info['privilage']==md5('superadmin')||$user_info['privilage']==md5('developer'))){ ?>
                         	   
						           <li class="<?php echo (isset($actived)&&$actived=="users")?"active-d":"";  ?>">
		                                <a href="<?php echo base_url();?>admin/settings/users" ><i class="fa fa-fw fa-users" style="padding-right: 15%;"></i>Users</a>
		                           </li>
							
							
                             <?php }?> 
                           
                            
                            
                            
                            <li class="<?php echo (isset($actived)&&$actived=="profile")?"active-d":"";  ?>">
                                <a href="<?php echo base_url();?>admin/settings/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>