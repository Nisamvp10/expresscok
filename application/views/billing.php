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
</style>
<div class="container">
    <div class="row">
        <form action="<?=base_url('payment/pay')?>" method="post" >
            <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>   
           
            <div class="inner-wrap" >
                <div class="innerwarap2" id="innerwarap"></div>
                 
      
        </div>
        <div class="container">
            <div class="col-sm-12">
                <input type="submit" class="cm-btn" value="Continue" />
            </div>
        </div>
        </form>
    </div>
</div>


<!-- Remove Employee -->
<div class="modal fade" tabindex="-1" role="dialog" id="addressPanel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title"><i class="icon icon-trash"></i> New Address</h4>
      </div>
      <div class="modal-body">

        <div class="progallery row" id="">
            <form id="addrespan" action="<?=base_url('payment/address_save')?>" method="post">
                <input  type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">  

                <div class="row">
                    <div class="col-sm-2">
                        <label>Address</label>
                    </div>
                    <div class="col-sm-10 ">
                            <div class=" form-group">
                            <textarea rows="1" name="address" required class="form-control" ></textarea>
                            </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-2">
                        <label>Country</label>
                    </div>
                     <div class="col-sm-10  ">
                        <div class="form-group">
                            <input type="text" name="country" placeholder="Country" class="form-control" >
                        </div>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-sm-2">
                        <label>City</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="city" placeholder="City" class="form-control" >
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-2">
                        <label>Postal Code</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="postalcode" placeholder="postal code" class="form-control" >
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-2">
                        <label>Phone</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="ph" placeholder="phone number with country code" class="form-control" >
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                       <input type="submit" value="Save" class="btn btn-success float-right"/> 
                    </div>
                    
                </div>
                
            </form>
        </div>

      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button"  class="btn btn-default" onclick="closeOldimages()" data-dismiss="modal" aria-label="Close" data-dismiss="modal"> <i class="icon icon-remove-sign"></i> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Remove Employee  -->


<div class="container">
    <?php 	$this->load->view('includes/footer');?>
    </div>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script href="<?=base_url('resource/frontend/js')?>/custom.js"></script>
    <script>
    
    billingaddress();
 
           $('#addrespan').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            address: {
                validators: {
                     notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },stringLength: {
                        min: 6,
                        message: 'The Address  must be grater than 6 characters long'
                    }
                   
                }
            },country:{
                validators: {
                     notEmpty: {
                        message: 'The country is required and cannot be empty'
                    }
                }
            },city:{
                validators: {
                     notEmpty: {
                        message: 'The city is required and cannot be empty'
                    }
                }
            },postalcode:{
                validators: {
                     notEmpty: {
                        message: 'The postalcode is required and cannot be empty'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
         e.preventDefault();
        var $form = $(e.target);
        //var bv = $form.data('bootstrapValidator');
         //var formData = new FormData($('form')[0]);
         var formData = new FormData(this);
            formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
       $.ajax({
					url : $form.attr('action'),
					type: $form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {
					    if(response.status == 200){
					        billingaddress();
					        alert('hi');
					           $("#addrespan").trigger('reset');
					            $('#addressPanel').modal('hide');


					         swal({
                            title: 'Success',
                            text: response.messages,
                            type: "success",
                             timer: 3000,
                           });
                           
					    }else{
					        $('.sugnupSubBtn').attr('disabled',false);
					         $('.sugnupSubBtn').html('SIGN UP');
					         swal({
                            title: "Error!",
                            text: response.messages,
                            type: "error",
                            confirmButtonText: "Try more"
                           });
                           
					    }
					    
					},error:function(res){
					    console.log(res);
					}
       })
    })
    
    function billingaddress(){
        $.ajax({
             type: "POST",
            url:"<?=base_url('payment/myaddress')?>",
            data:{'<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'},
            success:function(res){
                console.log(res);
                $('.innerwarap2').html(res);
            }
        })
        
    }
    </script>
