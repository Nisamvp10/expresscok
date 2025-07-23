<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	var $user_info=array();
	public function __construct(){
		parent::__construct();
		$this->check_user_auth();
	}
	function check_user_auth(){
		$sess_data=$this->session->userdata('user_session_data');
		if($this->session->userdata('user_session_data')&&isset($sess_data['sess_created'])&&$sess_data['sess_created']==TRUE){
			$this->user_info=$sess_data;
			
		}
		
	}
	public function index()
	{
			
	                $where=array('status'=>0);	
					$wheree=array('a.status'=>0);
					$where_str="";
					$wheree_str="";
					$where_cstr="";
					$wheree_cstr="";
				    $s_fil_ar=$this->session->userdata('fltrssar');
					if(isset($s_fil_ar['price'])&&!empty($s_fil_ar['price'])){
						
						$price_ar=explode(',',$s_fil_ar['price']);
						if(count($price_ar)==2){
							$where=array_merge($where,array("price  >= "=>intval($price_ar[0]),"price <= "=>intval($price_ar[1])));	
					        $wheree=array_merge($wheree,array('a.price >= '=>intval($price_ar[0]),'a.price <= '=>intval($price_ar[1])));
							
						}
						
					}
					if(isset($s_fil_ar['size'])&&!empty($s_fil_ar['size'])){
						
						$size=$s_fil_ar['size'];
						$result['size']=$size;
					    $where_str='find_in_set("'.$size.'",sizes)!=0';	
					    $wheree_str='find_in_set("'.$size.'",a.sizes)!=0';
						
					}
					if(isset($s_fil_ar['color'])&&!empty($s_fil_ar['color'])){
						
						$color=$s_fil_ar['color'];
						$result['color']=$color;
					    $where_cstr='find_in_set("'.$color.'",colors)!=0';	
					    $wheree_cstr='find_in_set("'.$color.'",a.colors)!=0';
						
					}		
			        if(isset($s_fil_ar['category'])){
			        	unset($s_fil_ar['category']);
						$this->session->set_userdata('fltrssar',$s_fil_ar);
			        }
					$result['active']="home";
					$result['userdata']=$this->user_info;
					$result['cart']=$this->get_cart();	
					$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
					$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
					$this->load->view('includes/header',$result);
					$result['result_tiles']=$this->home_model->get_tiles(array('a.mode'=>"cameella_builder",'a.status'=>0));
					$result['sliders']=$this->home_model->get_sliders(array('a.mode'=>'cameella','a.meta_mode'=>"slider"));
					$result_products=$this->initiate_lib(array(base_url('products/page'),$where,$wheree,'cameella',9,3,'class="btn btn-default btn-defaultextra pr_pg_aj_pgnn"','results','rsults_links',$where_str,$wheree_str,$where_cstr,$wheree_cstr));
					$result['results_new']=$this->home_model->get_f_contents('cameella',array('a.status'=>0,'a.display'=>0),'ASC');
					$result['results_offer']=$this->home_model->get_f_contents('cameella',array('a.status'=>0,'a.offerlist'=>0),'ASC');
					$result['results_featured']=$this->home_model->get_f_contents('cameella',array('a.status'=>0,'a.featured'=>0),'ASC');
					$result['testimonials']=$this->home_model->get_f_contents('posts',array('a.mode'=>'cameella_customize','a.status'=>0),'ASC');
					$result['wishlist']=$this->get_wish();	
					$this->load->view('home',array_merge($result,$result_products));
					$this->load->view('includes/footer');
	}
    function category($cat){
    	
    	$re=array();	
		if(!empty($cat)){
			$re=$this->home_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>"cameella",'content'=>$cat));
			if(empty($re)){
				redirect();
			}
		}else{
		    redirect();
		}
		            $cat_id=(isset($re[0]['id']))?$re[0]['id']:0;
		            $where=array('status'=>0,'category'=>$cat_id);	
					$wheree=array('a.status'=>0,'a.category'=>$cat_id);
					$where_str="";
					$wheree_str="";
					$where_cstr="";
					$wheree_cstr="";
				    $s_fil_ar=$this->session->userdata('fltrssar');
					$s_fil_ar['category']=$cat_id;
					if(isset($s_fil_ar['price'])&&!empty($s_fil_ar['price'])){
						
						$price_ar=explode(',',$s_fil_ar['price']);
						if(count($price_ar)==2){
							$where=array_merge($where,array("price  >= "=>intval($price_ar[0]),"price <= "=>intval($price_ar[1])));	
					        $wheree=array_merge($wheree,array('a.price >= '=>intval($price_ar[0]),'a.price <= '=>intval($price_ar[1])));
							
						}
						
					}
					if(isset($s_fil_ar['size'])&&!empty($s_fil_ar['size'])){
						
						$size=$s_fil_ar['size'];
						$result['size']=$size;
					    $where_str='find_in_set("'.$size.'",sizes)!=0';	
					    $wheree_str='find_in_set("'.$size.'",a.sizes)!=0';
						
					}
					if(isset($s_fil_ar['color'])&&!empty($s_fil_ar['color'])){
						
						$color=$s_fil_ar['color'];
						$result['color']=$color;
					    $where_cstr='find_in_set("'.$color.'",colors)!=0';	
					    $wheree_cstr='find_in_set("'.$color.'",a.colors)!=0';
						
					}		
					$this->session->set_userdata('fltrssar',$s_fil_ar);
		$result['category_active']=$cat_id;
		$result['active']="category";
		$result['userdata']=$this->user_info;
		$result['category_result']=$re;	
		$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
		$result['seo']=$this->home_model->get_de_contents('seo_settings',array('post_meta'=>'posts','mode'=>'cameella','meta_mode'=>"category",'meta_id'=>$cat_id));
		$result['cart']=$this->get_cart();	
		$this->load->view('includes/header',$result);
		$result['sliders']=$this->home_model->get_category_sliders(array('a.id'=>isset($re[0]['meta_id'])?$re[0]['meta_id']:0));
		$result['results']=$this->home_model->get_ff_contents('cameella',array('a.category'=>$cat,'a.status'=>0));
		$result['wishlist']=$this->get_wish();	
		$result_products=$this->initiate_lib(array(base_url('products/page'),$where,$wheree,'cameella',9,3,'class="btn btn-default btn-defaultextra pr_pg_aj_pgnn"','results','rsults_links',$where_str,$wheree_str,$where_cstr,$wheree_cstr));
		$this->load->view('category_landing',array_merge($result,$result_products));
		$this->load->view('includes/footer');
		
    }
    function initiate_lib($pg_conf){
    	            
					$this->load->library('pagination');	
					$config['base_url']=$pg_conf[0];
					$config['total_rows']=count($this->home_model->get_rows_count(array($pg_conf[3],$pg_conf[1],$pg_conf[9],$pg_conf[11])));
					$config['per_page']=$pg_conf[4];
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['cur_tag_open'] = '<button class="btn btn-default btn-defaultextra btn-page-current">';
                    $config['cur_tag_close'] = '</button>';
					$config['uri_segmant'] = $pg_conf[5];
					$config['anchor_class'] = $pg_conf[6];
					$this->pagination->initialize($config);
			        $result[$pg_conf[7]]=$this->home_model->get_contents(array($pg_conf[3],$config['per_page'],$this->uri->segment($config['uri_segmant'],0),$pg_conf[2],$pg_conf[10],$pg_conf[12]));
					$result[$pg_conf[8]]=$this->pagination->create_links();
					return $result;	
			
    }
	function clear($data){
		$s_fil_ar=$this->session->userdata('fltrssar');
		switch ($data) {
			case 'size':
				if(isset($s_fil_ar['size'])){
					unset($s_fil_ar['size']);
				}
				$this->session->set_userdata('fltrssar',$s_fil_ar);
			break;
			case 'price':
				if(isset($s_fil_ar['price'])){
					unset($s_fil_ar['price']);
				}
				$this->session->set_userdata('fltrssar',$s_fil_ar);
			break;
			case 'color':
				if(isset($s_fil_ar['color'])){
					unset($s_fil_ar['color']);
				}
				$this->session->set_userdata('fltrssar',$s_fil_ar);
			break;
			
			default:
				redirect();
			break;
		}
        if($this->input->get('rd')){
        	$rd=base64_decode($this->input->get('rd'));
        	redirect($rd);
        }else{
        	redirect();
        }
		
	}
	function get_lib_data(){
		  $this->load->library('form_validation');
		  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
				    $where=array('status'=>0);	
					$wheree=array('a.status'=>0);
					$where_str="";
					$wheree_str="";
					$where_cstr="";
					$wheree_cstr="";
				    $s_fil_ar=$this->session->userdata('fltrssar');
					$this->form_validation->set_rules('price','price','trim|xss_clean');
					$this->form_validation->set_rules('size','size','trim|xss_clean');
					$this->form_validation->set_rules('color','color','trim|xss_clean');
				    if($this->form_validation->run()==TRUE){
				    	$price=$this->input->post('price');
				    	if($this->input->post('price')&&!empty($price)){
				    		$s_fil_ar['price']=$price;
							$this->session->set_userdata('fltrssar',$s_fil_ar);
				    	}
						$color=$this->input->post('color');
				    	if($this->input->post('color')&&!empty($color)){
				    		$s_fil_ar['color']=$color;
							$this->session->set_userdata('fltrssar',$s_fil_ar);
				    	}
						$size=$this->input->post('size');
				    	if($this->input->post('size')&&!empty($size)){
				    		$s_fil_ar['size']=$size;
							$this->session->set_userdata('fltrssar',$s_fil_ar);
				    	}
					}	
					
					if(isset($s_fil_ar['price'])&&!empty($s_fil_ar['price'])){
						
						$price_ar=explode(',',$s_fil_ar['price']);
						if(count($price_ar)==2){
							$where=array_merge($where,array("price  >= "=>intval($price_ar[0]),"price <= "=>intval($price_ar[1])));	
					        $wheree=array_merge($wheree,array('a.price >= '=>intval($price_ar[0]),'a.price <= '=>intval($price_ar[1])));
							
						}
						
					}
					if(isset($s_fil_ar['category'])&&!empty($s_fil_ar['category'])){
						
						$category_id=$s_fil_ar['category'];
						if(!empty($category_id)){
							$where=array_merge($where,array("category"=>$category_id));	
					        $wheree=array_merge($wheree,array("a.category"=>$category_id));
							
						}
						
					}
					if(isset($s_fil_ar['size'])&&!empty($s_fil_ar['size'])){
						
						$size=$s_fil_ar['size'];
					    $where_str='find_in_set("'.$size.'",sizes)!=0';	
					    $wheree_str='find_in_set("'.$size.'",a.sizes)!=0';
						
					}
					if(isset($s_fil_ar['color'])&&!empty($s_fil_ar['color'])){
						
						$color=$s_fil_ar['color'];
					    $where_cstr='find_in_set("'.$color.'",colors)!=0';	
					    $wheree_cstr='find_in_set("'.$color.'",a.colors)!=0';
						
					}
					
					
				    $this->load->library('pagination');	
					$config['base_url']=base_url()."products/page";
					$config['total_rows']=count($this->home_model->get_rows_count(array('cameella',$where,$where_str,$where_cstr)));
					$config['per_page']=9;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['cur_tag_open'] = '<button class="btn btn-default btn-defaultextra btn-page-current">';
                    $config['cur_tag_close'] = '</button>';
					$config['uri_segment'] = 3; 
					$config['anchor_class'] = 'class="btn btn-default btn-defaultextra pr_pg_aj_pgnn"';
					$this->pagination->initialize($config);
					$result['p_links']=$this->pagination->create_links();
					$result['category']=$this->home_model->get_cat_content('posts',array('mode'=>'category','meta_mode'=>'cameella','status'=>0));
					$udata=$this->user_info;
					if($this->session->userdata('user_session_data')&&!empty($udata)){
						
						$re=$this->home_model->get_de_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id']));
						if(!empty($re)){
							$e_ids=json_decode($re[0]['pids'],TRUE);
							if(!empty($e_ids)){
								$result['wishlist']=$e_ids;
							}else{
								$result['wishlist']=null;
							}
						}else{
							$result['wishlist']=null;
						}
						
						
					}else{
						$result['wishlist']=null;
						
					}
			        $result['result_p']=$this->home_model->get_contents(array('cameella',$config['per_page'],$this->uri->segment(3,0),$wheree,$wheree_str,$wheree_cstr));
					$result['status']="202";
					
					$this->output->set_content_type('application/json')->set_output(json_encode($result));
				   
			}else{
					
					$this->index();
				
				
			}
		
		
	}
    function get_cart($ids=array()){
    	
		if(!empty($ids)){
				
			return $this->cart_html($ids);
					
		}else{
			if(!empty($this->user_info)){
				         $re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
				         if(!empty($re)){
							$e_ids=json_decode($re[0]['pids'],TRUE);
							
							return $this->cart_html($e_ids);
							
						}else{
							return $this->cart_html();
						}
			}elseif($this->session->userdata('cart_data')){
				       $e_ids=$this->session->userdata('cart_data');
					   
					   if(!empty($e_ids)){
					   	   
							
							return $this->cart_html($e_ids);
							
						
					   }else{
					   	   return $this->cart_html();
					   }
				
				
			}else{
				return $this->cart_html();
			}	
		}
    		
    	
    }
    function get_wish(){
    	
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
				
					
						         $re=$this->home_model->get_de_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id']));
						         if(!empty($re)){
									$e_ids=json_decode($re[0]['pids'],TRUE);
									
									return $e_ids;
									
								}else{
									return null;
								}
					
				
		}else{
			return null;
		}
    	
    }
	function re_wishlist(){
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			redirect('account/'.url_title($u_data['name'])."/wishlist");
				
		}else{
			redirect('user/account/login?rd='.base64_encode(base_url('account/wishlist')));
		}
	}
	function re_cart(){
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			redirect('account/'.url_title($u_data['name'])."/cart");
				
		}else{
			redirect('user/account/login?rd='.base64_encode(base_url('account/cart')));
		}
	}
	function cart_html($ids=array()){
		$id=array_keys($ids);
		if(!empty($id)){
			$result['result']=$this->home_model->get_where_in('cameella',$id);
			$result['cart_ids']=$ids;
			return $this->load->view('includes/cart',$result,TRUE);
		}else{
			return $this->load->view('includes/cart','',TRUE);
		}
		
	}
	function add_cart(){
		  $this->load->library('form_validation');
		  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					
				$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$id=$this->input->post('id');
					$ids=array();
					if(!empty($this->user_info)){
							
						$re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
						if(!empty($re)){
							$e_ids=json_decode($re[0]['pids'],TRUE);
							if(!empty($e_ids)){
								foreach ($e_ids as $ikey => $ivalue) {
									if($ikey==$id){
										$e_ids[$ikey]=intval($ivalue)+1;
									}
								}
							}
							if(!array_key_exists($id,$e_ids)){
								$e_ids[$id]=1;
								$ids=$e_ids;
							}else{
								$ids=$e_ids;
							}
							
						}else{
							$ids=array($id=>1);
						}
						
						$this->home_model->update_cart_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id'],'pids'=>json_encode($ids)),array('mode'=>'cart','uid'=>$this->user_info['id']));
						
					}else{
					   
					   $e_ids=$this->session->userdata('cart_data');
					   if(!empty($e_ids)){
					   	   
							foreach($e_ids as $ikey => $ivalue){
								if($ikey==$id){
									$e_ids[$ikey]=intval($ivalue)+1;
								}
							}
							
						
					   }else{
					   	$e_ids=array();
					   }
					   if(!array_key_exists($id,$e_ids)){
								$e_ids[$id]=1;
								$ids=$e_ids;
						}else{
								$ids=$e_ids;
						}
					   
					    $this->session->set_userdata('cart_data',$ids);
					   
					   
					   
					}		
					
					
					if(empty($ids))$ids=array($id=>1);
					$data['html']=$this->get_cart($ids);
					$data['status']="202";
					
				}else{
					
					$data['status']="203";
					
				}	
				
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
							
						
										
							
						
	      }else{
	      	
			   redirect();
	      	
		  }	
		
	}
	function update_cart($id,$size,$qty){
		  
				   if($this->session->userdata('user_session_data')&&!empty($this->user_info)){
						
						$rep=$this->home_model->get_f_contents_category('cameella',array('a.id'=>$id,'a.status'=>0));
					    if(!empty($rep)){
					    	
					    	        $available_qty=$rep[0]['quantity'];
									$available_size_qty=json_decode($rep[0]['sizes_and_qty'],TRUE);
									$size_required=$rep[0]['size_required'];
                                    if($available_qty>=$qty&&($size_required=="false"||(isset($available_size_qty[$size])&&$available_size_qty[$size]>=$qty))){
                                    	        $ids=array();
										        $meta_data=array();
											    $re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
												if(!empty($re)){
													
													$e_ids=json_decode($re[0]['pids'],TRUE);
													if(!empty($e_ids)){
														foreach ($e_ids as $ikey => $ivalue) {
															if($ikey==$id){
																$e_ids[$ikey]=intval($ivalue)+1;
															}
														}
													}
													if(!array_key_exists($id,$e_ids)){
														$e_ids[$id]=1;
														$ids=$e_ids;
													}else{
														$ids=$e_ids;
													}
													
													
													$mets=json_decode($re[0]['meta_data'],TRUE);
													if(!empty($mets)){
														foreach ($mets as $ikey => $ivalue) {
															if($ikey==$id){
																$mets[$ikey]=array($size,$qty);
															}
														}
													}
													if(empty($mets)||!array_key_exists($id,$mets)){
														$mets[$id]=array($size,$qty);
														$meta_data=$mets;
													}else{
																												
														$meta_data=$mets;
													}
													
													
												}else{
													
													$ids=array($id=>1);
													$meta_data=array($id=>array($size,$qty));
												}
												
												$this->home_model->update_cart_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id'],'pids'=>json_encode($ids),'meta_data'=>json_encode($meta_data)),array('mode'=>'cart','uid'=>$this->user_info['id']));
												redirect('account/'.url_title($this->user_info['name']).'/cart');		
										
										
                                    }else{
                                    	$this->session->flashdata('error','Quantity is not available');
										redirect('account/'.url_title($this->user_info['name']).'/wishlist');
                                    }
							
								
						}else{
							
							redirect('account/'.url_title($this->user_info['name']).'/cart');
						}
					}else{
						redirect('user/account/login?rd='.base64_encode(current_url()));
					}
					
					
			
	}
	function remove_cart(){
		  $this->load->library('form_validation');
		  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					
					$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
					if($this->form_validation->run()==TRUE){
						$id=$this->input->post('id');
						$ids=array();
						$meta_data=array();
						if(!empty($this->user_info)){
								
							$re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
							if(!empty($re)){
								$e_ids=json_decode($re[0]['pids'],TRUE);
								if(!empty($e_ids)){
									foreach ($e_ids as $ikey => $ivalue) {
										if($ikey==$id){
											unset($e_ids[$ikey]);
										}
									}
								}
								$ids=$e_ids;
								
								$e_meta=json_decode($re[0]['meta_data'],TRUE);
								if(!empty($e_meta)){
									foreach ($e_meta as $imkey => $imvalue) {
										if($imkey==$id){
											unset($e_meta[$imkey]);
										}
									}
								}
								$meta_data=$e_meta;
								
							}
							
							$this->home_model->update_cart_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id'],'pids'=>json_encode($ids),'meta_data'=>json_encode($meta_data)),array('mode'=>'cart','uid'=>$this->user_info['id']));
							
						}else{
						   
						   $e_ids=$this->session->userdata('cart_data');
						   if(!empty($e_ids)){
						   	   
								foreach($e_ids as $ikey => $ivalue){
									if($ikey==$id){
										unset($e_ids[$ikey]);
									}
								}
								
							
						   }else{
						   	$e_ids=array();
						   }
						   $ids=$e_ids;
						   if(!empty($ids)){
						   	  $this->session->set_userdata('cart_data',$ids);
						   }else{
						     	$this->session->unset_userdata('cart_data');
						   }
						   
						   
						   
						   
						}		
						
						
						
						$data['html']=$this->get_cart();
						$data['status']="202";
						
					}else{
						
						$data['status']="203";
						
					}	
					
					$this->output->set_content_type('application/json')->set_output(json_encode($data));	
						
		  
		  }else{
	      	
			   redirect();
	      	
		  }					
	}
    function revove_wishlist($id_e){
    	
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			 
			            $id=base64_decode($id_e);
						$ids=array();
						$meta_data=array();
						if(!empty($id)&&is_numeric($id)){
								
							$re=$this->home_model->get_de_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id']));
							if(!empty($re)){
								$e_ids=json_decode($re[0]['pids'],TRUE);
								if(!empty($e_ids)){
									foreach ($e_ids as $ikey => $ivalue) {
										if($ivalue==$id){
											array_splice($e_ids,$ikey,1);
										}
									}
								}
								$ids=$e_ids;
								
								$e_meta=json_decode($re[0]['meta_data'],TRUE);
								if(!empty($e_meta)){
									foreach ($e_meta as $imkey => $imvalue) {
										if($imkey==$id){
											unset($e_meta[$imkey]);
										}
									}
								}
								$meta_data=$e_meta;
								
							}
							
							
							
							$this->home_model->update_cart_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id'],'pids'=>json_encode($ids),'meta_data'=>json_encode($meta_data)),array('mode'=>'wish','uid'=>$this->user_info['id']));
							
						}
						
			redirect('account/'.url_title($u_data['name'])."/wishlist");
				
		}else{
			redirect('user/account/login?rd='.base64_encode(base_url('account/wishlist')));
		}
		
		
    }
	function add_wish(){
		  $this->load->library('form_validation');
		  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					
				$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$id=$this->input->post('id');
					$ids=array();
					if(!empty($this->user_info)){
							
						$re=$this->home_model->get_de_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id']));
						if(!empty($re)){
							$e_ids=json_decode($re[0]['pids'],TRUE);
							if(!in_array($id,$e_ids)){
								array_push($e_ids,$id);
							}
							$ids=$e_ids;
							
						}else{
							$ids=array($id);
						}
						
						$this->home_model->update_cart_contents('action',array('mode'=>'wish','uid'=>$this->user_info['id'],'pids'=>json_encode($ids)),array('mode'=>'wish','uid'=>$this->user_info['id']));
						$data['value']=$this->get_wish();
					    $data['status']="202";
					}else{
						
					   $data['status']="203";
					   
					}		
					
					
				}else{
					
					$data['status']="203";
					
				}	
                
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
							
						
						
	      }else{
	      	
			   redirect();
	      	
		  }	
		
	}
    public function product()
	{
			
			
		$id=$this->input->get('item');	
		$re=array();	
		if(!empty($id)&&is_numeric($id)){
			$re=$this->home_model->get_f_contents_category('cameella',array('a.id'=>$id,'a.status'=>0));
			if(empty($re)){
				redirect();
			}
		}else{
			redirect();
		}
		$result['active']="product";
		$result['userdata']=$this->user_info;
		$result['category_active']=$re[0]['category'];
		$result['cart']=$this->get_cart();	
		$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
		$result['seo']=$this->home_model->get_de_contents('seo_settings',array('post_meta'=>'posts','mode'=>'cameella','meta_mode'=>"products",'meta_id'=>$id));
		$this->load->view('includes/header',$result);
		$result['sliders']=$this->home_model->get_category_sliders(array('a.id'=>isset($re[0]['meta_id'])?$re[0]['meta_id']:0));
		$result['results']=$re;
		$result['vendor']=$this->home_model->get_f_contents('clients',array('a.id'=>$re[0]['client']));
		$result['comments']=$this->home_model->get_de_contents('comments',array('mode'=>"cameella",'post_id'=>$id));
		$result['results_new']=$this->home_model->get_ff_contents_limit('cameella',array('a.category'=>$re[0]['category'],'a.status'=>0));
		$result['wishlist']=$this->get_wish();	
		$this->load->view('products',$result);
		$this->load->view('includes/footer');
	}
    public function wishlist()
	{
			
			
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			$result['active']="wishlist";
			$result['userdata']=$this->user_info;
			$result['cart']=$this->get_cart();	
			$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
			$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
			$this->load->view('includes/header',$result);
			$result['wishlist']=$this->home_model->get_de_contents('action',array('mode'=>'wish','uid'=>$u_data['id']));	
			$ids=$this->get_wish();
			$result['result']=$this->home_model->get_where_in('cameella',$ids);
			$this->load->view('wishlist',$result);
			$this->load->view('includes/footer');
				
		}else{
			redirect('user/account/login?re='.base64_encode(base_url("account/wishlist")));
		}
		
	}
    function set_pcode(){
    	$this->load->library('form_validation');
    	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
				$this->form_validation->set_rules('pcode','pcode','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$this->session->set_userdata('tapalcode',$this->input->post('pcode'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}	
				
				$this->output->set_content_type('application/json')->set_output(json_encode($data));		
		}else{
			
			redirect('admin/user-logout');
		}	
		
		
    }
    
    
	function valid_url($url)
	{
	   	
	   
	    if ($url!="" && filter_var($url, FILTER_VALIDATE_URL) === FALSE)
	    {
	       	
	       	$this->form_validation->set_message('valid_url','The %s must be a valid Url');
	        return FALSE;
	    }
	
	    return TRUE;
	}
	
	function upload_image($file,$folder,$a_types,$file_size){
			
			$this->load->library('upload');
			if(isset($_FILES[$file])&&file_exists($_FILES[$file]['tmp_name'])&&is_uploaded_file($_FILES[$file]['tmp_name'])){
				
				if (!file_exists('./uploads/'.$folder)) {
				    mkdir('./uploads/'.$folder, 0777, true);
				}
				
				$config['upload_path']="./uploads/".$folder;
				$config['allowed_types']=$a_types;
				$config['max_size']=$file_size;
				$config['encrypt_name']=FALSE;
				$this->upload->initialize($config);
				if($this->upload->do_upload($file)){
					$u_data=$this->upload->data();
					return "uploads/".$folder."/".$u_data['file_name'];
					
				}else{
					
					return "error";
					
				}
				
				
			}else{
				return "no-file";
			}
			
		
	}
	function images(){
		$ar=$this->uri->segment_array();
		if(count($ar)>0){
		       if(file_exists('./uploads/media_library/'.end($ar))){
		       	    $this->load->helper('file');
					$image_path = './uploads/media_library/'.end($ar);
					$this->output->set_content_type(get_mime_by_extension($image_path));
					$this->output->set_output(file_get_contents($image_path));
		       }else{
		       	
		       	  show_404();
		       }
		        
			
		}else{
			
		   show_404();
		   
		}
		
		
	}
	function save_comments(){
		    $u_data=$this->user_info;
		    if($this->session->userdata('user_session_data')&&!empty($u_data)){
		    	    $this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>','</p>');	
		            $this->form_validation->set_rules('content','Review Title','trim|xss_clean|required|max_length[250]');
					$this->form_validation->set_rules('meta_content','Review','trim|xss_clean|required|max_length[500]');
					$this->form_validation->set_rules('post_id','Post Id','trim|xss_clean|required');
					$this->form_validation->set_rules('mode','Mode','trim|xss_clean|required');
					$this->form_validation->set_rules('rd','rd','trim|xss_clean|required');
					if($this->form_validation->run()==TRUE){
						
						$data=$this->input->post();
						if(isset($data['rd']))unset($data['rd']);
						$data['name']=$this->user_info['name'];
						$data['email']=$this->user_info['username'];
						$data['status']=1;
						
						$this->home_model->save_contents('comments',$data);
						
						$this->session->set_flashdata('success',TRUE);
						$rdi=base_url();
						if($this->input->post('rd')&&filter_var($this->input->post('rd'),FILTER_VALIDATE_URL)){
							$rdi=$this->input->post('rd');
						}
						redirect($rdi);
						
					}else{
						
						$this->session->set_flashdata('error','validation');
						$this->session->set_flashdata('details',validation_errors());
						$this->session->set_flashdata('value',$this->input->post());
						$rdi=base_url();
						if($this->input->post('rd')&&filter_var($this->input->post('rd'),FILTER_VALIDATE_URL)){
							$rdi=$this->input->post('rd');
						}
						redirect($rdi);
						
						
					}	
		    }else{
		    	        $rdi=base_url();
						if($this->input->post('rd')&&filter_var($this->input->post('rd'),FILTER_VALIDATE_URL)){
							$rdi=$this->input->post('rd');
						}
						
		    	        redirect('user/account/login?rd='.$rdi);
		    }
		            
	}
	function search(){
		            $this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>','</p>');	
		            $this->form_validation->set_rules('value','value','trim|xss_clean|required|max_length[250]');
					if($this->form_validation->run()==TRUE){
						 
						$this->session->set_flashdata('search',$this->input->post('value'));
						$qu=$this->input->post('value');
						redirect("results/".strtolower(url_title($qu)));
						
					}else{
						
						redirect();
					}	
		
		
	}
	function search_results(){
		  
		$query=$this->session->flashdata('search');
		$re=array();
		if(!empty($query)&&is_numeric($query)){
			
			$re=$this->home_model->get_f_contents_category('cameella',array('a.id'=>$query,'a.status'=>0));
			if(!empty($re)&&isset($re[0]['category_content'])&&!empty($re[0]['category_content'])){
				redirect($re[0]['category_content']."/".strtolower(url_title($re[0]['category_content'])).'?item='.$re[0]['id']);
			}
			
		}elseif(!empty($query)){
			
			$re=$this->home_model->get_like('cameella',$query);
			
			
		}else{
			redirect();
		}
		            
		$result['search_query']=$query;
		$result['active']="search_result";
		$result['userdata']=$this->user_info;
		$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
		$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
		$result['cart']=$this->get_cart();	
		$this->load->view('includes/header',$result);
		$result['results']=$re;
		$result['wishlist']=$this->get_wish();	
		$this->load->view('search_result',$result);
		$this->load->view('includes/footer');
		
		
		
	}
	function cart(){
		
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			$result['active']="cart";
			$result['userdata']=$this->user_info;
			$result['cart']=$this->get_cart();	
			$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
			$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
			$this->load->view('includes/header',$result);
			$result['wishlist']=$this->get_wish();
			$e_id=array();
			$re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
		    if(!empty($re)){
				$e_ids=json_decode($re[0]['pids'],TRUE);
				if(!empty($e_ids)){
					foreach ($e_ids as $key => $value) {
					    array_push($e_id,$key);
				     }
				}
				
			}
			$result['cart_result']=$re;
			$result['result']=$this->home_model->get_where_in('cameella',$e_id);
			$this->load->view('cart',$result);
			$this->load->view('includes/footer');
				
		}else{
			redirect('user/account/login?re='.base64_encode(base_url("account/cart")));
		}
		
	}
	function checkout(){
		
		$u_data=$this->user_info;
		if($this->session->userdata('user_session_data')&&!empty($u_data)){
			$result['active']="cart";
			$result['userdata']=$this->user_info;
			$result['cart']=$this->get_cart();	
			$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
			$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
			$this->load->view('includes/header',$result);
			$result['wishlist']=$this->get_wish();
			$e_id=array();
			$re=$this->home_model->get_de_contents('action',array('mode'=>'cart','uid'=>$this->user_info['id']));
		    if(!empty($re)){
				$e_ids=json_decode($re[0]['pids'],TRUE);
				if(!empty($e_ids)){
					foreach ($e_ids as $key => $value) {
					    array_push($e_id,$key);
				     }
				}
				
			}
			$result['cart_result']=$re;
			$result['result']=$this->home_model->get_where_in('cameella',$e_id);
			$this->load->view('checkout',$result);
			$this->load->view('includes/footer');
				
		}else{
			redirect('user/account/login?re='.base64_encode(base_url("checkout")));
		}
		
		
	}
	function suscribe(){
		redirect("checkout");
	}
	function about(){
		
		$result['active']="about";
		$result['userdata']=$this->user_info;
		$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
		$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
		$result['cart']=$this->get_cart();	
		$this->load->view('includes/header',$result);
		$result['wishlist']=$this->get_wish();	
		$this->load->view('about',$result);
		$this->load->view('includes/footer');
	}
	function connect(){
		
		$result['active']="connect";
		$result['userdata']=$this->user_info;
		$result['category']=$this->home_model->get_f_contents('posts',array('a.mode'=>'category','a.meta_mode'=>'cameella','a.status'=>0));
		$result['seo']=$this->home_model->get_de_contents('seo_settings',array('mode'=>'cameella','meta_mode'=>"seo"));
		$result['cart']=$this->get_cart();	
		$this->load->view('includes/header',$result);
		$result['wishlist']=$this->get_wish();	
		$this->load->view('connect',$result);
		$this->load->view('includes/footer');
	}
	function place_order(){
		
		
		
		echo "The test connection with payment gateway is successfull. Place change api to production mode.";
		
		
		//redirect('paypal/adaptive_payments');
		
		
		
	}
	function frntend_404(){
		echo "404";
	}
}