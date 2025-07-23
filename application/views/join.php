<ol class="breadcrumb">
    <li>&raquo;&nbsp<a href="<?php echo base_url();?>">Home</a></li>     
    <li class="active">Join Us</li>
</ol>
<style>
    h3{margin-bottom:10px;margin-top: 10px;}
    p{text-align:justify;font-size: 1.17em;line-height: 1.8em;font-weight: 400;}
    p span{font-weight: 600;}
    p a{color: #0094ff;}
    ul li{text-align:justify;font-size: 1.17em;line-height: 1.8em;font-weight: 400;list-style: none;}
    .centercontent li{text-align: center;}
    h4, h6{font-weight: 600;}
</style>
<div class="about-section">
    <div class="e-payment-section">
        <div class="col-md-12 col-sm-12 col-xs-12 payment-left">
            <div class="confirm-details">
                <h3>Business Opportunity</h3>
                <h4>Running your own rewarding business is a dream for many; and a DTD franchise could be your ticket to a brighter future.</h4><br>
                <div class="row" style="text-align:center;" ><img style="width: 100%;" src="<?php echo resource('frontend')?>images/join-us.png" ></div>
                <p>As owner operators, our franchisees are dedicated to providing each and every customer with exceptional service. To be part of the DTD team, our people must live and breathe our values and offer a truly customer-centric approach to <a href="/contact">courier services.</a></p>
                <p>At DTD Couriers, we have a small number of exciting franchise opportunities available for you to join our award winning team and share our success.</p>                            
            </div>
        </div>
        <div class="clearfix"></div>
        <h3>Join Us</h3> 
        <div class="contact-form">
            <div class="col-md-8 contact-grid">
                <form method="post" action="<?php echo base_url("join/send-message");?>">

                    <div class="msg_hldr">
                        <?php $field_data=array();if($this->session->flashdata('error')){
                            $field_data=$this->session->flashdata('value');
                            echo $this->session->flashdata('error');
                         } ?>
                         <?php 
                             if($this->session->flashdata('success')){
                                echo $this->session->flashdata('success');
                             }                         
                          ?>
                    </div>

                    <input  type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">  
                    <div class="col-md-6">
                        <p class="your-para">First Name:</p>
                        <input name="firstname" required="required" type="text" />
                    </div>
                    <div class="col-md-6">
                        <p class="your-para">Last Name:</p>
                        <input name="lastname" required="required" type="text" />
                    </div>
                    <div class="col-md-6">
                        <p class="your-para">Number:</p>
                        <input name="number" required="required" type="text" />
                    </div>
                    <div class="col-md-6">
                        <p class="your-para">Email:</p>
                        <input name="email" required="required" type="text" />
                    </div>
                    <div class="col-md-12">
                        <p class="your-para">Business Name:</p>
                        <input name="business_name" required="required" type="text" />
                    </div>
                    <div class="col-md-12">
                        <p class="your-para">Type of Business:</p>
                        <input name="business_type" required="required" type="text" />
                    </div>
                    <div class="col-md-12">
                        <p class="your-para">Address:</p>
                        <textarea name="address" rows="2" cols="20" ></textarea>
                    </div>
                    <div class="send">
                        <button type="submit" value="Submit"  />Submit </button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
