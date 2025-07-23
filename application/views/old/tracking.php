
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Live Tracking</li>
</ol>
<!----->
<div class="about-section" style="margin-bottom: 50px;">

    <div class="e-payment-section">
        <div class="col-md-8 payment-left">
            <div class="confirm-details">
                <h3 style="margin-bottom:10px;">Live Tracking</h3>
                <p style="text-align:justify;font-size: 0.95em;line-height: 1.8em;font-weight: 400;"><img src="<?php echo resource('frontend')?>images/pic-42.jpg" height="130px" style="float:left; margin-right:10px; margin-top:4px;" /> Our vehicles are installed with GPS tracking system to ensure the safety of vehicle, consignment and also will enable data like Latitude, Longitude, Speed Idle Time and running status of Vehicles to our application server. </p>
                <p>&nbsp;</p>
                <p style="text-align:justify;font-size: 0.95em;line-height: 1.8em;font-weight: 400;">This also helps us for scheduled operating of vehicles always connecting to the branches enroute and reporting movements to ensure prompt delivery. Moreover we provide Login credential to corporate companies to know the location of the vehicle.</p>

            </div>


        </div>
        <div class="col-md-4">
            <div class="banner-right">
				<h4>Track Your Shipment</h4>
				<div class="grid_3 grid_5">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">				  
								<form enctype="multipart/form-data" method="post" action="track_order">
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
