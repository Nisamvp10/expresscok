var bulk_action_enabled=false; 
function alert_dialog(type,message,reload,timout){
				 var dialogInstance=new BootstrapDialog.show({
                                            title:'Message',
                                            message: message,
                                            type:type,
                                            buttons: [{label: 'Close',
									                   action: function(dialogRef){
									                   dialogRef.close();
									                      if(reload==true){
									                      	 window.location.reload(true);
									                      }
									                      
									                   }
									                 }]
				                              });
								 			 if(timout==true){
									                      	setTimeout(function(){
									                      		
																if(reload==true){
											                      	 window.location.reload(true);
											                     }else{
											                     	dialogInstance.close();
											                     }
																
															},6000);
										 	  } 
}
$(document).ready(function(){
	        $(".tile").height($("#tile1").width());
		    $(".carousel").height($("#tile1").width());
		     $(".item").height($("#tile1").width());
		     
		    $(window).resize(function() {
		    if(this.resizeTO) clearTimeout(this.resizeTO);
			this.resizeTO = setTimeout(function() {
				$(this).trigger('resizeEnd');
			}, 10);
		    });
		    
		    $(window).bind('resizeEnd', function() {
		    	$(".tile").height($("#tile1").width());
		        $(".carousel").height($("#tile1").width());
		        $(".item").height($("#tile1").width());
		    });
	       $('.category_filter_select').on('change',function(){
	       	      var id=$('.category_filter_select').val();
	       	      $(this).closest('.list-header-filter').find('.facebookG').css('display','inline-block');
		       	  if(id=="default"||id==undefined){
		       	  	
		       	  	var action=$(this).attr('data-action');
		       	    window.location.href=action+"#search_id";;
		       	    
		       	  }else{
		       	  	
		       	  	var action=$(this).attr('data-action');
			       	action=action+"/category/"+id+"#search_id";
			       	window.location.href=action;
			       	
		       	  }	

	       });
	       
	       $(document).on('click','.flter_re_by_code_btn',function(){
	       	      var id=$(this).closest('.list-header-filter').find('.flter_re_by_code').val();
	       	      var data_sr=$(this).attr('data-search');
		       	  var patt=/^[1-9][0-9]*$/;
		       	  if(id=="0"||id==""||id==" "){
		       	  	
		       	  	return false;
		       	  }else if(data_sr=="code"&&patt.test(id)==false){
		       	  	  
		       	  	 return false;
		       	  }else{
		       	  	$(this).closest('.list-header-filter').find('.facebookG').css('display','inline-block');
		       	  	var action=$(this).attr('data-action');
			       	action=action+"/"+data_sr+"/"+id+"#search_id";
			       	window.location.href=action;
			       	
		       	  }	

	       });
	       $(document).on('click','.pqs_ttl_qty_updt_btn',function(){
	       	$('.error-div').empty();
	       	 var error="";
	       	 var patt=/^[1-9][0-9]*$/;
	       	 var aqty=$(this).attr('data-qty');
	       	 if(aqty!=""&&patt.test(aqty)==true){
	       	 	aqty=parseInt(aqty);
	       	 }else{
	       	 	aqty=0;
	       	 }
	       	 
	       	  var ttqty=0;
	       	  $('.size_qty_in').each(function(){
	       	  	var tmpqty=$(this).val();
	       	  	if(tmpqty==""||tmpqty==undefined||patt.test(tmpqty)==false){
	       	  		
	       	  		if(tmpqty!=""&&tmpqty!=undefined&&patt.test(tmpqty)==false){
	       	  			error="custom";
	       	  			$('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>The quantity field must contain a number.</p>').fadeIn('slow'));
	       	  		    setTimeout(function(){$('.error-div').empty();},4000);
	       	  		    return false;
	       	  		}
	       	  		
	       	  	}else{
	       	  		ttqty=ttqty+parseInt(tmpqty);
	       	  	}
	       	  
	       	  });
	       	  
	       	  if(ttqty>aqty){
	       	  	  $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>The total quantity you have added exceeds the available quantity of the product.</p>').fadeIn('slow'));
	       	      setTimeout(function(){$('.error-div').empty();},4000);
	       	      return false;
	       	  }
	       	  if(error!=""&&error=="custom"){
	       	  	  return false;
	       	  }
	       	  
	       	  
	       });
	      
	       $(document).on('click','.error-message .fa-close',function(){
	       	
	       	 $(this).closest('.error-message').remove();
	       	
	       });
	       $('.datetimepicker').datetimepicker({format:"YYYY-M-D"});
	       
	       $('#category_theme').on('change',function(){
	       	
	       	  var val = $('option:selected', this).attr('data-value');
	       	  $('.selected_theme_i').prop('checked',false);
	       	  $('input:checkbox[value="'+val+'"]').prop('checked',true);
	       	  
	       });
	       $('#category_slider').on('change',function(){
	       	
	       	  var val = $('option:selected', this).attr('data-value');
	       	 
	       	  var exists = false;
				$('#slider > option').each(function(){
					
				    if (this.value == val) {
				    	
				        exists = true;
				        return false;
				    }
				});
	       	  if(exists){
	       	  	
	       	  	$('#slider').val(val);
	       	  }else{
	       	  	$('#slider').val("");
	       	  }
	       	  
	       });
            $('.edit_g_image').click(function(){
            	
            	window.location.href=$(this).attr('data-id');
            	
            	return false;
            	
            });
            
            $(document).on('click','.spin-waiter',function(){
            	
            	$('.remove_g_image_spin_s_1').show("slow","swing");
            	$(this).closest('.form-group').find('.facebookG').css('display','inline-block');
            	
            });
            var media_b_active=$('.btn_media_l');
            $('.btn_media_l').click(function(){
            	 media_b_active=$(this);
            	 $('.lib_insert_img').prop('checked',false);
            	 $('#myModal').modal({backdrop: 'static'});
            	
            });
            
            
            $("#myModal").on("show.bs.modal", function() {
				  var height = $(window).height() - 200;
				  $(this).find(".modal-body").css("max-height", height);
				 
			});
			
			$(document).on('change','.lib_insert_img',function(){
				$('.lib_insert_img').prop('checked',false);
				$(this).prop('checked',true);
				
			});	
			$(document).on('click','.modal-close-btn',function(){
				if(media_b_active){
					media_b_active.closest('.row').find('.lib_insert_img').prop('checked',false);
					media_b_active.closest('.row').find('.lib_image_holder').empty();
					media_b_active.closest('.row').find('.ex_image_holder').show("slow","swing");
				}
				$('#myModal').modal('hide');
				return false;
			});
			
			
			$(document).on('change','.country_chkbx',function(){
				$('.state-list-p').hide();
				$('.district-list-p').hide();
				$('.loca_list_navi').hide();
				$('.state-list-p').removeClass('active');
				$('.country-list-p').removeClass('active');
				if($(this).is(':checked')){
					$('.country_chkbx').prop('checked',false);
					$('.state_chkbx').prop('checked',false);
					$(this).prop('checked',true);
					
					$('.'+$(this).val()).show("slow","swing");
					
					$(this).closest('.country-list-p').find('.loca_list_navi').show("slow","swing");
					$(this).closest('.country-list-p').addClass('active');
				}
				
			});
			$(document).on('change','.country_chkbx_ads',function(){
				$('.state-list-p').hide();
				$('.district-list-p').hide();
				$('.loca_list_navi').hide();
				$('.loca_list_navi_clk').removeClass('expnded');
				if($(this).is(':checked')){
					$(this).prop('checked',true);
					$(this).closest('.country-list-p').find('.loca_list_navi').show("slow","swing");
					$(this).closest('.country-list-p').addClass('active');
				}else{
					$(this).closest('.country-list-p').removeClass('active');
				}
			});
			$(document).on('click','.loca_list_navi_clk',function(){
				$('.state-list-p,.loca_list_navi,.district-list-p').hide();
				$('.loca_list_navi_clk').removeClass('expnded');
				$(this).addClass('expnded');
				$('.'+$(this).attr('val')).show("slow","swing");
				$(this).closest('.loca_list_navi').show("slow","swing");
			});
			$(document).on({
			    mouseenter: function () {
			        $(this).find('.loca_list_navi').show();
			    },
			    mouseleave: function () {
			    	if($(this).find('.loca_list_navi_clk').hasClass('expnded')){
			    	}else{
			    		$(this).find('.loca_list_navi').hide();
			    	}
			    }
			}, ".list-p-h.active");
			
			$(document).on('change','.state_chkbx',function(){
				
				$('.district-list-p').hide();
				$(this).closest('.col-lg-4').find('.loca_list_navi').hide();
				$('.state-list-p').removeClass('active');
				if($(this).is(':checked')){
					$('.state_chkbx').prop('checked',false);
					$(this).prop('checked',true);
					
					$('.'+$(this).val()).show("slow","swing");
					
					$(this).closest('.state-list-p').find('.loca_list_navi').show("slow","swing");
					$(this).closest('.state-list-p').addClass('active');
				}
				
			});		
			$(document).on('change','.state_chkbx_ads',function(){
				$('.district-list-p').hide();
				$('.loca_list_navis').hide();
				$('.loca_list_navi_clks').removeClass('expnded');
				if($(this).is(':checked')){
					$(this).prop('checked',true);
					$(this).closest('.state-list-p').find('.loca_list_navis').show("slow","swing");
					$(this).closest('.state-list-p').addClass('active');
				}else{
					$(this).closest('.state-list-p').removeClass('active');
				}
			});		
			$(document).on('click','.loca_list_navi_clks',function(){
				$('.loca_list_navis,.district-list-p').hide();
				$('.loca_list_navi_clks').removeClass('expnded');
				$(this).addClass('expnded');
				$('.'+$(this).attr('val')).show("slow","swing");
				$(this).closest('.loca_list_navis').show("slow","swing");
			});
			$(document).on({
			    mouseenter: function () {
			        $(this).find('.loca_list_navis').show("slow","swing");
			    },
			    mouseleave: function () {
			    	if($(this).find('.loca_list_navi_clks').hasClass('expnded')){
			    	}else{
			    		$(this).find('.loca_list_navis').hide();
			    	}
			    }
			}, ".lists-p-h.active");
			
			$(document).on('change','.district_chkbx_ads',function(){
				if($(this).is(':checked')){
					$(this).closest('.district-list-p').addClass('active');
				}else{
					$(this).closest('.district-list-p').removeClass('active');
				}
			});		
			$(document).on('change','.f_s_b',function(){
				var cid=$('option:selected',this).val();
				var ssid=$(this).closest('form').find('.s_s_b');
				ssid=ssid.get(0);
				if(ssid){
					
					ssid.innerHTML="";
				}
				var tsid=$(this).closest('form').find('.t_s_b');
				tsid=tsid.get(0);
				if(tsid){
					tsid.innerHTML="";
				}
				if(s_f_jsa!=null){
					for(var i in s_f_jsa){
						
						if(s_f_jsa[i].meta_id==cid){
							var option=document.createElement('option');
							option.value=s_f_jsa[i].id;
							option.text=s_f_jsa[i].name;
							ssid.options.add(option);
						}
						
					}
				}
				
			});	
			$(document).on('click','.edit_l_image',function(){
            	    $('#overlayy').show("slow","swing");
            	    $('#media_meta_content_insert_spinner_center').hide();
	            	$('.edit_l_image').prop('disabled',true);
					var url=config.base.concat("admin/get-media-file");
					var _token=config.name;
				    var _data={};
					_data['id']=$(this).attr('data-id');
					_data[_token]=config.value;
					$.ajax({
						url:url,
						type:'POST',
						dataType:'JSON',
						data:_data,
						success:function(data){
							  if(data!=null){
								
								    
									if(data.status=="202"){
										 $('#mediametaModal').modal({backdrop: 'static'});
										 
										 if(data.contents!=null){
											
											for(var i in data.contents){
												$('#filee_id').val(data.contents[i].id);
												var file_url=config.base.concat(data.contents[i].file);
												$('#img_url_segment').val(data.contents[i].content);
												var image_name=file_url.substr(file_url.lastIndexOf('/') + 1);
												image_name=image_name.substr(0, image_name.lastIndexOf('.')) || image_name;
												$('#img_name').val(image_name);
												$('#alt_tag').val(data.contents[i].meta_content);
												$('#ex_m_file').val(data.contents[i].file);
												$('#media_li_ed_img_hldr').css({'background-image': 'url("'+file_url+'")','height':'200px','background-color':' #EDEDED'});
												
											}
											
										}
										 
										 $('#overlayy').hide();
	            	                     $('.edit_l_image').prop('disabled',false);
										 
									}else{
										reset_me_meta_c_val();
										alert_dialog('type-danger',"Sorry!.It seems to be that something went wrong. Please try again.",false,true);
										
									}	    
									
											         	  
					 		}else{
					 			window.location.reload(true);
					 		}
				      },error: function(xhr, textStatus, errorThrown) {
									             alert(errorThrown);
									             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
									             window.location.reload(true);
					 }
					
				   });
            	
            	return false;
            
            });
            $(document).on('click','.media_meta_content_insert',function(){
            	    $('.modal-close-btnn').prop('disabled',true);
            	    $('#media_meta_content_insert_spinner_center').show("slow","swing");
	            	$(this).prop('disabled',true);
					var url=config.base.concat("admin/update-media-file");
					var _token=config.name;
				    var _data={};
					_data['id']=$('#filee_id').val();
					_data['name']=$('#img_name').val();
					_data['content']=$('#img_url_segment').val();
					_data['e_file']=$('#ex_m_file').val();
					_data['meta_content']=$('#alt_tag').val();
					_data[_token]=config.value;
					$.ajax({
						url:url,
						type:'POST',
						dataType:'JSON',
						data:_data,
						success:function(data){
							  if(data!=null){
							  	    
									if(data.status=="202"){
										 if(data.contents!=null){
										   for(var i in data.contents){
												$('#filee_id').val(data.contents[i].id);
												var file_url=config.base.concat(data.contents[i].file);
												$('#img_url_segment').val(data.contents[i].content);
												var image_name=file_url.substr(file_url.lastIndexOf('/') + 1);
												image_name=image_name.substr(0, image_name.lastIndexOf('.')) || image_name;
												$('#img_name').val(image_name);
												$('#ex_m_file').val(data.contents[i].file);
												$('#alt_tag').val(data.contents[i].meta_content);
											}
										}
										alert_dialog('type-success',"Successfully upadated!.",false,true);
										$('#overlayy').hide();
								        $('.edit_l_image').prop('disabled',false);
									    $('.media_meta_content_insert').prop('disabled',false);
									    $('.modal-close-btnn').prop('disabled',false);
									    $('#media_meta_content_insert_spinner_center').hide();
									}else{
										 reset_me_meta_c_val();
										 alert_dialog('type-danger',"Sorry!.It seems to be that something went wrong. Please try again.",false,true);
									}	    	         	  
					 		}else{
					 			window.location.reload(true);
					 		}
				      },error: function(xhr, textStatus, errorThrown) {
									             alert(errorThrown);
									             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
									             window.location.reload(true);
					 }
					
				   });
            	
            	return false;
            
            });
            $(document).on('click','.click_to_de_li',function(){
            	 
            	    $('.modal-close-btnn').prop('disabled',true);
            	    $('.media_meta_content_insert').prop('disabled',true);
            	    $('#media_meta_content_insert_spinner_center').show("slow","swing");
	            	$(this).prop('disabled',true);
					var url=config.base.concat("admin/delete-media-file");
					var _token=config.name;
				    var _data={};
					_data['id']=$('#filee_id').val();
					_data[_token]=config.value;
					$.ajax({
						url:url,
						type:'POST',
						dataType:'JSON',
						data:_data,
						success:function(data){
							  if(data!=null){
							  	    
									if(data.status=="202"){
										
										alert_dialog('type-success',"Successfully Deleted!.",true,true);
										
									}else{
										 reset_me_meta_c_val();
										 $(this).prop('disabled',false);
										 alert_dialog('type-danger',"Sorry!.It seems to be that something went wrong. Please try again.",false,true);
									}	    	         	  
					 		}else{
					 			window.location.reload(true);
					 		}
				      },error: function(xhr, textStatus, errorThrown) {
									             alert(errorThrown);
									             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
									             window.location.reload(true);
					 }
					
				   });
            	
            	return false;
            	
            	
            	
            });
            $("#mediametaModal").on("show.bs.modal", function() {
				  var height = $(window).height() - 200;
				  $(this).find(".modal-body").css("max-height", height);
				 
			});
			$(document).on('click','.modal-close-btnn',function(){
				
				reset_me_meta_c_val();
				
				return false;
				
			});
			
			function reset_me_meta_c_val(){
				$('#overlayy').hide();
	            $('.edit_l_image').prop('disabled',false);
				$('#filee_id').val("");
				$('#img_url_segment').val("");
				$('#img_name').val("");
				$('#alt_tag').val("");
				$('#ex_m_file').val("");
				$('#media_li_ed_img_hldr').removeAttr('style');
				$('.media_meta_content_insert').prop('disabled',false);
				$('#media_meta_content_insert_spinner_center').hide();
				$('#mediametaModal').modal('hide');
				$('.modal-close-btnn').prop('disabled',false);
			}
            $(document).on('click','.media_insert',function(){
            	if(media_b_active){
            		 media_b_active.closest('.row').find('.ex_image_holder').hide();
            		 media_b_active.closest('.row').find('.lib_image_holder').empty();
					 if($('.lib_insert_img').is(':checked')==true){
						
						var img_id=$('.lib_insert_img:checked').val();
						var img=$('.lib_insert_img:checked').attr('data-img');
						var ext = img.split('.').pop();
						if(ext=="swf"){
							
							media_b_active.closest('.row').find('.lib_image_holder').append($('<a><object width="100%" height="auto" data="'+img+'"></object></a>').fadeIn('slow'));
							
						}else{
							
							media_b_active.closest('.row').find('.lib_image_holder').append($('<img  width="100%"   src="'+img+'" />').fadeIn('slow'));
							
						}
						if(media_b_active.closest('.row').find('#ffile').length>0){
							
							media_b_active.closest('.row').find('.lib_image_holder').append('<input type="hidden" class="meta_file_insert_id" name="meta_file"  value="'+img_id+'" />');
		            	    media_b_active.closest('.row').find('.lib_image_holder').append('<input type="hidden" class="media_insert_file" name="media_i_file"  value="'+img+'" />');
						
						}else{
							
							media_b_active.closest('.row').find('.lib_image_holder').append('<input type="hidden" class="media_insert_id" name="media_id"  value="'+img_id+'" />');
		            	    media_b_active.closest('.row').find('.lib_image_holder').append('<input type="hidden" class="media_insert_file" name="media_i_file"  value="'+img+'" />');
						
						}
		            	
		            	$('.lib_insert_img').prop('checked',false);
		            	$('#myModal').modal('hide');
					}else{
						alert_dialog('type-danger',"You must select a media file to insert.",false,true);
					}
            	}
            	
            	return true;
            	
            });
            
            $(document).on('mouseover','.library_ind_s',function(){
            	$(this).find('.edit_l_image').show();
            });	
            $(document).on('mouseout','.library_ind_s',function(){
            	$(this).find('.edit_l_image').hide();
            });
            $(document).on('click','.ajax_pagination_a',function(){
            	
            	var href=$(this).attr('href');
            	$('.pagination-parent-small').attr('disabled','disabled');
				$('.pagination_spin_parent').find('.lib-pagination-spin').show("slow","swing");
			    
				var url=href;
				var _token=config.name;
			    var _data={};
				_data['id']='ajax';
				_data[_token]=config.value;
				$.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
						  if(data!=null){
							
							    
								if(data.status=="202"){
									
									$('.pagination_spin_parent > .library_ind_s').remove();
									
									if(data.result_lib!=null){
										var str_app="";
										for(var i in data.result_lib){
											var file_id=data.result_lib[i].id;
											var file=data.result_lib[i].file;
											str_app+='<div class="col-lg-2 library_ind_s center-cropped" style="background-image: url('+config.base.concat(file)+');" >'
											+'<input type="checkbox" value="'+file_id+'" data-img="'+config.base.concat(file)+'" class="lib_insert_img" />'
											+'<span style="display: none;" class="edit_l_image" data-id="'+file_id+'" title="Edit Image"><i class="fa fa-pencil"></i></span>' 
											+'</div>';
											
										}
										$('.pagination_spin_parent').prepend(str_app);
									}
									
									$('.pagination-parent-small').empty();	
									$('.pagination-parent-small').removeAttr('disabled');
									$('.pagination-parent-small').append(data.lib_links);
									$('.pagination_spin_parent').find('.lib-pagination-spin').hide();
									
								}else{
									$('.pagination-parent-small').removeAttr('disabled');
									$('.pagination_spin_parent').find('.lib-pagination-spin').hide();
								}	    
								
										         	  
				 		}else{
				 			window.location.reload(true);
				 		}
			      },error: function(xhr, textStatus, errorThrown) {
								             alert(errorThrown);
								             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
								             $('.pagination_spin_parent').find('.lib-pagination-spin').hide();
								             $('.pagination-parent-small').removeAttr('disabled');
				 }
				
			   });
            	
            	return false;
            });
            
			$('.remove_g_image').click(function(){
		        $(this).attr('disabled','disabled');
				var obj=$(this);
				$(this).closest('.img_gallery_set').find('.remove_g_image_spin').show("slow","swing");
			    var id=$(this).attr('data-id'); 
				var url=config.base.concat("admin/posts/delete");
				var _token=config.name;
			    var _data={};
				_data['id']=id;
				_data[_token]=config.value;
				$.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
						if(data!=null){
								if(data.status=="202"){
									obj.closest('.img_gallery_set').find('.remove_g_image_spin').empty();
									obj.closest('.img_gallery_set').remove();
									obj.closest('.img_gallery_set').remove();
									obj.remove();
									
									
								}else{
									obj.removeAttr('disabled');
									obj.closest('.img_gallery_set').find('.remove_g_image_spin').hide();
								}	    
										         	  
				 		}else{
				 			window.location.reload(true);
				 		}
			      },error: function(xhr, textStatus, errorThrown) {
								            alert(errorThrown);
								             alert ("Something went wrong,Please check your n/w connection OR Contact admin.");
								                
								            
								            obj.closest('.img_gallery_set').find('.remove_g_image_spin').hide();
				 }
				
			   });
				return false;
			});
			
			
			
			
			
			    
			
			     $('.add_to_slider').on('click',function(){
					
					$(this).closest('.img_gallery_set').appendTo('.pnel_slctd_slides_f_sdr').addClass('col-lg-3').removeClass('col-lg-2');
					$('.pnel_slctd_slides_f_sdr').find('.add_to_slider').hide();
					$('.pnel_slctd_slides_f_sdr').find('.remove_from_slider').show("slow","swing");
					return false;
				});
			    $('.remove_from_slider').on('click',function(){
				
					$(this).closest('.img_gallery_set').appendTo('.re-append-to-p').addClass('col-lg-2').removeClass('col-lg-3');
					$('.re-append-to-p').find('.remove_from_slider').hide();
					$('.re-append-to-p').find('.add_to_slider').show("slow","swing");
					return false;
				});
			$('.cat_radio').click(function(){
				$('.subcat_radio').prop('checked',false);
				$('.subcat_hiddn').hide();
				$('.sub_cat_drp_dwn_'+$(this).val()).show("slow","swing");
				$('.cat_radio').each(function(){
					
					$(this).closest('tr').find('td').css('background','');
					$(this).closest('tr').find('td').css('color','#333');
					$(this).closest('tr').find('td').css('padding-top','2px!important');
					$(this).closest('tr').find('td').css('padding-bottom','0px!important');
					$(this).closest('tr').find('td').css('text-align','center!important');
				
				});
				$('.subcat_radio').each(function(){
					
					$(this).closest('tr').find('td').css('background','');
					$(this).closest('tr').find('td').css('color','#333');
					$(this).closest('tr').find('td').css('padding-top','2px!important');
					$(this).closest('tr').find('td').css('padding-bottom','0px!important');
					$(this).closest('tr').find('td').css('text-align','center!important');
				
				});
				$(this).closest('td').css({'background-color':'#ddd','padding-top':'2px!important','padding-bottom':'0px!important','text-align':'center!important'});
				$(this).closest('tr').find('.cat_radio_name').css({'background-color':'rgb(55, 125, 186)','color':'#fff','font-size':' 13px','padding':' 5px 8px'});
				
				$(this).css({'width': '14px'});
			});
			$('.cat_radio').each(function(){
					if($(this).prop('checked')){
						$(this).closest('td').css('background-color','#ddd');
				        $(this).closest('tr').find('.cat_radio_name').css({'background-color':'rgb(55, 125, 186)','color':'#fff','font-size':' 13px','padding':' 5px 8px'});
					}
					
			});
			
			$(document).on('click','.subcat_radio',function(){
				$('.subcat_radio').each(function(){
					
					$(this).closest('tr').find('td').css('background','');
					$(this).closest('tr').find('td').css('color','#333');
					$(this).closest('tr').find('td').css('padding-top','2px!important');
					$(this).closest('tr').find('td').css('padding-bottom','0px!important');
					$(this).closest('tr').find('td').css('text-align','center!important');
				
				});
				$(this).closest('td').css({'background-color':'#ddd','padding-top':'2px!important','padding-bottom':'0px!important','text-align':'center!important'});
				$(this).closest('tr').find('.subcat_radio_name').css({'background-color':'rgb(134, 136, 139)','color':'#fff','font-size':' 13px','padding':' 5px 8px'});
				
			});
			
			function _remove_on_time(obj,interval,ref){setTimeout(function(){$(obj).empty();if(ref==true){window.location.reload(true);}},interval);}
			function check_wysiwyg_content(string) {
				   
				    var match =/<script[/s*]>/i.test(string)||/<style[/s*]>/i.test(string)|| /<script[^>]*>[\s\S]*?/i.test(string) || /[\s"\'`;\/0-9\=\x0B\x09\x0C\x3B\x2C\x28]+on\w+[\s\x0B\x09\x0C\x3B\x2C\x28]*=/i.test(string)  ||/(?:=|U\s*R\s*L\s*\()\s*[^>]*\s*S\s*C\s*R\s*I\s*P\s*T\s*:/i.test(string) || 
				         /%[\d\w]{2}/i.test(string) ||/&#[^&]{2}/i.test(string) ||/&#x[^&]{3}/i.test(string) ||/&colon;/i.test(string) ||/[\s\S]src[\s\S]/i.test(string) ||
				         /[\s\S]data:text\/html[\s\S]/i.test(string) ||/[\s\S]xlink:href[\s\S]/i.test(string) ||/[\s\S]base64[\s\S]/i.test(string) || /[\s\S]xmlns[\s\S]/i.test(string) ||
				         /[\s\S]xhtml[\s\S]/i.test(string) || /[\s\S]href[\s\S]/i.test(string)  || /[\s\S]style[\s\S]/i.test(string) || /[\s\S]formaction[\s\S]/i.test(string) ||
				         /[\s\S]@import[\s\S]/i.test(string) ||  /[\s\S]!ENTITY.*?SYSTEM[\s\S]/i.test(string) || /[\s\S]pattern(?=.*?=)[\s\S]/i.test(string)  || /<style[^>]*>[\s\S]*?/i.test(string) ||    
				         /<applet[^>]*>[\s\S]*?/i.test(string) || /<meta[^>]*>[\s\S]*?/i.test(string) || /<form[^>]*>[\s\S]*?/i.test(string) || /<isindex[^>]*>[\s\S]*?/i.test(string) ||
				         /<object[^>]*>?[\s\S]*?/i.test(string) || /<embed[^>]*>?[\s\S]*?/i.test(string);
				    
				    return match;
			}
			function filter_wysiwyg_content(strin){
				      var string=strin.replace(/<script[^>]*>[\s\S]*?/i,'*');string=string.replace(/<script[/s*]>/i,'*');
				          string=string.replace(/<style[/s*]>/i,'*');string=string.replace(/<link[/s*]>/i,'*');
				          string=string.replace(/[\s"\'`;\/0-9\=\x0B\x09\x0C\x3B\x2C\x28]+on\w+[\s\x0B\x09\x0C\x3B\x2C\x28]*=/i,'*');string=string.replace(/(?:=|U\s*R\s*L\s*\()\s*[^>]*\s*S\s*C\s*R\s*I\s*P\s*T\s*:/i,'*');
				          string=string.replace(/[\s\S]formaction[\s\S]/i,'*');string=string.replace(/[\s\S]pattern(?=.*?=)[\s\S]/i,'*');string=string.replace(/<style[^>]*>[\s\S]*?/i,'*');
				          string=string.replace(/<link[^>]*>[\s\S]*?/i,'*');return string;
			}
			$('body').on('keyup','#code',function(){
				
				 var content=$(this).val();
				
					if(content!=""&&content!=undefined){
						if(check_wysiwyg_content(content)){
							$(this).val(filter_wysiwyg_content(content));
						}
						
					}
			});		
			
    		var save_tile_action=false;
			$('#save_tile').click(function(){
				if(save_tile_action==false){
							$('.remove_g_image_spin_3').show("slow","swing");
							save_tile_action=true;
							var this_obj=$(this);
							this_obj.attr('disabled','disabled');
							var content=$('.nicEdit-main').html();
							$('.error-div').empty();
							$('.succ-div').empty();
							var name=$('#name').val();
							var slider=$('#slider').val();
							var rurl=$('#url').val();
							var mode=$('#mode').val();       
							var media_id=$('.media_insert_id').val(); 
							console.log(media_id);
							if(media_id==undefined){
								media_id="";
							}
					   	    var data_config=this_obj.attr('data-config');
					   	    var data_id="0";
					   	    if(data_config=="edit"){
					   	    	data_id=this_obj.attr('data-id');
					   	    }
					   	    if(name!=""&&(data_config=="save"||(data_config=="edit"&&data_id!="0"&&data_id!=undefined&&data_id!="")))
					   	    {
					   	    	           
					   	    	           
					   	    	            var url=config.base.concat("admin/home-bulider/tiles/save");
					   	    	            var formObj=new FormData();
									        var fileId = document.getElementById('file');
					                        formObj.append('file', fileId.files[0]);
									        formObj.append('e_file',$('#e_file').val());
									        formObj.append('bgcolor',$('#bgcolor').val());
									        formObj.append('fcolor',$('#fcolor').val());
									        formObj.append('mode',mode);
											formObj.append('name',name);
											formObj.append('slider',slider);
											formObj.append('url',rurl);
											formObj.append('media_id',media_id);
											formObj.append('meta_id',$('input[name="meta_id"]:checked').val());
											formObj.append('description',content);
											formObj.append('op_mode',data_config);
					                        formObj.append('op_id',data_id);
									        formObj.append(config.name,config.value);
									        var ajaxReq;
									        try
									        {
											   ajaxReq = new XMLHttpRequest();
										    } 
										    catch(e)
										    { 
										    try{ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");} 
											    	catch (e) { try{ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");} catch (e)
																 {alert("Your browser does not support image upload at this environment.Please update your browser into latest version.");
																	 return false;} }
										    } 
										    ajaxReq.open('POST', url);
									        ajaxReq.setRequestHeader('Cache-Control', 'no-cache');
									        ajaxReq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				
									        ajaxReq.send(formObj); 
											ajaxReq.onreadystatechange=function()
									  		{
									  			save_customize_action=false;
									  			if (ajaxReq.readyState==4 && ajaxReq.status==200)
									    		{
									    				
									    				var a=ajaxReq.responseText;
									    				var jsonData=JSON.parse(a);
									                    
									    				if(jsonData.status=="202"){
									    				
									    						$('.remove_g_image_spin_3').hide();
									    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
									    						$('.succ-div').append($('<p class="succ-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
									    						_remove_on_time('#n_message',6000,true);
									    						_remove_on_time('.succ-div',6000,false);
									    					
									    							    					
									    				}else if(jsonData.status=="203"){
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
												   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
												   	         $('.error-div').append($(jsonData.eeror).fadeIn('slow'));
												   	         _remove_on_time('.error-div',8000,false);
												   	         _remove_on_time('#n_message',4000,false);
									    					
									    				}else{
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('.n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
									    					 _remove_on_time('#n_message',4000,false); 
									    				}
									    				
									    				
									           }
									           
									            
									        }
					   	    	            
					   	    	            
					   	        
					   	    	
					   	    }else{
					   	    	save_tile_action=false;
					   	        if(name==""){
					   	        	
					   	        	 this_obj.prop('disabled',false);
						   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Title is required</p>').fadeIn('slow'));
						   	          _remove_on_time('.error-div',8000,false);
						   	         $('.remove_g_image_spin_3').hide();
						   	         
					   	        }
					   	        if(data_config=="edit"&&(data_id=="0"||data_id==undefined||data_id=="")){
					   	        	
					   	        	window.location.href=config.base.concat("admin/home-builder/create-tiles");
					   	        	
					   	        }
					   	         
					   	         
					   	    }
					   	
				}else{
					
					alert_dialog('type-danger',"Please Wait until the current action get completed.",false,true);
				}
				return false;
				
			});
			var save_customize_action=false;
			$('#save_about_custom').click(function(){
				
				if(save_customize_action==false){
							$('.remove_g_image_spin_3').show("slow","swing");
							save_customize_action=true;
							var this_obj=$(this);
							this_obj.attr('disabled','disabled');
							
							$('.error-div').empty();
							$('.succ-div').empty();
							
							
							var slider=$('#slider').val(); 
							var content=$('.nicEdit-main').html();
							 
							var p_url=$(this).attr('data-url');
					   	   
					   	    if(content!=""||(slider!=""&&slider!="0"&&slider!=undefined))
					   	    {
					   	    	            
					   	    	            var url=p_url;
					   	    	            var formObj=new FormData();
									        formObj.append('content',content);
									        formObj.append('meta_id',slider);
									       
									        formObj.append(config.name,config.value);
									        
									        var ajaxReq;
									        try
									        {
											   ajaxReq = new XMLHttpRequest();
										    } 
										    catch (e)
										    { 
										    try{ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");} 
											    	catch (e) { try{ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");} catch (e)
																 {alert("Your browser does not support image upload at this environment.");
																	 return false;} }
										    } 
										    ajaxReq.open('POST', url);
									        ajaxReq.setRequestHeader('Cache-Control', 'no-cache');
									        ajaxReq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				
									        ajaxReq.send(formObj); 
											ajaxReq.onreadystatechange=function()
									  		{
									  			save_customize_action=false;
									  			if (ajaxReq.readyState==4 && ajaxReq.status==200)
									    		{
									    				
									    				var a=ajaxReq.responseText;
									    				var jsonData=JSON.parse(a);
									                    
									    				if(jsonData.status=="202"){
									    				
									    						$('.remove_g_image_spin_3').hide();
									    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
									    						$('.succ-div').append($('<p class="succ-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
									    						_remove_on_time('#n_message',6000,true);
									    						_remove_on_time('.succ-div',6000,false);
									    					
									    							    					
									    				}else if(jsonData.status=="203"){
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
												   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
												   	         $('.error-div').append($(jsonData.error).fadeIn('slow'));
												   	         _remove_on_time('.error-div',8000,false);
												   	         _remove_on_time('#n_message',4000,false);
									    					
									    				}else{
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('.n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
									    					 _remove_on_time('#n_message',4000,false); 
									    				}
									    				
									    				
									           }
									           
									            
									        }
					   	    	            
					   	    	            
								        
					   	    	
					   	 
					   	        
					   	    	
					   	    }else{
					   	    	     save_customize_action=false;
					   	        	 this_obj.prop('disabled',false);
						   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>You must fill one of the following-(Slider,Content).</p>').fadeIn('slow'));
						   	          _remove_on_time('.error-div',8000,false);
						   	         $('.remove_g_image_spin_3').hide();
						   	         
					   	       
					   	        
					   	         
					   	         
					   	    }
					   	
				}else{
					
					alert_dialog('type-danger',"Please Wait until the current action get completed.",false,true);
				}
				return false;
				
			});
			$('#save_tile_order').click(function(){
				
			   if(save_tile_action==false){
			   	    save_tile_action=true;
					var this_obj=$(this);
					$('.remove_g_image_spin_s_1').show("slow","swing");
					this_obj.attr('disabled','disabled');
					$('.remove_g_image_spin_s_2').hide();
					$('.remove_g_image_spin_s_3').hide();
					var ids=[];
			   	    $('.tile_item').each(function(){
			   	    	ids.push($(this).attr('data-id'));
			   	    });
			   	            var url=config.base.concat("admin/home-bulider/tiles/order");
							var _token=config.name;
						    var _data={};
							_data['id']=ids.toString();
							_data['mode']=$('#mode').val();
							_data[_token]=config.value;
							$.ajax({
								url:url,
								type:'POST',
								dataType:'JSON',
								data:_data,
								success:function(data){
									save_tile_action=false;
									if(data!=null){
										    
											if(data.status=="202"){
											  
												$('.remove_g_image_spin_s_1').hide();
												$('.remove_g_image_spin_s_3').hide();
												this_obj.removeAttr('disabled');
												$('.remove_g_image_spin_s_2').show("slow","swing");
												setTimeout(function(){$('.remove_g_image_spin_s_2').hide();},4000);
												
											}else{
												
			                                    $('.remove_g_image_spin_s_1').hide();
			                                    $('.remove_g_image_spin_s_2').hide();
												this_obj.removeAttr('disabled');
												$('.remove_g_image_spin_s_3').show("slow","swing");
												setTimeout(function(){$('.remove_g_image_spin_s_3').hide();},4000);
												
											}	    
													         	  
							 		}else{
							 			
							 			alert_dialog('type-danger',"Something went wrong. Please try again.",true,true);
							 			 
							 		    }
						      },error: function(xhr, textStatus, errorThrown) {
						      	                       save_tile_action=false;
						      	                       alert_dialog('type-danger',"Something went wrong. Please check your N/W connection and Try agin.",true,true);
						      	                       
											           
							 }
							
						   });
			   	    
			   }else{
			   	
			   	 alert_dialog('type-danger',"Please Wait until the current action get completed.",false,true);
			   	
			   }	
			
				return false;
			});
			
			$('.reset_btn').click(function(){
				
				$(this).closest('form').find("input[type=text], textarea,img").val("");
				
				$('.nicEdit-main').html('');
				
			    
			});
			
			$('.edit_disabled').click(function(e){return false;});
			
			$('.course_de_a').confirmation({
				animation:true,
				placement:"top",
				title:"Are you sure you want to do this action?",
				btnOkLabel:"Yes",
				btnCancelLabel:"No",
				singleton:true,
				popout:true,
				target:"_self",
				href:"#",
				container:'body',
				btnOkClass:"btn btn-sm btn-danger btn-danger-custom",
				btnCancelClass:"btn btn-sm btn-default btn-cancel-custom",
				onConfirm: function(event,element) {    if(bulk_action_enabled==true){ BootstrapDialog.alert('Please wait until the current action get completed.'); }else{do_delete_post(element,event);}    },
				onCancel: function() {}
			});
			$('.other_de_a').confirmation({
				animation:true,
				placement:"top",
				title:"Are you sure you want to do this action?",
				btnOkLabel:"Yes",
				btnCancelLabel:"No",
				singleton:true,
				popout:true,
				target:"_self",
				href:"#",
				container:'body',
				btnOkClass:"btn btn-sm btn-danger btn-danger-custom",
				btnCancelClass:"btn btn-sm btn-default btn-cancel-custom",
				onConfirm: function(event,element) { window.location.href=element.attr('href'); },
				onCancel: function() {}
			});
			
			function do_delete_post(element,event){
				
				var obj=element;
				
				obj.closest('td').find('.remove_c_spin_1').show("slow","swing");
			    var id=obj.attr('data-id');
			    
			    var meta_data=obj.attr('meta_data');  
			     
			    var post_type=obj.attr('data-post');   
			    var url=post_type;
				var _token=config.name;
			    var _data={};
				_data['id']=id;
				if(meta_data!=""&&meta_data!=null&&meta_data!=undefined){
					_data['meta_data']=meta_data;
				}
				_data[_token]=config.value;
				$.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
						if(data!=null){
								if(data.status=="202"){
								  
									obj.closest('tr').remove();
									
									
									alert_dialog('type-success',"Successfully Deleted.",true,true);
									
								}else{
									
                                   alert_dialog('type-danger',"Couldn't delete. Please try again.",true,true);
									
								}	    
										         	  
				 		}else{
				 			
				 			alert_dialog('type-danger',"Something went wrong. Please try again.",true,true);
				 			 
				 		    }
			      },error: function(xhr, textStatus, errorThrown) {
			      	                       
			      	                       alert_dialog('type-danger',"Something went wrong. Please check your N/W connection and Try agin.",true,true);
			      	                       
								           
				 }
				
			   });
			}
			
			
			$('.bulk_action_chkbox_parent').on('change',function(){
				$('.bulk_action_chkbox_parent').prop('checked',$(this).is(':checked'));
				$('.bulk_action_chkbox_chiled').prop('checked',$(this).is(':checked'));
				
			});	
			
			$('.bulk_action_slctbox').on('change',function(){
				var obj=this;
				var action=$(this).attr('data-action');
				if($(this).val()=="delete"){
					if($('.bulk_chckbx_parent').find('input[type=checkbox]:checked').length>0){
						 BootstrapDialog.confirm('You are about to delete '+$('.bulk_chckbx_parent').find('input[type=checkbox]:checked').length+' items, are you sure you want to do this action?', function(result){
				            if(result) {
				            	
				                $('.bulk_action_slctbox').prop('disabled',true);
				                $('.bulk_action_chkbox_parent').prop('disabled',true);
				                $('.bulk_action_chkbox_chiled').prop('disabled',true);
				                bulk_action_enabled=true;
				                $('.bulk_action_spin').show("slow","swing");
				                var ids=[];
				                $('.bulk_action_chkbox_chiled').each(function(){
				                	if($(this).is(':checked')){
				                		ids.push($(this).val());
				                		
				                	}
				                	
				                	
				                });
				                _do_bulk_action(ids,action);
				               
				            }else {
				               obj.selectedIndex=0;
				            }
				        });
			        
					}else{
						this.selectedIndex=0;
					}
				}
				
				return false;
			});	
			 
			function  _do_bulk_action(ids,action){
				var id=ids.join(',');
				var url=action;
				var _token=config.name;
			    var _data={};
				_data['id']=id;
				_data[_token]=config.value;
				$.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
						if(data!=null){
							   if(data.status=="202"){
								  
								    for(var i=0;i<ids.length;i++){
								    	$('#course_list_tr_'+ids[i]+'').remove();
								    }
									alert_dialog('type-success',"Successfully Deleted "+ids.length+" items",true,true);
									
								}else{
                                    alert_dialog('type-danger',"Couldn't delete. Please try again.",true,true);
								}	    
										         	  
				 		}else{
				 			
				 			alert_dialog('type-danger',"Something went wrong. Please try again.",true,true);
				 			 
				 		}
			      },error: function(xhr, textStatus, errorThrown) {
			      	                       
			      	      alert_dialog('type-danger',"Something went wrong. Please check your N/W connection and Try agin.",true,true);
			      				           
				 }
				
			   });
				
				
				
			} 		
			
			$('#pass').keyup(function(){
				
				var res=$(this).val();
				if(res.length>0){
					$('#pass_strength_div').find('div').show("slow","swing");
				}else{
					$('#pass_strength_div').find('div').hide();
				}
				var tests = ['(?=.*[0-9])','(?=.*[a-z])','(?=.*[A-Z])','(?=.*[@#$%!])','.{8,}'],
				    strength = 0;
				
				for (var i=0, l=tests.length; i<l; i++) {
				
				    var re = new RegExp(tests[i]);
				
				    if (re.test(res)) {
				
				        strength += 1;
				
				    }
				
				}
				
				if(strength<4){
				   $('.weak').addClass('add_weak');
				   $('.good').removeClass('add_good');
				   $('.strong').removeClass('add_strong');
				}else if(strength>3&&res.length>=8&&res.length<=13){
				   $('.good').addClass('add_good');
				   $('.weak').removeClass('add_weak');
				   $('.strong').removeClass('add_strong');
				}else if(strength>=5&&res.length>=14){
					$('.strong').addClass('add_strong');
					$('.weak').removeClass('add_weak');
					$('.good').removeClass('add_good');
				}
				
			});
            
            function removeHighlighting(highlightedElements){
			    highlightedElements.each(function(){
			        var element = $(this);
			        element.replaceWith(element.html());
			    })
			}
			
			function addHighlighting(element, textToHighlight){
			    var text = element.text();
			    var highlightedText = '<em>' + textToHighlight + '</em>';
			    var newText = text.replace(textToHighlight, highlightedText);
			    
			    element.html(newText);
			}
			
			$(".search-in-tbl-cat").on("keyup", function() {
			    var value = $(this).val();
			   
			    removeHighlighting($(".cat_tble tr em"));
			
			    $(".cat_tble tr").each(function(index) {
			    	
			        if (index !== 0) {
			            $row = $(this);
			            
			            var $tdElement = $row.find("td:nth-child(2)");
			            var id = $tdElement.text();
			            var matchedIndex = id.toLowerCase().indexOf(value.toLowerCase());
			            
			            if (matchedIndex != 0) {
			                $row.hide();
			            }
			            else {
			                addHighlighting($tdElement, value);
			                $row.show("slow","swing");
			            }
			        }
			    });
			});
            
           $('#rmove_co_img,#rmove_co_img_tw').click(function(){
				
				var id=$(this).attr('data-id');
				$(this).attr('disabled','disabled');
				var obj=$(this);
				$(this).closest('.ex_image_holder').find('.remove_c_image_spin').show("slow","swing");
			    var id=$(this).attr('data-id');
			    var field=$(this).attr('data-field');
			    if(field==undefined||field==""){
			    	field="file";
			    }  
				var url=$(this).attr('href');
				var _token=config.name;
			    var _data={};
				_data['id']=id;
				_data['field']=field;
				_data[_token]=config.value;
				$.ajax({
					url:url,
					type:'POST',
					dataType:'JSON',
					data:_data,
					success:function(data){
						if(data!=null){
								if(data.status=="202"){
									$('#e_file').val('');
									$('#ee_file').val('');
									obj.closest('.ex_image_holder').empty();
								}else{
									
									obj.closest('.ex_image_holder').find('.remove_c_image_spin').html('<div style="position: relative;font-size:10px;height: 100%;width: 100%;"><span>Couldn\'t remove image, Please try again.</span></div>');
								    setTimeout(function(){
									    obj.closest('.ex_image_holder').find('.remove_c_image_spin').html('<div style="position: relative;height: 100%;width: 100%;"><i class="fa fa-refresh fa-spin"></i></div>');	
									    obj.closest('.ex_image_holder').find('.remove_c_image_spin').hide();
								    	obj.removeAttr('disabled');
								    },6000);
								}	    
										         	  
				 		}else{
				 			window.location.reload(true);
				 		}
			      },error: function(xhr, textStatus, errorThrown) {
			      	
								    obj.closest('.ex_image_holder').find('.remove_c_image_spin').html('<div style="position: relative;font-size:9px;height: 100%;width: 100%;"><span class="e_long">The action you have requested could not be completed.Please check your N/W connection.</span></div>');
								    setTimeout(function(){
									    obj.closest('.ex_image_holder').find('.remove_c_image_spin').html('<div style="position: relative;height: 100%;width: 100%;"><i class="fa fa-refresh fa-spin"></i></div>');	
									    obj.closest('.ex_image_holder').find('.remove_c_image_spin').hide();
								    	obj.removeAttr('disabled');
								    },6000);
				 }
				
			   });
				return false;
				
				
			});    
			
            //***************************************************************************************** Custom add/Edit********************************************************//
            
            $('#save_custom_values').click(function(){
				
				$('.remove_g_image_spin_3').show("slow","swing");
				$(this).closest('.form-group').find('.facebookG').css('display','inline-block');
				var this_obj=$(this);
				this_obj.attr('disabled','disabled');
				var content=$('.nicEdit-main').html();
				$('.error-div').empty();
				$('.succ-div').empty();
				var media_id=$('.media_insert_id').val(); 
				var meta_file_id=$('.meta_file_insert_id').val();
		   	    var data_config=this_obj.attr('data-config');
		   	    var data_url=this_obj.attr('data-url');
		   	    var data_id="0";
		   	    var existing_meta_file="";
		   	    var existing_meta_image="";
		   	    var e_file="";
		   	    var ee_file="";
		   	    if(data_config=="edit"){
		   	    	data_id=this_obj.attr('data-id');
		   	    	existing_meta_file=$('#existing_meta_file').val();
		   	    	existing_meta_image=$('#existing_meta_image').val();
		   	    	e_file=$('#e_file').val();
		   	    	ee_file=$('#ee_file').val();
		   	    }
		   	    
		   	    if((data_config=="save"||(data_config=="edit"&&data_id!="0"&&data_id!=undefined&&data_id!="")))
		   	    {
		   	    	
		   	    	        
		   	    	        var url=data_url;
		   	    	        var data_array=$("#custom_fom").serializeArray();
					        var fileId = document.getElementById('file');
					        var fileId_two = document.getElementById('ffile');
							
					    	var formObj = new FormData(); 
					    	formObj.append('data',JSON.stringify(data_array));
							
							
							
					        formObj.append('file', "");
					        if(fileId_two){
					        	formObj.append('meta_image', fileId_two.files[0]);
					        }
							
					        formObj.append('name',$('#name').val());
					        formObj.append('content',content);
					        formObj.append('meta_content',$('#video_url').val());
					        formObj.append('valid_email',$('#valid_email').val());
					        formObj.append('media_id',media_id);
					        formObj.append('meta_file_id',meta_file_id);
					        formObj.append('existing_meta_file',existing_meta_file);
					        formObj.append('existing_meta_image',existing_meta_image);
					        formObj.append('e_file',e_file);
					        formObj.append('ee_file',ee_file);
					        formObj.append(config.name,config.value);
					        formObj.append('op_mode',data_config);
					        formObj.append('op_id',data_id);
							
					        var ajaxReq;
					        try
					        {
							   ajaxReq = new XMLHttpRequest();
						    } 
						    catch (e)
						    { 
						    try{ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");} 
							    	catch (e) { try{ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");} catch (e)
												 {alert("Your browser does not support image upload at this environment.");
													 return false;} }
						    } 
						    ajaxReq.open('POST', url);
					        ajaxReq.setRequestHeader('Cache-Control', 'no-cache');
					        ajaxReq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

					        ajaxReq.send(formObj); 
							ajaxReq.onreadystatechange=function()
					  		{
					  			if (ajaxReq.readyState==4 && ajaxReq.status==200)
					    		{
					    				
					    				var a=ajaxReq.responseText;
					    				var jsonData=JSON.parse(a);
					                    
					    				if(jsonData.status=="202"){
					    				        
					    						$('.remove_g_image_spin_3').hide();
					    						this_obj.closest('.form-group').find('.facebookG').css('display','none');
					    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
					    						$('.succ-div').append($('<p class="succ-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
					    						_remove_on_time('#n_message',6000,true);
					    						_remove_on_time('.succ-div',6000,false);
					    					
					    							    					
					    				}else if(jsonData.status=="204"){
					    					 
					    					 this_obj.prop('disabled',false);
					    					 $('.remove_g_image_spin_3').hide();
					    					 this_obj.closest('.form-group').find('.facebookG').css('display','none');
					    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
								   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Image upload is failed</p>'+jsonData.error).fadeIn('slow'));
								   	         $('.error-div').append($(jsonData.error).fadeIn('slow'));
								   	        
								   	         _remove_on_time('.error-div',8000,false);
								   	         _remove_on_time('#n_message',4000,false);
								   	          
					    					
					    				}else if(jsonData.status=="203"){
					    					 
					    					 this_obj.prop('disabled',false);
					    					 $('.remove_g_image_spin_3').hide();
					    					 this_obj.closest('.form-group').find('.facebookG').css('display','none');
					    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
								   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
								   	         $('.error-div').append($(jsonData.error).fadeIn('slow'));
								   	         _remove_on_time('.error-div',8000,false);
								   	         _remove_on_time('#n_message',4000,false);
					    					
					    				}else{
					    					 this_obj.prop('disabled',false);
					    					 $('.remove_g_image_spin_3').hide();
					    					 this_obj.closest('.form-group').find('.facebookG').css('display','none');
					    					 $('.n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
					    					 _remove_on_time('#n_message',4000,false); 
					    				}
					    				
					    				
					    				
					    				
					           }
					           
					            
					        }
		   	    	
		   	 
		   	        return false;
		   	    	
		   	    }else{
		   	        if(name==""){
		   	        	
		   	        	 this_obj.prop('disabled',false);
			   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Course title is required</p>').fadeIn('slow'));
			   	          _remove_on_time('.error-div',8000,false);
			   	         $('.remove_g_image_spin_3').hide();
			   	         this_obj.closest('.form-group').find('.facebookG').css('display','none');
			   	         
		   	        }
		   	        if(data_config=="edit"&&(data_id=="0"||data_id==undefined||data_id=="")){
		   	        	
		   	        	window.location.reload(true);
		   	        	
		   	        }
		   	         
		   	         
		   	    }
		   	
				
				return false;
				
			});
            
           //*****************************************************************************************End of Custom add,edit ********************************************************//
           //*****************************************************************************************Add Seo Content ********************************************************//
             
             
              $('#save_seo_content').click(function(){
              	
				var this_obj=$(this);
				this_obj.closest('form').find('.remove_g_image_spin_3').show("slow","swing");
				this_obj.attr('disabled','disabled');
				var post_meta=$('#post_meta').val();
				var content=$('#post_description').val();
				this_obj.closest('form').find('.error-div').empty();
				this_obj.closest('form').find('.succ-div').empty();
		   	    var data_url=this_obj.attr('data-url');
		   	    var seo_title=$('#seo_title').val();
		   	    var seo_h1=$('#seo_h1').val();
		   	    
		   	    if(seo_title!=""||content!=""||seo_h1!="")
		   	    {
		   	    	
		   	    	            var _token=config.name;
							    var _data={};
								_data['title']=seo_title;
								_data['meta']=content;
								_data['post_meta']=post_meta;
								_data['h1']=seo_h1;
								_data[_token]=config.value;
								$.ajax({
									url:data_url,
									type:'POST',
									dataType:'JSON',
									data:_data,
									success:function(jsonData){
										if(jsonData.status=="202"){
					    				
					    						this_obj.closest('form').find('.remove_g_image_spin_3').hide();
					    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
					    						this_obj.closest('form').find('.succ-div').append($('<p class="succ-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
					    						_remove_on_time('#n_message',6000,true);
					    						_remove_on_time('.succ-div',6000,false);
					    					
					    							    					
					    				}else if(jsonData.status=="203"){
					    					 this_obj.prop('disabled',false);
					    					 this_obj.closest('form').find('.remove_g_image_spin_3').hide();
					    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
								   	         this_obj.closest('form').find('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
								   	         this_obj.closest('form').find('.error-div').append($(jsonData.error).fadeIn('slow'));
								   	         _remove_on_time('.error-div',8000,false);
								   	         _remove_on_time('#n_message',4000,false);
					    					
					    				}else{
					    					 this_obj.prop('disabled',false);
					    					 this_obj.closest('form').find('.remove_g_image_spin_3').hide();
					    					 this_obj.closest('form').find('.n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
					    					 _remove_on_time('#n_message',4000,false); 
					    				}
										
										
								      },error: function(xhr, textStatus, errorThrown) {
								      	                       
								      	      alert_dialog('type-danger',"Something went wrong. Please check your N/W connection and Try agin.",true,true);
								      				           
									  }
								
							   });
						   	    	        
		   	    	
		   	 
		   	       
		   	    	
		   	    }else{
		   	        
		   	        	
		   	        	 this_obj.prop('disabled',false);
			   	         this_obj.closest('form').find('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Content Or Title is required</p>').fadeIn('slow'));
			   	          _remove_on_time('.error-div',8000,false);
			   	         this_obj.closest('form').find('.remove_g_image_spin_3').hide();
			   	         
		   	        
		   	       
		   	         
		   	    }
		   	
				
				return false;
				
			});
             
             
            //*****************************************************************************************end of Seo Content ********************************************************//  
            //*****************************************************************************************Home customization ********************************************************//
            var save_customize_action=false;
			$('#save_home_custome').click(function(){
				
				if(save_customize_action==false){
							$('.remove_g_image_spin_3').show("slow","swing");
							save_customize_action=true;
							var this_obj=$(this);
							this_obj.attr('disabled','disabled');
							
							$('.error-div').empty();
							$('.succ-div').empty();
							
							var name=$('#name').val();
							var description=$('#description').val();
							var rurl=$('#url').val(); 
							
							
							var slider=$('#slider').val(); 
							var content=$('.nicEdit-main').html();
							 
							var media_id=$('.media_insert_id').val();
							if(media_id==undefined){
								media_id="";
							}
							  
					   	    var data_config=this_obj.attr('data-config');
					   	    var data_id="0";
					   	    var e_file="";
					   	    if(data_config=="edit"){
					   	    	data_id=this_obj.attr('data-id');
					   	    	e_file=$('#e_files').val();
					   	    }
					   	    if((content!=""||(media_id!=""&&media_id!="0"&&media_id!=undefined)||(slider!=""&&slider!="0"&&slider!=undefined)||$('#file').val()!="")&&(data_config=="save"||(data_config=="edit"&&data_id!="0"&&data_id!=undefined&&data_id!="")))
					   	    {
					   	    	            
					   	    	            var url=this_obj.attr('data-url');
					   	    	            var fileId = document.getElementById('file');
									    	var formObj = new FormData(); 
									        formObj.append('file', fileId.files[0]);
									        formObj.append('name',name);
									        formObj.append('meta_content',description);
									        formObj.append('content',content);
									        formObj.append('meta_id',slider);
									        formObj.append('media_id',media_id);
									        formObj.append('e_file',e_file);
									        formObj.append('meta_file',rurl);
									        formObj.append(config.name,config.value);
									        formObj.append('op_mode',data_config);
									        formObj.append('op_id',data_id);
									        var ajaxReq;
									        try
									        {
											   ajaxReq = new XMLHttpRequest();
										    } 
										    catch (e)
										    { 
										    try{ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");} 
											    	catch (e) { try{ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");} catch (e)
																 {alert("Your browser does not support image upload at this environment.");
																	 return false;} }
										    } 
										    ajaxReq.open('POST', url);
									        ajaxReq.setRequestHeader('Cache-Control', 'no-cache');
									        ajaxReq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				
									        ajaxReq.send(formObj); 
											ajaxReq.onreadystatechange=function()
									  		{
									  			save_customize_action=false;
									  			if (ajaxReq.readyState==4 && ajaxReq.status==200)
									    		{
									    				
									    				var a=ajaxReq.responseText;
									    				var jsonData=JSON.parse(a);
									                    
									    				if(jsonData.status=="202"){
									    				
									    						$('.remove_g_image_spin_3').hide();
									    						$('#n_message').append($('<span class="success_message"><i class="fa fa-check"></i>Successfully saved</span>').fadeIn('slow'));
									    						$('.succ-div').append($('<p class="succ-message"><i class="fa fa-check"></i>Successfully Saved.</p>').fadeIn('slow'));
									    						_remove_on_time('#n_message',6000,true);
									    						_remove_on_time('.succ-div',6000,false);
									    					
									    							    					
									    				}else if(jsonData.status=="204"){
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
												   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Image upload is failed</p>'+jsonData.error).fadeIn('slow'));
												   	         $('.error-div').append($(jsonData.error).fadeIn('slow'));
												   	        
												   	         _remove_on_time('.error-div',8000,false);
												   	         _remove_on_time('#n_message',4000,false);
												   	          
									    					
									    				}else if(jsonData.status=="203"){
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('#n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
												   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>Please check the values you have submitted.</p>').fadeIn('slow'));
												   	         $('.error-div').append($(jsonData.error).fadeIn('slow'));
												   	         _remove_on_time('.error-div',8000,false);
												   	         _remove_on_time('#n_message',4000,false);
									    					
									    				}else{
									    					 this_obj.prop('disabled',false);
									    					 $('.remove_g_image_spin_3').hide();
									    					 $('.n_message').append($('<span class="error-message-s"><i class="fa fa-close"></i>Couldn\'t save,Try again!</span>').fadeIn('slow'));
									    					 _remove_on_time('#n_message',4000,false); 
									    				}
									    				
									    				
									    				
									    				
									           }
									           
									            
									        }
					   	    	            
					   	    	            
								        
					   	    	
					   	 
					   	        
					   	    	
					   	    }else{
					   	    	save_customize_action=false;
					   	        if((confirm==""||(slider==""||slider=="0"||slider==undefined)||$('#file').val()=="")){
					   	        	
					   	        	 this_obj.prop('disabled',false);
						   	         $('.error-div').append($('<p class="error-message"><i class="fa fa-close"></i>You must fill one of the following-(Image/Flash,Slider,Content).</p>').fadeIn('slow'));
						   	          _remove_on_time('.error-div',8000,false);
						   	         $('.remove_g_image_spin_3').hide();
						   	         
					   	        }
					   	        if(data_config=="edit"&&(data_id=="0"||data_id==undefined||data_id=="")){
					   	        	
					   	        	window.location.href=config.base.concat("admin/home-builder/customize-home");
					   	        	
					   	        }
					   	         
					   	         
					   	    }
					   	
				}else{
					
					alert_dialog('type-danger',"Please Wait until the current action get completed.",false,true);
				}
				return false;
				
			});
			
			$(document).on('change','.one_slct_chkbx',function(){
				 
				  $('.one_slct_chkbx').prop('checked',false);
				  if(!$(this).is(':checked')){
				  	  $(this).prop('checked',true);
				  	  
				  }
			});
			$(document).on('click','.appnd_authr_btn_a',function(){
				$('#authr_appnd').append($('<div  class="col-lg-5 authr_sngl_hldr"><div class="form-group"><label>Author Name</label><br><input type="text" name="auther_name[]" class="form-control">'+ 
										 '</div><div class="form-group"><label>About Author</label><br><textarea rows="7" name="auther_details[]" class="form-control"></textarea></div> '+
										 '<button title="Remove" class="btn btn-remove btn-danger cls_btn_rve_authr" type="button"><span class="glyphicon glyphicon-remove"></span></button></div>').fadeIn('slow'));
				
				return false;
			});
			$(document).on('click','.cls_btn_rve_authr',function(){
				$(this).closest('.authr_sngl_hldr').remove();
				return false;
				
			});
			$('.authr_chang_st').on('change',function(){
				var val=$(this).val();
				var txt=$('.authr_chang_st option:selected').text();
				var aabout=$('.authr_chang_st option:selected').attr('data-about');
				$('.al_exists').empty();
				if(val!="default"){
					$('.authr_sngl_hldr').each(function(){
						
						var txt=$('input[type=text]').val();
						var txtarea=$('textarea').val();
						if(txt==""&&txtarea==""){
							$(this).remove();
						}else{
							if($(this).find('.cls_btn_rve_authr').length==0){
								$(this).append('<button title="Remove" class="btn btn-remove btn-danger cls_btn_rve_authr" type="button"><span class="glyphicon glyphicon-remove"></span></button>');
							}
						}
						
					});
					var exist=false;
					$('.clss_ath_id').each(function(){
						if($(this).val()==val){
						  exist=true;
						  return false;
						}
					});
					if(!exist){
						
						$('#authr_appnd').append($('<div  class="col-lg-5 authr_sngl_hldr"><div class="form-group"><label>Author Name</label><br><input type="text" name="auther_name[]" value="'+txt+'" class="form-control">'+
						                           '<input type="hidden" value="'+val+'" class="form-control clss_ath_id" name="posts_id[]">'+ 
										           '</div><div class="form-group"><label>About Author</label><br><textarea rows="7" name="auther_details[]" class="form-control">'+aabout+'</textarea></div>'+
										           '<button title="Remove" class="btn btn-remove btn-danger cls_btn_rve_authr" type="button"><span class="glyphicon glyphicon-remove"></span></button></div>').fadeIn('slow'));
				
						
					}else{
						$('.al_exists').html("Already Added.!");
						setTimeout(function(){
							$('.al_exists').empty();
						},3000);
					}
					
				}
				
			});
			//***************************************************************************************** End of Home customization ********************************************************//
           $(".spin-waiter").click(function(){
		        $(this).button('loading');
		   }); 
});

function _do_edit_action(id){ 
	if(bulk_action_enabled==true){
		BootstrapDialog.confirm('Your previous action has not been completed.Do yo want to continue?', function(result){
				            if(result) {
				               document.getElementById(id).submit();
				            }
		});
	}else{
		
		document.getElementById(id).submit();
	}			
			
}

