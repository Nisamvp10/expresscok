<!DOCTYPE html>

<html>
    <head>
        <title>Express Couriers & Cargo Services</title>
        <link href="<?php echo resource('frontend')?>images/logo.png" type="images/png" rel="shortcut icon" />
        <link href="<?php echo resource('frontend')?>css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link rel="stylesheet" href="<?php echo resource('frontend')?>css/menu.css" />
        <link href="<?php echo resource('frontend')?>css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <script src="<?php echo resource('frontend')?>js/jquery.min.js"></script>
        <script src="<?php echo resource('frontend')?>js/bootstrap.min.js"></script>
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- start menu -->
        <link href="<?php echo resource('frontend')?>css/megamenu.html" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo resource('frontend')?>js/megamenu.js"></script>
        <script>$(document).ready(function () {
                $(".megamenu").megamenu();
            });</script>
        <script type="text/javascript" src="<?php echo resource('frontend')?>js/jquery.leanModal.min.js"></script>
        <link rel="stylesheet" href="<?php echo resource('frontend')?>css/font-awesome.min.css" />
        <script src="<?php echo resource('frontend')?>js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>
        <script type="text/javascript">
            function tracknow() {
                debugger;
                var str = document.getElementById("txttrackno").value;
                var strwithoutspc = str.replace(/\s+/g, '');
                var strreprn = strwithoutspc.replace(/(\r\n|\n|\r)/gm, "");
                // var straddnewline = strreprn.replace(",", "\r\n");

                //location.href = "frmTracking.aspx?conno=" + strreprn;
            }
        </script>
        <script type="text/javascript">
            function login() {
                alert('Invalid User');
            }
        </script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="<?php echo resource('frontend')?>js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo resource('frontend')?>js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                });
            });
        </script>
        <!---- start-smoth-scrolling---->

    </head>
    <body>
      
            <div class="header-top-strip">
                <div class="container">
                    <div class="header-top-left">
                        <p style="float: left;"><a href="">24x7 Customer Care</a>  </p>
                        <p style="float: right;"><i class="fa fa-phone" style="color: #ED1B24;"></i><a href=""> 0484-4000071</a>  </p>
                        <p style="float: right;margin-right: 25px;"><i class="fa fa-envelope" style="color: #ED1B24;"></i><a href=""> expresscok@gmail.com</a>  </p>
                        
                    </div>
                   

                </div>
            </div>
            <div class="container">
                <div class="main-content">
                    <div class="header">
                        <div class="logo">
                            <a href="<?php echo base_url();?>"><img src="<?php echo resource('frontend')?>images/logo.png"  style="width: 100%;"/></a>
                        </div>
                        <div class="search">
                            <div class="search2">
                                <img src="<?php echo resource('frontend')?>images/iso.png" style="float:right;"/>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="bootstrap_container">
                        <nav class="navbar navbar-default w3_megamenu" role="navigation">
                            <div class="navbar-header">
                                <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><i class="fa fa-home" style="color: #ED1B24;"></i></a>
                            </div><!-- end navbar-header -->

                            <div id="defaultmenu" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php echo base_url();?>">Home</a></li>	
                                    <li><a href="<?php echo base_url('about');?>">About Us</a></li>	
                                    <li><a href="<?php echo base_url('tracking');?>">Live Tracking</a></li>	
                                    <li><a href="<?php echo base_url('contact');?>">Contact Us</a></li>	
                                </ul><!-- end nav navbar-nav -->
                                <div class="social-icons-headarg">
                                    <a href="" target="_blank" ><i class="fa fa-facebook"></i></a>
                                    <a href="" target="_blank" ><i class="fa fa-twitter"></i></a>
                                    <a href="" target="_blank" ><i class="fa fa-linkedin"></i></a>
                                    <a href="" target="_blank" ><i class="fa fa-google-plus"></i></a>
                                </div>

                            </div><!-- end #navbar-collapse-1 -->
                        </nav><!-- end navbar navbar-default w3_megamenu -->
                    </div><!-- end container -->
