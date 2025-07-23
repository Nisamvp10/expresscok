
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">About Us</li>
</ol>
<!----->
<div class="about-section">

    <div class="e-payment-section">
        <div class="col-md-8 payment-left">
            <div class="confirm-details">
                <h3 style="margin-bottom:10px;">About Us</h3>
                <p style="text-align:justify;font-size: 0.95em;line-height: 1.8em;font-weight: 400;">
                    <img src="<?php echo resource('frontend')?>images/r4.jpg" height="150px" style="float:left; margin-right:10px; margin-top:4px;width: 240px;height: 140px;" /> Express International is part of the world’s leading postal and logistics company Deutsche Post DHL Group, encompassing the business units DHL Express, DHL Parcel, DHL eCommerce, DHL Global Forwarding, DHL Freight and DHL Supply Chain.When you ship with DHL Express – you’re shipping with specialists in international shipping and courier delivery services! 
                </p>
            </div>
            <div class="payment-options">
                <div class="tabs-box">
                    <ul class="tabs-menu booking-menu">
                        <li><a href="#tab1" style="color:#0094ff;"><b>Our History</b></a></li>
                        <li><a href="#tab2" style="color:#0094ff;"><b>Our Mission</b></a></li>
                        <li><a href="#tab3" style="color:#0094ff;"><b>What We Do</b></a></li>
                    </ul>
                    <div class="clearfix"> </div>
                    <div class="tab-grids event-tab-grids">
                        <div id="tab1" class="tab-grid">
                            <p style="text-align:justify;"><img src="<?php echo resource('frontend')?>images/images.jpeg" style="float:left; margin-right:10px;width: 170px;height: 100px;" />Express Logistics provides end-to-end goods management through a variety of supply chain services, including contract logistics, freight brokerage, and many more.</p>
                        </div>
                        <div id="tab2" class="tab-grid"><p style="text-align:justify;"><img src="<?php echo resource('frontend')?>images/mission_v5.png" style="float:left; margin-right:10px;" />Logistics comprises the means and arrangements which work out the plans of strategy and tactics. Strategy decides where to act; logistics brings the troops to this point.</p>
                        </div>
                        <div id="tab3" class="tab-grid">
                            <p style="text-align:justify;"><img src="<?php echo resource('frontend')?>images/expertise_v5.png" style="float:left; margin-right:10px;width: 170px;height: 150px;" />DHL Express transports urgent documents and goods reliably from door-to-door on time and operates the most comprehensive global express network.</p>

                        </div>
                    </div>			
                    <div class="clearfix"> </div>
                </div>
                
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
        </div>
         <div class="col-md-4">
			<div class="banner-right">
				<h4>Track Your Shipment</h4>
				<div class="grid_3 grid_5">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">				  
								<form enctype="multipart/form-data" method="post" action="track_order1">
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
			   
				<div>
					<img src="<?php echo resource('frontend')?>images/aboutimg.jpeg" style="margin-top: 53px;width: 100%;height: 265px;" />
				</div>
			</div>
        <div class="clearfix"></div>
    </div>
    <!--start-carrer-->
    <!----- Comman-js-files ----->
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
</div>
