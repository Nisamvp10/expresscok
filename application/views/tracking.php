<style type="text/css">
      .tftable {
          margin-top: 25px;
          width: 649px;
      }
      .head1 {
          font-size: 13px;
          font-weight: bold;
          width: 320px;
      }
      .head2 {
          position: relative;
          font-size: 13px;
          font-weight: bold;
          width: 320px;
      }
      .myTable {
          width: 700px;
          margin-top: 20px;
          border: 1px solid #ccc;
      }
      .myTable th {
        min-width: 118px;
        background: #ca0000;
        color: #ffcc00;
        font-size: 13px;
      }
      .myTable th, .myTable td{
        padding: 5px;
        padding-left: 10px;
      }
      .myTable2 th {
          line-height: 30px;
          padding-left: 10px;
      }
      .myTable2 th {
          line-height: 30px;
          padding-left: 10px;
           background: #ca0000;
            color: #ffcc00;
          font-size: 13px;
          border-bottom: 1px solid #CCC;
          border-top: 1px solid #ccc;
      }
      .myTable2 td {
          padding: 5px 0 5px 10px;
      }
      .disare_head {
          width: 300px;
      }
      .status_origen_head {
          width: 260px;
      }
      .abnumber_head {
          width: 160px;
      }
      .origen_head {
          width: 300px;
      }
      tbody {
          border: 1px solid #f3f3f3;
      }
      .detailRepot {
        margin-top: 21px;
        display: block;
        color: #525252;
        font-size: 13px;
        font-weight: bold;
      }
      .myTable2 {
          width: 700px;
          margin-top: 20px;
          border-bottom: 1px solid #CCC;
          padding-bottom: 30px;
      }
      .deliverd {
          color: #090;
          font-weight: bold;
      }
      .grid_8.alpha.omega.wrap {
          background: #fff;
          border-radius: 5px;
          border: 1px solid #d4d4d4;
          margin: 0 auto;
          float: none;
          margin-top: 40px;
          padding-top: 20px;
          padding-bottom: 20px;
      }
      .errormsg{
        text-align: center;
        color: red;
      }
      
      .grid_8 {
          width: 300px;
      }
      .home-highlight-item {
          padding: 10px 20px 0;
      }
      .trackpara {
          position: relative;
          color: #565655;
      }
      .rightbox {
          width: 258px;
          height: 120px;
          border-radius: 5px;
          margin-left: -1px;
          /* background-color: #CCCCCC; */
          margin-top: -12px;
      }
     
      .tophed {
          font-size: 16px;
          color: #c52a2c;
      }
      
      .route .col-md-6 div{
        border-radius: 5px;
        padding: 20px;
        height: 200px;
        box-shadow: 0px 0px 10px #e0e0e0;
      }
      
      .route .col-md-6 div h2{
        font-weight: 700;
        margin-bottom: 10px;
      }
      
      .route .col-md-6 div h5{
        font-weight: 700;
        margin-bottom: 7px;
      }
      
      .row.history{
          padding: 15px 0;
           border-bottom: 1px dotted #ccc;
           margin-bottom:10px;
      }
      .row.history h4{
          font-weight: 600;
          margin-bottom: 7px;
      }
     
     
/*    .tracking_noresult, .grid_8.alpha.omega.wrap{
      display: none;
    }*/
    </style>
    
    <style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap");
*, *::after, *::before {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}




figure figcaption h4 {
  font-size: 1.4rem;
  font-weight: 500;
}
figure figcaption h6 {
  font-size: 1.5rem;
  font-weight: 300;
  color:#000;
}
figure figcaption h2 {
  font-size: 1.6rem;
  font-weight: 500;
}

.order-track {
    width:100%;
  margin-top: 2rem;
  padding: 0 1rem;
  border-top: 1px dashed #2c3e50;
  padding-top: 2.5rem;
  display: flex;
  flex-direction: column;
  
  transform-origin: top center;
    padding:0 !important;
    margin-top: 0!important;
    padding-top: 0!important;
}
.order-track-step {
  display: flex;
  height: 7rem;
  padding: 10px 0;
}
.order-track-step:last-child {
  overflow: hidden;
  height: auto;
}
.order-track-step:last-child .order-track-status span:last-of-type {
  display: none;
}
.order-track-status {
  margin-right: 1.5rem;
  position: relative;
}
.order-track-status-dot {
  display: block;
  width: 1.2rem;
  height: 1.2rem;
  border-radius: 50%;
  background: #f05a00;
}
.order-track-status-line {
  display: block;
  margin: 0 auto;
  width: 2px;
  height: 6rem;
  background: #f05a00;
}
.order-track-text-stat {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 2px!important;
}
.order-track-text-sub {
  font-size: 14px;
  font-weight: 300;
  width:100%;
}

.order-track {
  transition: all .3s height 0.3s;
  transform-origin: top center;
}
.track-head img{
    max-width:150px;
}
.track-head h4,.track-head h6 {
   text-transform: uppercase;
    padding: 0;
    margin: 0;
    font-weight: 400;
    color: #f1853e;
    font-size: 18px;
    line-height: 24px;
}
.trck-tp {
    margin-top:35px;
}
.track-title{
    margin-top: 25px;
    text-transform: uppercase;
    color: #ebbe08;
    border-bottom: 2px #ec1c25 solid;
}
.root{
    padding: 1px 0 0 15px;
    box-shadow: 0px 3px 12px #ddd;
    margin-top: 10px;
}


/* Define an animation behavior */
@keyframes spinner {
  to { transform: rotate(360deg); }
}
/* This is the class name given by the Font Awesome component when icon contains 'spinner' */
.icon-spinner {
  /* Apply 'spinner' keyframes looping once every second (1s)  */
  animation: spinner 1s linear infinite;
}
@media (max-width: 768px){
    .order-track-step {
    height: auto;
    padding: 0 0;
}
.root {
    padding: 1px 0 0 0px;
     box-shadow: none; 
    margin-top: 10px;
}
}
</style>

<ol class="breadcrumb">

    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Live Tracking</li>
</ol>

<div class="about-section" style="margin-bottom: 50px;">

    <div class="e-payment-section">
        <div class="col-md-8 col-sm-8 col-xs-12 payment-left">
            <div class="confirm-details">
                <h3 style="margin-bottom:10px;">Live Tracking</h3>
                <p style="text-align:justify;font-size: 0.95em;line-height: 1.8em;font-weight: 400;"><img src="<?php echo resource('frontend')?>images/pic-42.jpg" height="130px" style="float:left; margin-right:10px; margin-top:4px;" /> Our vehicles are installed with GPS tracking system to ensure the safety of vehicle, consignment and also will enable data like Latitude, Longitude, Speed Idle Time and running status of Vehicles to our application server. </p>
                <p>&nbsp;</p>
                <p style="text-align:justify;font-size: 0.95em;line-height: 1.8em;font-weight: 400;">This also helps us for scheduled operating of vehicles always connecting to the branches enroute and reporting movements to ensure prompt delivery. Moreover we provide Login credential to corporate companies to know the location of the vehicle.</p>

            </div>

                <div class="col-md-12 col-sm-12 col-xs-12 payment-left">
    <?php   if(!empty($result)){
                if($result->status =="Success"){ ?>
                    
                    <section class="root html-content" id="html-content">
                        <div class="main-title-head" style="position:relative"> 
                         <h4 class="track-title">Tracking Details</h4>
                         <a href="javascript:void(0)"  id="downloadPDF" onclick="CreatePDFfromHTML('<?php if(!empty($result->response->order_id)){ echo $result->response->order_id; }?>')" style="position:absolute;right:20px; top:0;text-transform:uppercase">Print to pdf</a>
                        </div>
                        
                        <figure class="track-head">
                            <div class="col-sm-4">
                                <img src="https://image.flaticon.com/icons/svg/970/970514.svg" alt="">
                            </div>
                             <div class="col-sm-8">
                                 <figcaption class="trck-tp">
                               
                                <h6>awb no: <?php if(!empty($result->response->awbno)){ echo $result->response->awbno;}?></h6>
                                 <h6>Order Number # <?php if(!empty($result->response->order_id)){ echo $result->response->order_id; }?></h6>
                            </figcaption>
                             </div>
                             
                             <divv class="row">
                                 <?php if(!empty($result->response->scan)){
                                            foreach ($result->response->scan as $key){?>
                                                <div class="order-track">
                                                   <div class="order-track-step">
                                                     <div class="order-track-status">
                                                       <span class="order-track-status-dot"></span>
                                                       <span class="order-track-status-line"></span>
                                                     </div>
                                                     <div class="order-track-text">
                                                       <p class="order-track-text-stat"><?=$key->time?></p>
                                                       <span class="order-track-text-sub"><?=$key->location?></span> 
                                                       <span class="order-track-text-sub"><?=$key->status_detail?></span>
                                                     </div>
                                                   </div>
                                                   <?php 
                                           
                                                }
                                            }
                                        ?>
                             </div>
                            
                            
                        </figure>

                    </section>
                    <div class="editor" id="editor"></div>


            <?php
            }else{
                    $status ="Failed";
                }
               
                
            } ?>
            <div id="editor"></div>


             <!--<h5 class="banner-title" style="color: #2c3276;padding: 15px 0;">Tracking Results of #<?php  if(!empty($awbNo)){ echo $awbNo;} ?></h5> <br/>-->
                <?php if(!empty($hasResults)){ ?>
                <div class="tracking_result" id="tracking_result">
                    <div class="row route">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="destination">
                                <h5 class="banner-title" style="color: orange;padding: 15px 0;">Origin</h5>
                               <?php if(!empty($origin)){?>  <p><?php echo $origin;?></p> <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="destination">
                                <h5 class="banner-title" style="color: orange;padding: 15px 0 ;">Destination </h5>
                                 <?php if(!empty($destination)){?> <p><?php echo $destination;?></p> <?php } ?>
                            </div>
                        </div>
                    </div>
                <br><br>
                <h4 style="color: #2c3276">Tracking History</h4><br>
                <div class="table-wrapper">
                   
                          <?php foreach ($trackSubDetails as $_trackInfo) {
                              $trackInfo = (array)$_trackInfo;
    
                              $_ship_date = new DateTime($trackInfo['STATUSDATE']);
                              $ship_date  = $_ship_date->format('l, d M Y');
    
                              $statusDesc = !empty($trackInfo['REMARKS'])? $trackInfo['REMARKS']: ($trackInfo['STATUSCODE'] == 'POD'? 'Item Delivered': $trackInfo['STATUSCODE']) ;
                            ?>
                            
                             <div class="row history">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h4 style="font-size: 20px;" class="banner-title"><?php echo $ship_date. ' '.$trackInfo['STATUSTIME'] ;?></h4>
                                    <h6 class="banner-title" style="color: green"><?php echo $statusDesc;?></h6>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p ><?php echo $trackInfo['BRANCH'] ;?></p>
                                    <p ><?php echo $trackInfo['RECEIVER'] ;?></p>
                                </div>
                            </div>
                   
                          <?php } ;?>
                         
                       <!--</tbody>-->
                    </table>
                </div>
                <br>
                <div class="printfooter">
                   <span style="font-size:12px;font-family:Arial">Thank you for using the Ex Courier Tracking Service. The Tracking Results have been produced based on the most current information about your shipment(s). For additional support and/or help, please contact our <a href="mailto:expresscok@gmail.com" target="_blank">Support Team</a>.</span>
                </div>
                </div>
              <?php } else{ ?>
                <div class="tracking_noresult" id="tracking_noresult">
                    <div class="errormsg">
                      No records found.
                    </div>
                </div>
                <?php } ?>

          
        </div>

          
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12 right_panel">
            <div class="express_tab">Express</div>  
            <div class="col-md-12 col-sm-12 col-xs-12 track_div_arg">
                <h5 class="fa fa-minus-square" style="float: left;padding: 5px 0px 0px 10px;">&nbsp;Track Your Shipment</h5>
				<div>
					<div id="reply">
					<?php $field_data=array();if($this->session->flashdata('error')){
						$field_data=$this->session->flashdata('value');
						echo $this->session->flashdata('error');
					 } ?>
					</div>
					<input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>"> 
                    <textarea placeholder="Enter tracking number(s)" id="txtawbno" name="track_id"></textarea>
					<input type="hidden" value="<?php echo current_url();?>" name="rurl" />
                    <button onclick="searchAwb();">Track </button>
                    <h6>Track upto 10 numbers at a time. Separate with a comma (,) or return (enter).</h6>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="fa fa-arrow-right" style="float: left;">&nbsp;More Tracking Options</a><br>
                    <a href="/contact" class="fa fa-arrow-right" style="float: left;">&nbsp;Contact Express Courier</a>
                </div>
            </div>
        </div>
    </div>
        <div class="clearfix"></div>
    </div>
    
     <div class="container">
                <div class="row" style="padding: 50px 0px;">
                <div class="col-md-2 col-sm-2 col-xs-12 track_links" style="border:1px #ddd solid;border-radius:5px; margin:0 15px; padding:0;">
                    <a href="https://www.aramex.com/track/shipments/" target="_blank"><img class="img-responsive" src="<?php echo resource('frontend')?>images/logos/slide-2.png" alt="Aramex" /></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 track_links" style="border:1px #ddd solid;border-radius:5px; margin:0 15px; padding:0;">
                    <a href="https://www.ups.com/WebTracking/track?loc=en_us" target="_blank"><img class="img-responsive" src="<?php echo resource('frontend')?>images/logos/slide-3.png" alt="UPS" /></a>
                </div>
                <!--<div class="col-md-2 col-sm-2 col-xs-12 track_links">-->
                <!--    <a href="https://www.fedex.com/apps/fedextrack/?action=track" target="_blank"><img class="img-responsive" src="<?php echo resource('frontend')?>images/logos/fedex_logo_feature.png" alt="FedEx" /></a>-->
                <!--</div>-->
                <div class="col-md-2 col-sm-2 col-xs-12 track_links" style="border:1px #ddd solid;border-radius:5px; margin:0 15px; padding:0;">
                    <a href="https://www.expresscok.com/tracking"><img class="img-responsive" src="<?php echo resource('frontend')?>images/logos/slide-1.png" alt="DHL" /></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 track_links" style="border:1px #ddd solid;border-radius:5px; margin:0 15px; padding:0;">
                    <a href="https://www.bluedart.com/maintracking.html" target="_blank"><img class="img-responsive" src="<?php echo resource('frontend')?>images/logos/slide-4.png" alt="Bluedart" /></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 track_links" style="border:1px #ddd solid;border-radius:5px; margin:0 15px; padding:0;">
                    <a href="http://www.dtdc.in/tracking/shipment-tracking.asp" target="_blank"><img  class="img-responsive" src="<?php echo resource('frontend')?>images/logos/slide-5.png" alt="DTDC" /></a>
                </div>
            </div>
            
            
            <div class="row" style="width: 96%;margin: 0;padding: 0;">
                
                <div class="col-sm-6">
                    <div class="" style="border:1px solid #dee2e6;border-radius:50px;padding:30px;">
							<span style="float: left;font-size: 43px;line-height: 51px;color:#ED1B24;max-width: 125px;display: block; padding-right:15px;" class="fa fa-phone"></span>
							<div class="alignLeft pl-2" style="padding-left: 10px;">
								<strong class="headingV fwEbold d-block mb-1" style="font-size: 16px;line-height: 18px;">Call Now for any query</strong>
								<p class="m-0">	<a href="tel:00914844000071">0484-4000071</a> ,<a href="tel:00917403005001">7403005001</a></p>
							
							</div>
						</div>
                </div>
                
                <div class="col-sm-6"> <div class="" style="border:1px solid #dee2e6;border-radius:50px;padding:30px;"><div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
						<span style="float: left;font-size: 43px;line-height: 51px;color:#ED1B24;max-width: 125px;display: block; padding-right:15px;" class="fa fa-envelope"></span>
								<div class="alignLeft pl-2" style="padding-left: 10px;">
									<strong class="headingV fwEbold d-block mb-1" style="font-size: 16px;line-height: 18px;">Email</strong>
								<p class="m-0">care@expresscok.com</p>
							</div>
						</div>
                </div>
                
               
        
                
            </div>

           </div>
    <!--start-carrer-->
    <!----- Comman-js-files ----->
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script>
        $(document).ready(function () {
            $("#tab2").hide();
            $("#tab3").hide();
            $("#tab4").hide();
            $(".tabs-menu a").click(function (event) {
                event.preventDefault();
                var tab = $(this).attr("href");
                $(".tab-grid").not(tab).css("display", "none");
                $(tab).fadeIn("slow");
            });
        });
    </script>
</div>



<script type="text/javascript">
    window.onload = function(){
        $('#txtawbno').keypress(function (e) {
         var key = e.which;
         if(key == 13)  // the enter key code
          {
            searchAwb();
            return false;  
          }
        });   
    };
    function searchAwb() {      
        $(".error").remove();   
        var hasError = false;
        var awbNum = $('#txtawbno').val().trim();
        if(awbNum == '' || awbNum.length < 6) {
          $("#txtawbno").after('<span style="color:#bf0c0c;font-size:11px;position:relative;display:block;" class="error">Please enter a valid Airway Bill Number.</span>');
          hasError = true;
        }
        
        if(!hasError)
        {
           location.href = '/tracking/' + awbNum;
        }
    }
    
    
    //Create PDf from HTML...
function CreatePDFfromHTML(e) {
    $('.html-content').css('box-shadow','none');
    $('#downloadPDF').html('<label class="icon icon-spinner icon-spin"></label>');
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("https://image.flaticon.com/icons/svg/970/svg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'svg', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'svg', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("track_id_"+e+".pdf");
        //$(".html-content").hide();
          $('.html-content').css('box-shadow','0px 3px 12px #ddd;');
    $('#downloadPDF').html('Print to pdf');
    });
}
</script>