<marquee><?php if(isset($news)&&!empty($news)){
	foreach($news as $scroll){	?>
	<?php echo $scroll['content'] ;?>
<?php }} ?>	</marquee>
<div class="col-md-12 col-sm-12 col-xs-12 main-banner">
    <div class="banner col-md-8 col-sm-8 col-xs-12">
        <section class="slider">
                <div class="flexslider">
                <ul class="slides">
					<?php if(isset($slides)&&!empty($slides)){
						
					foreach($slides as $slide){	?>
                    <li>
                        <img src="<?php echo base_url($slide['file']);?>" class="img-responsive" alt="Express International COURIER & CARGO SERVICE" />
                    </li>
                    <?php }} ?>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
        <script defer src="<?php echo resource('frontend')?>js/jquery.flexslider.min.js"></script>
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
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12 right_panel">
            <div class="express_tab">Express</div>  
            <div class="col-md-12 col-sm-12 col-xs-12 track_div_arg">
                <h5 class="myw-track-heading fa fa-minus-square">&nbsp;Track Your Shipment</h5>
				<div>
					<div id="reply">
					<?php $field_data=array();if($this->session->flashdata('error')){
						$field_data=$this->session->flashdata('value');
						echo $this->session->flashdata('error');
					 } ?>
					</div>
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>"> 
                    <textarea placeholder="Enter tracking number(s)" id="txtawbno" name="track_id"></textarea>
					<input type="hidden" value="<?php echo current_url();?>" name="rurl" />
                    <button onclick="searchAwb();">Track</button>
                    <h6>Track upto 10 numbers at a time. Separate with a comma (,) or return (enter).</h6>
                </div>
                <div class="more_tracking col-md-12 col-sm-12 col-xs-12">
                    <a class="fa fa-arrow-right">&nbsp;More Tracking Options</a><br>
                    <a href="/contact" class="fa fa-arrow-right">&nbsp;Contact Express Courier</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">-->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="review-slider">
                <!--<h4  style="color: #ED1B24; font-size: 1.5em; font-weight: 600; margin-left:20px;">Services</h4>-->
                <div class="sliderarg">
                    <ul id="flexiselDemo1">
                        <li>
                            <img alt="Express International COURIER & CARGO SERVICE" src="<?php echo resource('frontend')?>images/r1.jpg"/>
                            <div class="slide-title"><h4>On Time Delivery</h4></div>

                        </li>
                        <li>
                            <img alt="Express International COURIER & CARGO SERVICE" src="<?php echo resource('frontend')?>images/r2.jpg" />
                            <div class="slide-title"><h4>Door To Door Services</h4></div>

                        </li>
                        <li>
                            <img alt="Express International COURIER & CARGO SERVICE" src="<?php echo resource('frontend')?>images/r3.jpg" />
                            <div class="slide-title"><h4>24 x 7 Service</h4></div>

                        </li>
                        <li>
                            <img alt="Express International COURIER & CARGO SERVICE" src="<?php echo resource('frontend')?>images/r4.jpg" />
                            <div class="slide-title"><h4>Company Vehicles</h4></div>

                        </li>
                        <li>
                            <img alt="Express International COURIER & CARGO SERVICE" src="<?php echo resource('frontend')?>images/r5.jpg" />
                            <div class="slide-title"><h4>Worldwide Shipping</h4></div>

                        </li>
                    </ul>
                </div>

                <div class="support-grid">
                    <h1 class="myw-btm-heading">Welcome to EXPRESS INTERNATIONAL COURIER & CARGO SERVICE</h1>
                    <h2 class="myw-btm-sub-heading">
                        Excellence. Simply delivered.
                    </h2>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#more').click(function(){
                                $('#clickshow').show();
                                $('#more').hide();
                            });
                             $('#less').click(function(){
                                $('#clickshow').hide();
                                $('#more').show();
                            });
                        });
                    function functiontoggle(){
                        var x = document.getElementById('clickshow');
                        var y = document.getElementById('more');
                        if (x.style.display === 'none') {
                            y.style.display='none';
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                            y.style.display='block';
                        }
                    }
                    </script>
                        <?php // $variable="More"; ?>
                    <p class="myw-btm-pgphs">
International express deliveries; global freight forwarding by air, sea, road and rail; warehousing solutions from packaging, to repairs, to storage; mail deliveries worldwide; and other customized logistic services – with everything Express - Ex Courier India Private Limited does, we help connect people and improve their lives.<span id="more"><br/>Read More &raquo;</span></p>
                    <div id="clickshow" >
                        <p class="myw-btm-pgphs">With a global network in over 220 countries and territories across the globe, Ex Courier India Private Limited is the most international company in the world and can offer solutions for an almost infinite number of logistics needs.</p>
                    <p class="myw-btm-pgphs">Express
                      Ex Courier India Private Limited  is part of the world’s leading International Courier Company Express International Courier And Cargo</p>
                    <h3>Express Delivery Services & International Shipping</h3>
                    <p class="myw-btm-pgphs">When you ship with Express – you’re shipping with specialists in international shipping and courier delivery services! With our wide range of express parcel and package services, along with shipping and tracking solutions to fit your needs.</p>
                    <span id="less"><br/>Show Less &laquo;</span>
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
                <script type="text/javascript" src="<?php echo resource('frontend')?>js/jquery.flexisel.min.js"></script>	
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="right-side-bar">
                <div class="quick-pay">
                    <h3>Online Live Tracking</h3>
                    <p class="payText">Tracking of your own consignment on road :</p>
                    <p class="payText">>> Location</p>
                    <p class="payText">>> Spreed of travelling</p>
                    <p class="payText" >>> approximate arrival time</p>
                    <p  class="payText">We are proud to be the first to give this service to customer. </p>
                </div>                
            </div>
        </div>
    </div>
<!--</div>-->

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
</script>
<!-- GetButton.io widget -->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+91 7403005001", // WhatsApp number
            call_to_action: "Message ", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<!-- /GetButton.io widget -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f06e5245b59f94722ba66df/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


