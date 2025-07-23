
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Contact Us</li>
</ol>
<!----->


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
        <div class="col-md-4 contact-in">
            <p class="sed-para fa fa-home"> Address : </p>
            <p class="para1"> Express International <br/>
1st Floor, Elite Building, <br/>
M.G. Road, Padma Junction, <br/>
Cochin-682 035 </p>
<p class="sed-para fa fa-phone"> Phone : </p>
            <p class="para1">  0484-4000071 </p>
            <p class="sed-para fa fa-envelope"> Email : </p>
            <p class="para1">  expresscok@gmail.com </p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <h4>our location</h4>
    <div class="c-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125742.1012068311!2d76.2128943760249!3d9.980410520859131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b086d7f1af955d7%3A0x344a733d71a4f7c!2sExpress+International+Courier+and+Cargo!5e0!3m2!1sen!2sin!4v1495623883216" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div> 
</div>
