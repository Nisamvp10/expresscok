<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $base_url="http://http://localhost/logistics"; ?>
    <title>Express International | Sorry! Something went wrong.</title>
    <link rel="icon" href="<?php echo $base_url.'favicon.ico';?>" />
    <link rel="shortcut icon" href="<?php echo $base_url.'favicon.ico';?>" />
    <link href="<?php echo $base_url.'resource/backend/css/jquery-ui.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo $base_url."resource/lib/bootstrap/bootstrap.min.css";?>" rel="stylesheet">
    <link href="<?php echo $base_url."resource/backend/css/bootstrap-datetimepicker.min.css";?>" rel="stylesheet">
    <link href="<?php echo $base_url.'resource/backend/css/sb-admin.css'; ?>" rel="stylesheet">
    <link href="<?php echo $base_url."resource/lib/font-awesome/css/font-awesome.min.css";?>" rel="stylesheet" type="text/css">
    <style type="text/css">
    	html, body, .container {
		    height: 93%;
		    
		}
		::selection{ background-color: #fff;}
		::moz-selection{ background-color: #fff; }
		::webkit-selection{ background-color: #fff; }
		.container {
		    display: table;
		    vertical-align: middle;
		    width: 100%;
		}
		.vertical-center-row {
		    display: table-cell;
		    vertical-align: middle;
		}
		.height-ff {
			height: 100%;
		}
		.bdy_cont{
			height: 100%;
		    border:1px solid #DDF;
		    color: #80807E;
		    box-shadow: 4px 3px 17px 4px #ddf;
		    background: url(<?php echo $base_url.'resource/frontend/img/logo_03.png'; ?>) no-repeat;
		    background-position: 6px 6px;
		    background-size: 161px;
		}
		.bdy_cont_ch1{
			width: 100%;
		    height: 100%;
		    padding-top: 110px;
		    padding-left: 26px;
		}
		.main_e_m{
			font-size: 23px;
		}
    	.main_e_m_sub i{
    		padding-left: 10px;
            font-size: 23px;
    	}
    	.bdy_cont_ch2{
    		width: 100%;
		    height: 100%;
		    padding-left: 26px;
    	}
    	.main_e_m_sub_dwn{
    		    padding: 8px;
    		    background: url(<?php echo $base_url.'resource/lib/img/session-expired.png';?>) no-repeat;
				background-position: 4px 8px;
				background-size: 3%;
				padding-left: 46px;
			    
    	}
    	.main_e_m_sub_dwntwo{
    		    padding: 8px;
    		    background: url(<?php echo $base_url.'resource/lib/img/iserror.png';?>) no-repeat!important;
				background-position: 4px 1px!important;
				background-size: 3%!important;
				padding-left: 46px!important;
			    
    	}
    	.main_e_m_sub_dwnthree{
    		    padding: 8px;
    		    background: url(<?php echo $base_url.'resource/lib/img/what.png';?>) no-repeat!important;
				background-position: 4px 1px!important;
				background-size: 3%!important;
				padding-left: 46px!important;
			    
    	}
    	.main_e_m_sub_dwnone{
    		        padding: 8px;
				    border: 1px solid #ddf;
				    width: 98%;
				    background: url(<?php echo $base_url.'resource/lib/img/maintenance.png';?>) no-repeat;
				    background-position: 4px 0px;
				    background-size: 3%;
				    padding-left: 46px;
    	}
    	.main_e_m_sub_dwndiv{
    		border: 1px solid #ddf;
			margin-right: 26px;
			margin-bottom: 10px;
			
    	}
    	.main_e_m_sub_dwn i{
    		    padding-left: 10px;
			    padding-right: 10px;
			    color: #CFCFD2;
			    font-size: 29px;
			    cursor: pointer;
			    float: right;
			    margin-right: 13px;
    	}
    	.down_er_dv {
		        width: 97%;
			    padding: 16px;
			    margin-bottom: 10px;
			    margin-left: 16px;
			    display: none;
		}
		
    </style>
</head>

<body style="background: #fff;">

        <div class="container">
		    <div class="row vertical-center-row height-ff">
		        <div class="col-lg-12 height-ff">
		            <div class="row bdy_cont">
		                  <div class="bdy_cont_ch1">
		                  	   <p class="main_e_m">Sorry! It seems to be that, the request you have submited/action you have performed could not be completed at this moment.</p>
		                  	   <p class="main_e_m_sub">This may be due to any of the following reasons.</p>
		                  	   <div class="bdy_cont_ch2">
		                  	   	   <p class="main_e_m_sub_dwnone">The website is under maintenance.</p>
		                  	   	   <div class="main_e_m_sub_dwndiv">
			                  	   	   <p class="main_e_m_sub_dwn">The session expired.<i class="fa fa-angle-down drop-down-clk-er"></i></p>
			                  	   	   <div class="down_er_dv">
			                  	   	   	   This is because the application remains idle for long time without any valid action.
			                  	   	   </div>
			                  	   </div>	   
		                  	   	   <div class="main_e_m_sub_dwndiv">
			                  	   	   <p class="main_e_m_sub_dwn main_e_m_sub_dwntwo">Internal server error.<i class="fa fa-angle-down drop-down-clk-er"></i></p>
			                  	   	   <div class="down_er_dv">
			                  	   	   	    A PHP Error was encountered.The error message shown in below,
			                  	   	   	    <div style="padding: 14px;background-color:#ddf;">
			                  	   	   	    	<p>Severity: <?php echo $severity; ?></p>
												<p>Message:  <?php echo $message; ?></p>
												<p>Filename: <?php echo $filepath; ?></p>
												<p>Line Number: <?php echo $line; ?></p>
			                  	   	   	    </div> 
			                  	   	   </div>
		                  	   	   </div>
		                  	   	   <div class="main_e_m_sub_dwndiv">
			                  	   	   <p class="main_e_m_sub_dwn main_e_m_sub_dwnthree">What is next?<i class="fa fa-angle-down drop-down-clk-er"></i></p>
			                  	   	   <div class="down_er_dv">
			                  	   	   	   <p>1. Just go back <a href="<?php echo $base_url;?>"><i class="fa fa-home"></i> Home </a>and Continue browsing.</p>
			                  	   	   	   <p>2. If you're seeing this frequently and you're owner of the website, Please contact the Administrator for further assistance.</p>
			                  	   	   	   
			                  	   	   </div>
		                  	   	   </div>
		                  	   </div>	
		                  	   
		                  </div>
		                 
		            </div>
		        </div>
		    </div>
		</div>

    <script src="<?php echo $base_url.'resource/backend/js/jquery.js'; ?>"></script>
    <script type="text/javascript">
    
		$(document).ready(function(){
	
				$(document).on('click','.drop-down-clk-er',function(){
					$('.down_er_dv').hide();
					if($(this).hasClass('its-opened')){
						$(this).removeClass('its-opened');
					}else{
						$('.drop-down-clk-er').removeClass('its-opened');
						$(this).addClass('its-opened');
						$(this).closest('.main_e_m_sub_dwndiv').find('.down_er_dv').show("slow","swing");
						
					}
					
				});
				
	    });			
	
     </script> 
         
      
</body>

</html>