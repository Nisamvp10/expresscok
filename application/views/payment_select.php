<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script src="https://kit.fontawesome.com/f9275dded9.js" crossorigin="anonymous"></script>

<style>
.address-wrap{
        text-align: center;
        padding: 20px;
        border: 1px #ddd solid;
        border-radius: 5px;
        font-family: ui-sans-serif;
        display:block!important;
    }
    .address-wrap i{
        font-size: 20px;
        margin-bottom: 1rem;
        padding-top: 20px;
    }
     .address-wrap .alpha{
        padding:10px 0;
        font-size:16px;
    }
    #addressPanel input{
        height:40px;
        outline:none;
        border: 1px #ddd solid;
        box-shadow: none;
        
    }
#addressPanel .modal-body {
    padding: 50px 40px 10px 40px;
}
.float-right{
    float: right;
}
.aiz-megabox{
    width: 100%;
    height: 100%;
    display: flex;
    border: 1px #ddd solid;
    padding: 10px;
    position: relative;
}
.inner-wrap{
    display:flex;
    width:97%;
}
.cm-btn{
    float: right;
    display: block;
    margin: 15px;
    height: 45px;
    padding: 10 39px;
}
.aiz-megabox-elem{
    padding-left: 10px;
}
#innerwarap{
    width:100%;
    display: block;
}

/*pay css*/

.receipt {
  position: relative;
  background-color: #ffffff;
  width: 100%;
  margin: 0 auto;
  -webkit-animation: fade 2s ease both;
  -moz-animation: fade 2s ease both;
  animation: fade 2s ease both;
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
  border:1px #ddd solid;
}
.receipt h1 {
  text-align: left;
  font-size: 18px;
  text-transform:uppercase;
  padding: 15px;
  
}

.payments table {
  width: 100%;
}
.payments table tr td {
  margin: 0;
  padding: 1px 20px;
}
.payments table tr td:nth-child(1) {
  text-align: left;
}
.payments table tr td:nth-child(2) {
  text-align: right;
}

.total {
  background: #e6e6e6;
}
.total p {
  color: #171717;
}

.pay:hover div {
  background-color: #f44052;
  cursor: pointer;
}
.pay div {
  background-color: #d64550;
  width: 100%;
  height: 40px;
  text-align: center;
  padding: 2px 0;
}
.pay div p {
  color: white;
}

@keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-webkit-keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-moz-keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 1; 
  }
}

</style>

<?php if(!empty($grandtotal) ){
     $total = $grandtotal[0]->amount;
}

if(!empty($owner_id)){
    $owner = $owner_id;
}else{
    $owner ='';
}
?>
<div class="container">
    <div class="row">
        <form id="checkout-form" action="<?=base_url('payment/razpay')?>" method="post" >
            <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>   
           <input type="hidden" name="owner_id" value="<?=$owner?>" />
            <div class="inner-wrap" >
                <div class="" id="innerwarap">
                    <div class="col-sm-12 col-md-8 col-lg-8 summary_table" >
                       
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="receipt">
                          <h1>Order Summary</h1>
                          <div class="payments">
                             <table>
                                <tr>
                                   <td><p>Total </p></td>
                                   <td><p><?=$total;?></p></td>
                                </tr>
                                <tr>
                                   <td><p>Tax </p></td>
                                   <td><p>00.00</p></td>
                                </tr>
                              
                              
                             </table>
                             <table class="total">
                                <tr>
                                   <td><p>Grand Total</p></td>
                                   <td><p><?=$total;?></p></td>
                                </tr>
                             </table>
                             <a class="pay">
                                <div>
                                   <p>Pay</p>
                                </div>
                             </a>
                          </div>
                        </div>
                    </div>
                </div>
                 
      
        </div>
        <div class="container">
            <div class="pt-3">
                        <label class="aiz-checkbox">
                            <input type="checkbox" required="" id="agree_checkbox">
                            <span class="aiz-square-check"></span>
                            <span>I agree to the</span>
                        </label>
                        <a href="">terms and conditions</a>,
                    </div>
            <div class="col-sm-12">
                <input type="submit" onclick="submitOrder(this)" class="cm-btn" value="Continue" />
            </div>
        </div>
        </form>
    </div>
</div>




<div class="container">
    <?php 	$this->load->view('includes/footer');?>
    </div>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
   function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','You need to agree with our policies');
                $(el).prop('disabled', false);
            }
        }
        
    summary();

     function removewallet(e){
        var id = e;
          var formData = {'id':e,'<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'};
        $.ajax({
            url:'<?=base_url('payment/removeitems')?>',
            method:'post',
            data:formData,
           	dataType: 'json',
				// 	cache: false,
				// 	contentType: false,
					//processData: false,
            success:function(res){
                console.log(res);
                 alert(e);
                if(res.status==200){
                   
                    console.log(res);
                    $('.summary_table_msg').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ res.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
									
								});
							}); // /.alert
							summary();
                }
            }
        })
    }  

    function summary(){
        $.ajax({
             type: "POST",
            url:"<?=base_url('payment/summary')?>",
            data:{'<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'},
            success:function(res){
                $('.summary_table').html(res);
            }
        })
        
    }
    
</script>
