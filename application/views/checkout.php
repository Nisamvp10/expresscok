<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script src="https://kit.fontawesome.com/f9275dded9.js" crossorigin="anonymous"></script>

<style>
    body{
  /*height: 100vh;*/
  /*text-align: center;*/
}
  /*Trigger Button*/
.login-trigger {
    font-weight: bold;
    color: #fff;
    background: linear-gradient(to bottom right, #B05574, #e3bc21);
    padding: 10px 30px;
    border-radius: 30px;
    position: relative;
    margin-top: 12px;
    width: fit-content;
    display: block;

}
.login-trigger2{
        font-weight: bold;
    color: #000;
    padding: 10px 30px;
    border-radius: 30px;
    position: relative;
    margin-top: 12px;
    width: fit-content;
    display: block;
    background: transparent;
}
.login-trigger2.disabled:hover {
    cursor:not-allowed
 }
.login-trigger2:hover{
        background: linear-gradient(to bottom right, #B05574, #e3bc21);

}

/*Modal*/
#login .close {
  transform: scale(1.2);

  color: #f00!important;
    transform: scale(1.2);
    border-radius: 50%;
    border: 1px solid #f1f0f0!important;
    background-color: transparent!important;
    /* color: #FFFFFF!important; */
    font-size: 30px;
    font-weight: bold;
    padding: 0!important;
    width: 35px;
    height: 35px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 999;
    opacity: 1;
}
#login .modal-content {
  background: transparent;
}
#login .modal-body {
  position: relative;
  padding: 0;
}

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	/*background: #d5b4b4;*/
	/*display: flex;*/
	/*justify-content: center;*/
	/*align-items: center;*/
	/*flex-direction: column;*/
	/*font-family: 'Montserrat', sans-serif;*/
	/*height: 100vh;*/
	/*margin: -20px 0 50px;*/
}

#login h1 {
	font-weight: bold;
	margin: 0;
}

#login h2 {
	text-align: center;
}

#login p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

#login span {
	font-size: 12px;
}

#login a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

#login button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

#login button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

#login button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

#login form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

#login input {
	background-color: #eee;
	border: ;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

#login .container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25),
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 100%;
	max-width: 100%;
	min-height: 480px;
}

#login .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
    z-index: 1;
    width: 50%;
}

.#login sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

#login .container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

#login .sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

#login .container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}

	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

#login .overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

#login .container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

#login .overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #ffd62f, #ffcc00);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

#login .container.right-panel-active .overlay {
  	transform: translateX(50%);
}

#login .overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

#login .overlay-left {
	transform: translateX(-20%);
}

#login .container.right-panel-active .overlay-left {
	transform: translateX(0);
}

#login .overlay-right {
	right: 0;
	transform: translateX(0);
}

#login .container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

#login .social-container {
	margin: 20px 0;
}

#login .social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
.btn2{
    display: none;
}
.money-form{
    width:60%;
    margin:15px auto;
}
 .money-form .money-wrap .money-header{
    padding: 30px 0;
    background: #ffcc00;
    color: #ed1b24;
    text-align: center;
}
.money-form .money-wrap .money-header h3{
    font-size: 26px;
    font-weight: 500;
    text-transform: uppercase;
}
.money-form .money-wrap {
    border:1px #ddd solid;
}
.money-form .money-wrap form{
    padding: 15px;

}
.money-form .money-wrap form input[type='text']{
    height:40px;
}
#createAccount .input-group,.login-form .input-group{
    width: 100%;
}
#createAccount .form-group{
   margin-bottom:2px!important;
}
#createAccount .input-group input[type='text'],#createAccount .input-group input[type='email'],#createAccount .input-group input[type='password'],.login-form .input-group input[type='password'],.login-form  .input-group input[type='email']{
    width: 100%;
    height: 40px;
}
@media (min-width: 768px){
    .modal-dialog {
        width: 80%;
        margin: 30px auto;
    }
}

@media (max-width: 768px){
    .btn2{
        display: block;
    }
    #login h1{
        font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    }
    #login button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
        color: #000;
    }
#login .container.right-panel-active .sign-up-container {
    transform: translateX(0);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

    #login .form-container {

        z-index: 3;

    }

    #login .overlay-container {
     width: 100%;
     display:none;
    }
    #login .overlay {
        width: 100%;
    }
    #login .form-container {
     width: 100%;
    }

    #login .container.right-panel-active .overlay-container {
        transform: translateX(0);
    }

    #login .overlay {
        left: -50%;
        width: 100%;
    }

    #login .overlay-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 2;
    }
    #login .close {
        color: #ff0e0e;
        font-size: 25px;
    }
    #login .container {
        margin: 0;
        padding: 0;
    }
    #login form {
        padding: 0 10px;
    }
}
</style>
<!--Trigger-->
<div class="container">
    <div class="row">
        <div class="money-form">
            <div class="money-wrap">


            <div class="money-header">
                <h3>Add Money</h3>
            </div>
        <form id="addMoney" action="<?=base_url('payment/wallet')?>" method="post">
        <div class="row">
        <div class="col-sm-12 form-group">
         <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input id="money" type="text" class="form-control" name="money" placeholder="Add money">
          </div>
         </div>
         </div>
        <div class="row">
        <div class="col-sm-12">
                     <?php proceed_button(); ?>

        </div>
        </div>

        </form>
    </div>
 </div>
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <div class="container" id="container">
						<div class="form-container row sign-up-container">
							<form id="createAccount" action="<?=base_url('payment/create_account')?>" method="post" >
							        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>

								<h1>Create Account</h1>
								<div class="social-container">
									<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
									<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
									<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
								</div>
								<span>or use your email for registration</span>
								 <div class="col-sm-12">
                                <div class=" form-group">
                                  <div class="input-group">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Your Name">
                                  </div>
                                 </div>
                                 </div>
                                  <div class="col-sm-12">
                                   <div class=" form-group">
                                  <div class="input-group">
    								<input id="email" type="email" class="form-control" name="email" placeholder="Email" />
    								</div>
    									</div>
								</div>
								   <div class="col-sm-12">
                                   <div class=" form-group">
                                  <div class="input-group">
								<input type="password" name="password" class="form-control" placeholder="Password" />
								</div>
								</div>
									</div>
								<div class="row">
                                        <div class="col-sm-12">
								<button class="sugnupSubBtn" type="submit" >Sign Up</button>
							    <button class="ghost signIn btn2" id="signIn">Sign In</button>
							    </div>
							    </div>

							</form>
						</div>
						<div class="form-container sign-in-container">
							<form class="login-form" action="<?=base_url('Register/login')?>" method="post" >
								<h1>Sign in</h1>
								<div class="social-container">
									<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
									<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
									<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
								</div>
								<span>or use your account</span>
				                  <div class="col-sm-12">
                                   <div class=" form-group">
                                    <div class="input-group">
								        <input name="email" class="form-control" type="email" placeholder="Email" />
								    </div>
								   </div>
								 </div>
								  <div class="col-sm-12">
                                   <div class=" form-group">
                                    <div class="input-group">
								        <input name="password" type="password" class="form-control" placeholder="Password" />
								    </div>
								   </div>
								 </div>
								<a href="#">Forgot your password?</a>
								<input  type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();  ?>">

								<button type="submit" id="login"  >Sign In</button>

								<button class="ghost signUp btn2" id="signUp">Sign Up</button>


							</form>
						</div>
						<div class="overlay-container">
							<div class="overlay">
								<div class="overlay-panel overlay-left">
									<h1>Welcome Back!</h1>
									<p>To keep connected with us please login with your personal info</p>
									<button class="ghost signIn" id="signIn">Sign In</button>

								</div>
								<div class="overlay-panel overlay-right">
									<h1>Hello, Friend!</h1>
									<p>Enter your personal details and start journey with us</p>
									<button class="ghost signUp" id="signUp">Sign Up</button>

								</div>
							</div>
						</div>
					  </div>
      </div>
    </div>
  </div>
</div>
    </div> <!--close row -->

</div><!--close container -->
<div class="container">
    <?php 	$this->load->view('includes/footer');?>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
   // const signUpButton = document.getElementById('signUp');
   const signUpButton = document.getElementsByClassName('signUp');
   const signInButton = document.getElementsByClassName('signIn');

//const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// signUpButton.addEventListener('click', () => {
// 	container.classList.add("right-panel-active");
// });
$('.signUp').click(function(){
    container.classList.add("right-panel-active");
})

$('.signIn').click(function(){
	container.classList.remove("right-panel-active");
})

// signInButton.addEventListener('click', () => {
// 	container.classList.remove("right-panel-active");
// });

$(document).ready(function() {

    $('#addMoney').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            money: {
                validators: {
                     notEmpty: {
                        message: 'The money is required and cannot be empty'
                    },
                    integer: {
                        message: 'The value is not an integer'
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
					         swal({
                            title: response.messages,
                            text: response.sub_message,
                            type: "success",
                             timer: 3000,
                           });
                           setTimeout(function(){ window.location = "<?=base_url('payment/billing_address')?>"; },3000);

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

        $('.login-form').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            email: {
                validators: {
                     notEmpty: {
                        message: 'The money is required and cannot be empty'
                    }
                }
            },password: {
                validators: {
                    required:true,
                     notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },stringLength: {
                        min: 6,
                        message: 'The password  must be grater than 6 characters long'
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
            console.log(response);
					    if(response.status == 200){
					         $('#login').modal('hide');
					         swal({
                            title: response.messages,
                            text: response.sub_message,
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
});

//});

  $('#createAccount').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            name: {
                validators: {
                     notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },stringLength: {
                        min: 2,
                        message: 'The password  must be grater than 2 characters long'
                    }

                }
            }, email: {
                validators: {
                    required:true,
                     notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },

                }
            },password: {
                validators: {
                    required:true,
                     notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },stringLength: {
                        min: 6,
                        message: 'The password  must be grater than 6 characters long'
                    }

                }
            }
        }
    }).on('success.form.bv', function(e) {
        $('.sugnupSubBtn').html('<i class="fa fa-spinner fa-spin"></i>');
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
					         $('.sugnupSubBtn').html('<i class="fa fa-check" aria-hidden="true"></i>');
					         swal({
                            title: "Success!",
                            text: response.messages,
                            type: "success",
                            confirmButtonText: "Cool"
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
});

// $('#registerstudent').bootstrapValidator({
//         message: 'This value is not valid',
//         fields: {
//             fname: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please enter your First name.'
//                     },
//                     stringLength: {
//                         min: 2,
//                         max: 20,
//                         message: 'First name must be 2 to 20 characters.'
//                     },
//                     regexp: {
//                          regexp: /^[a-z\s]+$/i,
//                          message: 'The First name can consist of alphabetical characters and spaces only'
//                      }
//                 }
//             },

//             lname: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please enter your Last name.'
//                     },
//                     stringLength: {
//                         min: 2,
//                         max: 20,
//                         message: 'Last name must be 2 to 20 characters.'
//                     },
//                     regexp: {
//                          regexp: /^[a-z\s]+$/i,
//                          message: 'The Last name can consist of alphabetical characters and spaces only'
//                      }
//                 }
//             },

//             email: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please enter your Email.'
//                     },
//                 }
//             },
//             password: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please enter your Password.'
//                     },
//                     stringLength: {
//                         min: 4,
//                         message: 'Password has to be at least 4 char.'
//                     },
//                 }
//             },
//      }
// }).on('success.form.bv', function(e) {
//         e.preventDefault();
//         var $form = $(e.target);
//         var bv = $form.data('bootstrapValidator');
//         $.post($form.attr('action'), $form.serialize(), function(result) {
//             $('#loaderbg').hide();
//              $('.clartestvaluestudent').val('');
//              $(".Studentbuttondisbled").prop('disabled', false);
//             if(result.message)
//             {
//               alert(result.message);
//               location.reload();
//             }
//             else if(result.error)
//             {
//               alert(result.message);
//               location.reload();
//             }
//         }, 'json');
// });

});



</script>
