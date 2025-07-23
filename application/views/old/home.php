  <div class="main-banner">
    <div class="banner col-md-8">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N1.png" class="img-responsive" alt="" />
                    </li>
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N2.png" class="img-responsive" alt="" />
                    </li>
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N3.png" class="img-responsive" alt="" />
                    </li>
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N4.jpg" class="img-responsive" alt="" />
                    </li>
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N5.png" class="img-responsive" alt="" />
                    </li>
                    <li>
                        <img src="<?php echo resource('frontend')?>images/N7.png" class="img-responsive" alt="" />
                    </li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
        <script defer src="<?php echo resource('frontend')?>js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="<?php echo resource('frontend')?>css/flexslider.css" type="text/css" media="screen" />
        <script type="text/javascript">
            $(function () {
                //     SyntaxHighlighter.all();
            });
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    </div>

    <div class="col-md-4 banner-right">
       
        <h4>Track Your Shipment</h4>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">				  
                        <form enctype="multipart/form-data" method="post" action="track_order_home">
							<div id="reply">
							<?php $field_data=array();if($this->session->flashdata('error')){
								$field_data=$this->session->flashdata('value');
								echo $this->session->flashdata('error');
							 } ?>
							</div>
							<input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>"> 

                        
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="text" placeholder="Enter your track id" class="form-control"  name="track_id" required <?php if(isset($field_data['name']))echo "value='".$field_data['track_id']."'";  ?> >
								<div class="pull-right" style="border: 1px solid #ED1B24;border-radius: 5px;margin: 10px 0px;">

									<button type="submit" class="btn btn-primary small" >Submit </button>
								</div>  
							</div>
						</form>
						
							
					</div>
				</div>
			</div>
		</div>
	</div>	
    <div class="clearfix"></div>
</div>
<hr>
<div class="support-grid">
    <h3  style="color: #ED1B24; margin-left:20px;">Welcome to EXPRESS INTERNATIONAL</h3>
    <p style="text-align:justify; margin-right:20px; margin-left:20px;color:black;">Express International is part of the world’s leading postal and logistics company Deutsche Post DHL Group, encompassing the business units DHL Express, DHL Parcel, DHL eCommerce, DHL Global Forwarding, DHL Freight and DHL Supply Chain.When you ship with DHL Express – you’re shipping with specialists in international shipping and courier delivery services! </p>
    <br/>
</div>
<div class="review-slider">
    <h4  style="color: #ED1B24; font-size: 1.5em; font-weight: 600; margin-left:20px;">Services</h4>
    <div class="col-md-8">
        <ul id="flexiselDemo1">
            <li>
                <img src="<?php echo resource('frontend')?>images/r1.jpg" alt="" style="margin-right:30px;"/>
                <div class="slide-title"><center><h4>On Time Delivery</h4></center></div>

            </li>
            <li>
                <img src="<?php echo resource('frontend')?>images/r2.jpg" alt="" style="margin-right:30px;"/>
                <div class="slide-title"><center><h4>Door To Door Services</h4></center></div>

            </li>
            <li>
                <img src="<?php echo resource('frontend')?>images/r3.jpg" alt="" style="margin-right:30px;"/>
                <div class="slide-title"><center><h4>24 x 7 Service</h4></center></div>

            </li>
            <li>
                <img src="<?php echo resource('frontend')?>images/r4.jpg" alt="" style="margin-right:30px;"/>
                <div class="slide-title"><center><h4>Company Vehicles</h4></center></div>

            </li>
            <li>
                <img src="<?php echo resource('frontend')?>images/r5.jpg" alt="" style="margin-right:30px;"/>
                <div class="slide-title"><center><h4>Worldwide Shipping</h4></center></div>

            </li>
        </ul>
    </div>
    <div class="right-side-bar col-md-4">


        <div class="quick-pay">
            <h3>Online Live Tracking</h3>
            <p class="payText"  style="text-align:justify;">Tracking of your own consignment on road :</p>

            <p class="payText" style="text-align:justify;">>> Location</p>
            <p class="payText" style="text-align:justify;">>> Spreed of travelling</p>
            <p class="payText" style="text-align:justify;">>> approximate arrival time</p>
            <p  class="payText" style="text-align:justify;">We are proud to be the first to give this service to customer. </p>

        </div>

    </div>
    <script type="text/javascript">
        $(window).load(function () {

            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint: 800,
                        visibleItems: 4
                    }
                }
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo resource('frontend')?>js/jquery.flexisel.js"></script>	
</div>
