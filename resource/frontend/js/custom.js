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
                        message: 'The money is required and cannot be empty'
                    },stringLength: {
                        min: 6,
                        message: 'The Address  must be grater than 6 characters long'
                    }
                   
                }
            },country:{
                validators: {
                     notEmpty: {
                        message: 'The money is required and cannot be empty'
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
          //  formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
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
    
 