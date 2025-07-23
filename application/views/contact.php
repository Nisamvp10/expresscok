
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Contact Us</li>
</ol>

<div class="contact">  
	<h3>Contact Us</h3>	
	<div class="contact-form">
        <div class="col-md-8 contact-grid">
			<form method="post" action="<?php echo base_url("contact/send-message");?>">
                    
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
				<div class="col-md-6"><p class="your-para">Your Name:</p>
				<input name="name" required="required" type="text" />
				</div>
				<div class="col-md-6"><p class="your-para">Subject:</p>
				<input name="meta_content" required="required" type="text" />
				</div>
				<div class="col-md-6"><p class="your-para">Your Mobile:</p>
				<input name="file" type="text" required="required" />
				</div>
				<div class="col-md-6"><p class="your-para">Your Mail:</p>
					<input name="email" type="text" required="required"  />
				</div>
				<div class="col-md-12"><p class="your-para">Your Message:</p>
				<textarea name="content" rows="2" cols="20" >
				</textarea>
				</div>
				<div class="send">
					<button type="submit" value="Submit"  />Submit </button>
				</div>
            </form>
            
        </div>
  <p itemprop="telephone" class="sed-para fa fa-home">   CALL : <a href="tel:+917403005001">7403005001</a>  </p>

           </div>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> Location Address : </p>
            <p class="sed-para fa fa-home"> Head Office - HUB : </p>
            <p class="para1"> Ex Courier India Private Limited <br/>
1st Floor, Elite Building, <br/>
Metro Pillar Number 665 & 664 M.G. Road, Padma Junction, <br/>
Cochin kerala India-682 035 </p>
PH : <a href="tel:+917403005001">7403005001</a> LAND: 0484 4000071 </p>


         </div>
        <div class="col-md-4 contact-in">
             <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="col- contact-in">
            <p class="sed-para fa fa-home"> Head Office - HUB : </p>
            <p class="para1"> Ex Courier India Private Limited <br/>
1st Floor, Elite Building, <br/>
Metro Pillar Number 665 & 664 M.G. Road, Padma Junction, <br/>
Cochin kerala India-682 035 </p>
PH : <a href="tel:+917403005001">7403005001</a> LAND: <a href="tel:+ 00914844000071">0484 4000071 </a></p>


         </div>
         </div>
        <div class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> KOZHIKODE -BRANCH : </p>
            <p class="para1"> Ex Courier India Private Limited <br/>
Wholesale Hub
17/1463 Room no A1, <br/>
AL Ameen Building Ram Mohan Road,
Chinthavalappu Near Renaissance Hotel, <br/>
Kozhikode, Kerala India 673004 </p>  
PH : <a href="tel:+917403005001">917403005001</a> </p>
        
        </div>
        
        <div class="col-md-4 contact-in">

            <p class="sed-para fa fa-home"> KAKKANAD STORE : </p>
            <p class="para1"> Contact: Nithin Sudhakaran <br/>
            <p class="para1"> Ex Courier India Private Limited <br/>
Wholesale Hub -Fathima Complex <br/>
Above Afters Cake Shop  
Near Kuzhikkattumoola Juma Masjid, 
Info Park Road Kakkanad, <br/> 
Ernakulam Kerala India 682030 </p>

PH : <a href="tel:+00914844000071">8547528489</a> | <a href="tel:+917403005001">7403005001</a> | <a href="tel:+919074682559">9074682559</a>  </p>
<!--<p class="sed-para fa fa-phone"> Phone : </p>-->

            <!--<p class="sed-para fa fa-envelope"> Email : </p>-->
            <!--<p class="para1">  expresscok@gmail.com </p>-->
       
        </div>
        
       <div class="col-sm-12">
            <div class="row">
                
                <div class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> KALAMASSERY STORE : </p>
            <p class="para1"> Express International <br/>
               International Courier Booking Centre DHL </br>Ground floor , Paul's corner,</br>Opp ITI, Kairali Nagar, HMT Rd, po, </br>
               Kalamassery, Ernakulam, Kerala 682022
               </p>  
                PH : <a href="tel:+917403005001">7403005001</a> </p>

        </div>
                        <div class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> THRISSUR  </p>
            <p class="para1">  EXPRESS INTERNATIONAL COURIER AND CARGO <br/>
             1ST FLOOR CJ TOWER OPPOSITE MALAYALA MANORAMA IKKANDA WARRIER ROAD  ,</br> THIRISSUR 680001</p>  
                PH : <a href="tel:+00918943006669">0091 8943006669</a> <br>
                </p>
        
        </div>
        
            

        
        
         <div class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> PALARIVATTOM COCHIN </p>
            <p class="para1">  GROUND FLOOR KALYANI COMPLEX <br/>
              EXPRESS DIVISION , </br>OPPOSITE AXIS BANK , MKK NAIR ROAD ,</br> PALARIVATTOM COCHIN 682025</p>  
                PH : <a href="tel:+00917519412345">0091 7519412345</a> <br>
                 PH : <a href="tel:+00919846966669">0091 9846966669</a> </p>
                </p>
        
 
 
 

        </div>
        
        
         </div>
         <div class="row">

         </div>
       </div>
        
        
        
        
        <div class="clearfix"> </div>
    </div>
    <h4>our location</h4>
    <div class="c-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125742.1012068311!2d76.2128943760249!3d9.980410520859131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b086d7f1af955d7%3A0x344a733d71a4f7c!2sExpress+International+Courier+and+Cargo!5e0!3m2!1sen!2sin!4v1495623883216" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


<!-- Global site tag (gtag.js) - Google Ads: 617329268 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-617329268"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-617329268');
</script>


   