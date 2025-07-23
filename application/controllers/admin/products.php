<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Controller {
    var $user_info=array();
	var $file_size_g=1024;
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/dashboard_model');
		$this->load->helper('form');
		$this->check_user_authentication();
		$this->file_size_g=1024*4;
		
    }
	function check_user_authentication(){
		$sess_data=$this->session->userdata('session_data');
		if($this->session->userdata('session_data')!=FALSE&&isset($sess_data['sess_created'])&&$sess_data['sess_created']==TRUE){
				
			$this->user_info=$sess_data;
			
		}else{
			
			redirect('admin/user-login/?redirect='.current_url());
		}
		
	}
	public function index()
	{
		$data['user_info']=$this->user_info;
		$data['active']="dashboard";
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/index');
		$this->load->view('admin/includes/footer');
	}
	public function order()
	{
		$data['user_info']=$this->user_info;
		$data['active']="order";
		$this->load->view('admin/includes/header',$data);
		$where=array();
		$data['results']=$this->dashboard_model->get_order_contents();
		$this->load->view('admin/products/order',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function order_details($id)
	{
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
    	$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[2];
		$data['id']=$id;
		$where=array('a.order_id'=>$id);
		$data['details']=$this->dashboard_model->get_order_details($parm[2],$where);
		//echo '<pre>';print_r($data['details']);echo '</pre>';exit();
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/products/order_details',$data);
		$this->load->view('admin/includes/footer');
	}
	public function order_details_edit()
	{
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
    	$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']='order_details';
		$where=array('id'=>$this->input->post('id'));
		$data['details']=$this->dashboard_model->get_de_contents('order_details',$where);
		//echo '<pre>';print_r($data['details']);echo '</pre>';exit();
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/products/edit-order_details',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function order_details_save($tbl_name)
	{	
		$data=$this->input->post();
		$this->dashboard_model->insert_data_add('order_details',$data);
		redirect('admin/products/products/order_details/'.$data['order_id']);
	}
	
	public function order_details_edit_save($tbl_name)
	{	
		$data=$this->input->post();
		//echo '<pre>';print_r($data);echo '</pre>';exit();
		$this->dashboard_model->update_contents('order_details',$data,array('id'=>$this->input->post('id')));
		redirect('admin/products/products/order_details/'.$data['order_id']);
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
	
	function custom(){
		$parmss=$this->uri->rsegment_array();
        $par=$this->uri->segment_array();
		
        $parm=array_slice($par,1);
		$parms=array_slice($parmss,2);
		$cat=isset($parms[3])?$parms[3]:0;
		$mode=isset($parm[2])?$parm[2]:"";
		$data['user_info']=$this->user_info;
		$data['active']=$parms[0];
		$data['actived']=$parms[1];
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					if(($cat==0||empty($cat))&&($mode!="name")){
						 $config['base_url']=base_url("admin/".$parm[0]."/".$parm[1]);
					     $where=array();
						 $whereo=array();
					     
						 if($parm[1]=="package"){
					    	$where=array('mode'=>"package");
						    $whereo=array('a.mode'=>"package");
					        
						 }
                         if($parm[1]=="blog"){
					    	$where=array('mode'=>"blog");
						    $whereo=array('a.mode'=>"blog");
					        
						 }
					     $config['uri_segment'] = 4;
					}else{
						
						$config['uri_segment'] = 6; 
						if(!empty($mode)&&$mode=="category"){
							$config['base_url']=base_url("admin/".$parm[0]."/".$parm[1]."/category/$cat#search_id");
							$where=array('category'=>$cat);
							$whereo=array('category'=>$cat);
						    $result['f_c']=$cat;
						}
						if(!empty($mode)&&$mode=="code"){
							$config['base_url']=base_url("admin/".$parm[0]."/".$parm[1]."/code/$cat#search_id");
							$where=array('id'=>$cat);
							$whereo=array('a.id'=>$cat);
						    $result['p_code']=$cat;
						}
						if(!empty($mode)&&$mode=="name"){
							
							$config['base_url']=base_url("admin/".$parm[0]."/".$parm[1]."/name/$cat#search_id");
							$where="name like '%".urldecode($cat)."%'";
							$whereo="a.name like '%".urldecode($cat)."%'";
						    $result['p_name']=$cat;
						}
						
					}
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array($parms[2],$where)));
					$config['per_page']=8;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$this->pagination->initialize($config);
					$order=array('desc','id');
					$result['result']=$this->dashboard_model->get_contents(array($parms[2],$config['per_page'],$this->uri->segment($config['uri_segment'],0),$whereo,array('posts','file','file','id'),array('posts','meta_file','file','id')));
					
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
					unset($where);
					//$where=array('mode'=>'slider');
					//$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
					//unset($where);
					//$where=array('mode'=>'category');
					//$result['category']=$this->dashboard_model->get_de_contents('posts',$where);
					//unset($where);
					//$where=array('mode'=>'subcategory','meta_mode'=>$parms[0]);
					//$result['subcategory']=$this->dashboard_model->get_de_contents('posts',$where);
					//unset($where);
					//$where=array('mode'=>'category','meta_mode'=>'category_fasion');
					//$result['category_fasion']=$this->dashboard_model->get_de_contents('posts',$where);
					//unset($where);
					//$where=array('mode'=>'category','meta_mode'=>'stiching_category');
					//$result['stiching_category']=$this->dashboard_model->get_de_contents('posts',$where);
					//unset($where);
					//$where=array('mode'=>'clients','status'=>0);
					//$result['vendor']=$this->dashboard_model->get_de_contents('clients',$where);
					//$result['author_list']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'author'));
					$this->dashboard_model->get_de_contents('posts',array('mode'=>'product'));
		$result_l=$this->initiate_lib();			
		$this->load->view('admin/'.$parms[2].'/'.$parms[1],array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
	}
    function create_json($file_name,$data){
		
		  $fp = fopen($file_name, 'w');
		  fwrite($fp, json_encode($data));
		  fclose($fp);	
		  
	}
   function custom_save(){
    	      
    			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					$tmp_hld=$_POST;	
					$da=json_decode($this->input->post('data'),true);	
					$daa=array();
					foreach ($da as  $values) {
						$daa[$values['name']]=$values['value'];								  
					}
					$_POST=$daa;	
					$parmss=$this->uri->rsegment_array();
					$parms=array_slice($parmss,2);
				    $par=$this->uri->segment_array();
					$parm=array_slice($par,1);
					$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>','</p>');	
					$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
					if(isset($parms[1])&&$parms[1]=="products"){
						
					}
					if(isset($parms[1])&&$parms[1]=="blog"){
						
						$this->form_validation->set_rules('meta_file','Blog Date','trim|required');
					}
                    
					if($this->form_validation->run()==TRUE){
							
						//echo "hii";exit(0);
						
						if(!empty($_POST)){
							foreach ($_POST as $pkey => $psvalue) {
								$daa[$pkey]=$this->input->post($pkey,TRUE);
							}
						}
						
						$_POST=$tmp_hld;
						
						
						$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
						if($file=="error"){
							$data['error']=$this->upload->display_errors();
						    $data['status']="204";
						}else{
							            
										$content="";
										if($this->input->post('content')!=""){
											require_once APPPATH.'libraries/filter_library/HTMLPurifier.auto.php';
											$config = HTMLPurifier_Config::createDefault();
											$purifier = new HTMLPurifier($config);
											//$content= $purifier->purify($this->input->post('content'));
										}else{
											if(isset($parms[1])&&$parms[1]=="blog"){
						                         $data['error']='<p class="error-message"><i class="fa fa-close"></i> Blog content is required.</p>';
						                         $data['status']="203";
					                             $this->output->set_content_type('application/json')->set_output(json_encode($data));
												 die;
											}	
											//$content=$this->input->post('content');
										}	
										if($this->input->post('op_mode')=="save"){
											    if(isset($daa['e_file']))unset($daa['e_file']);
												if(isset($daa['ee_file']))unset($daa['ee_file']);
												if(isset($daa['media_id']))unset($daa['media_id']);
												if(isset($daa['media_i_file']))unset($daa['media_i_file']);
												if(isset($daa['meta_file_id']))unset($daa['meta_file_id']);
												if(isset($daa['existing_meta_image']))unset($daa['existing_meta_image']);
												if(isset($daa['valid_email']))unset($daa['valid_email']);
												if(isset($parms[1])&&$parms[1]!="comments"&&$parms[1]!="author"&&$parms[1]!="blog"){
													if(isset($daa['meta_content']))unset($daa['meta_content']);
												}
												
												if($file=="error"||$file=="no-file"){
													      $meid=$this->input->post('media_id');
													      if(!empty($meid)&&$meid!="undefined"){
													    	 $file=$meid;
															 $thumb="";
														     if($parms[1]=="products"){
																 $wher=array('id'=>$meid);
						                                         $resultmed=$this->dashboard_model->get_de_contents('posts',$wher);
																 if(!empty($resultmed)){
																 	
																	$exfile=$resultmed[0]['file'];
																	if(isset($resultmed[0]['meta_file'])&&(empty($resultmed[0]['meta_file'])||!file_exists('./'.$resultmed[0]['meta_file']))){
																		    $res_th=$this->create_thumb($exfile,'204','176');
																			if(!empty($res_th)){
																				$path_parts = pathinfo($exfile);
																				$tpath=$path_parts['dirname'];
																				$texte=$path_parts['extension'];
																				$tfile=$path_parts['filename'];
																				$tfile=$tfile.$res_th.".".$texte;
																				$thumb=$tpath."/".$tfile;
																				$this->dashboard_model->update_contents('posts',array('meta_file'=>$thumb),array('id'=>$meid));
																			}
																		
																	}
																	
																	
																 }
															  }	 
														  }
														  else{
															 $file="";
														  }
														  
													      $daa['mode']=$parms[1];
													      $daa['file']=$file;
													      
														  $this->dashboard_model->save_contents($parms[2],$daa);
													
											   }else{
														  $thumb="";
														  if($parms[1]=="products"){
														  	
															$res_th=$this->create_thumb($file,'204','176');
															if(!empty($res_th)){
																$path_parts = pathinfo($file);
																$tpath=$path_parts['dirname'];
																$texte=$path_parts['extension'];
																$tfile=$path_parts['filename'];
																$tfile=$tfile.$res_th.".".$texte;
																$thumb=$tpath."/".$tfile;
															}
															
														  }
													      $daa['mode']=$parms[1];
													      //$daa['content']=$content;
														  $this->dashboard_model->save_contents($parms[2],$daa,array('mode'=>'media_library','file'=>$file,'meta_file'=>$thumb),array('posts','file'));
											  }		  
										      $data['status']="202";
										  
										}elseif($this->input->post('op_mode')=="edit"){
													
											if($file=="error"||$file=="no-file"){
												
												$meid=$this->input->post('media_id');
												$exmeid=$this->input->post('e_file');
												if(!empty($meid)&&$meid!="undefined"){
													$file=$meid;
												}elseif(!empty($exmeid)&&$exmeid!="undefined"){
													$file=$exmeid;
												}else{
													$file="";
												} 	
												             $thumb="";
														     if($parms[1]=="products"&&!empty($file)){
																 $wher=array('id'=>$file);
						                                         $resultmed=$this->dashboard_model->get_de_contents('posts',$wher);
																 if(!empty($resultmed)){
																 	
																	$exfile=$resultmed[0]['file'];
																	if(isset($resultmed[0]['meta_file'])&&(empty($resultmed[0]['meta_file'])||!file_exists('./'.$resultmed[0]['meta_file']))){
																		    $res_th=$this->create_thumb($exfile,'204','176');
																			if(!empty($res_th)){
																				$path_parts = pathinfo($exfile);
																				$tpath=$path_parts['dirname'];
																				$texte=$path_parts['extension'];
																				$tfile=$path_parts['filename'];
																				$tfile=$tfile.$res_th.".".$texte;
																				$thumb=$tpath."/".$tfile;
																				$this->dashboard_model->update_contents('posts',array('meta_file'=>$thumb),array('id'=>$meid));
																			}
																		
																	}
																	
																	
																 }
															  }	 
												
												
											}else{
												
												
												          $thumb="";
														  if($parms[1]=="products"){
														  	
															$res_th=$this->create_thumb($file,'204','176');
															if(!empty($res_th)){
																$path_parts = pathinfo($file);
																$tpath=$path_parts['dirname'];
																$texte=$path_parts['extension'];
																$tfile=$path_parts['filename'];
																$tfile=$tfile.$res_th.".".$texte;
																$thumb=$tpath."/".$tfile;
															}
															
														  }
											    $datat=array('mode'=>'media_library','file'=>$file,'meta_file'=>$thumb);			  
												$file=$this->dashboard_model->save_file($datat);
												          
												
											}		
											
											
											
											        if(isset($daa['e_file']))unset($daa['e_file']);
													if(isset($daa['ee_file']))unset($daa['ee_file']);
												    if(isset($daa['media_id']))unset($daa['media_id']);
													if(isset($daa['media_i_file']))unset($daa['media_i_file']);
													if(isset($daa['meta_file_id']))unset($daa['meta_file_id']);
													if(isset($daa['existing_meta_image']))unset($daa['existing_meta_image']);
													if(isset($parms[1])&&$parms[1]!="comments"&&$parms[1]!="author"&&$parms[1]!="blog"){
														if(isset($daa['meta_content']))unset($daa['meta_content']);
													}
													if(isset($daa['valid_email']))unset($daa['valid_email']);
												    $daa['file']=$file;
												   // $daa['content']=$content;
												   //echo '<pre>';print_r($daa);echo '</pre>';exit();
													$this->dashboard_model->update_contents($parms[2],$daa,array('id'=>$this->input->post('op_id')));
											        $data['status']="202";
										
										
										
										}else{
											$data['status']="203";
										}
								     
						}
						
						
					}else{
						$data['error']=validation_errors();
						$data['status']="203";
					}
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}else{
				redirect('admin/user-logout');
			}
    		
    	
    }
    function save_package(){
    	      
    			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					$tmp_hld=$_POST;	
					$da=json_decode($this->input->post('data'),true);	
					$daa=array();
					$da_id=array();
					$da_qty=array();
					$da_price=array();
					foreach ($da as  $values) {
						if($values['name']=="p_id[]"){
							          if(!empty($values['value'])){
											array_push($da_id,$values['value']);
									  }else{
									  	    array_push($da_id,0);
									  }
							
						}elseif($values['name']=="p_price[]"){
							          if(!empty($values['value'])){
											array_push($da_price,$values['value']);
									  }else{
									  	    array_push($da_price,0);
									  }
						}elseif($values['name']=="quantity[]"){
							          if(!empty($values['value'])){
											array_push($da_qty,1);
									  }else{
									  	    array_push($da_qty,1);
									  }
						}else{
							$daa[$values['name']]=$values['value'];	
						}			
													  
					}
                    $daa['p_id']=$da_id;
					$daa['p_price']=$da_price;
					$daa['quantity']=$da_qty;
					$_POST=$daa;	
					$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>','</p>');	
					$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
					//$this->form_validation->set_rules('content','Content','trim');
					//$this->form_validation->set_rules('shipping_charge','Shipping Charge','trim|xss_clean|is_numeric');
					//$this->form_validation->set_rules('suggested','Suggested By','trim|xss_clean');
					//$this->form_validation->set_rules('price','Price','trim|xss_clean|is_numeric|required');
					//$this->form_validation->set_rules('p_price[]','Product Price','trim|xss_clean|is_numeric|required');
					//$this->form_validation->set_rules('p_id[]','Choose Books','trim|xss_clean|is_numeric|required');
					//$this->form_validation->set_rules('quantity[]','Quantity','trim|xss_clean|is_numeric');
					if($this->form_validation->run()==TRUE){
						if(!empty($_POST)){
							foreach ($_POST as $pkey => $psvalue) {
								$daa[$pkey]=$this->input->post($pkey,TRUE);
							}
						}
						$_POST=$tmp_hld;
						$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
						if($file=="error"){
							$data['error']=$this->upload->display_errors();
						    $data['status']="204";
						}else{
											
											
										
										$tmp_b_ar=array();
										foreach ($da_id as $dey => $dalue) {
											if(!empty($dalue)&&(isset($da_price[$dey])&&!empty($da_price[$dey]))&&(isset($da_qty[$dey])&&!empty($da_qty[$dey]))){
												$tmp_b_ar[$dalue]=array('qty'=>$da_qty[$dey],'price'=>$da_price[$dey]);
											}else{
												
													$data['error']='<p class="error-message"><i class="fa fa-close"></i>Price for all products are required.</p>';
													$data['status']="203";
												    $this->output->set_content_type('application/json')->set_output(json_encode($data));die();
											}
										}	
										if(!empty($tmp_b_ar)){
											$books=json_encode($tmp_b_ar);
										}
										$content="";
										if($this->input->post('content')!=""){
											require_once APPPATH.'libraries/filter_library/HTMLPurifier.auto.php';
											$config = HTMLPurifier_Config::createDefault();
											$purifier = new HTMLPurifier($config);
											$content= $purifier->purify($this->input->post('content'));
										}else{
											
											//$content=$this->input->post('content');
										}	
										if($this->input->post('op_mode')=="save"){
											    if(isset($daa['e_file']))unset($daa['e_file']);
												if(isset($daa['ee_file']))unset($daa['ee_file']);
												if(isset($daa['media_id']))unset($daa['media_id']);
												if(isset($daa['media_i_file']))unset($daa['media_i_file']);
												if(isset($daa['meta_file_id']))unset($daa['meta_file_id']);
												if(isset($daa['existing_meta_image']))unset($daa['existing_meta_image']);
												if(isset($daa['valid_email']))unset($daa['valid_email']);
												if(isset($daa['p_id']))unset($daa['p_id']);
												if(isset($daa['p_price']))unset($daa['p_price']);
												if(isset($daa['quantity']))unset($daa['quantity']);
												if($file=="error"||$file=="no-file"){
													      $meid=$this->input->post('media_id');
													      if(!empty($meid)&&$meid!="undefined"){
													    	 $file=$meid;
															 $thumb="";
														  }
														  else{
															 $file="";
														  }
														  
													      $daa['books']=$books;
													      $daa['file']=$file;
													      $daa['content']=$content;
														  $daa['meta_name']=url_title($daa['name']);
														  $this->dashboard_model->save_contents("package",$daa);
													
											   }else{
														  $thumb="";
														  $daa['watch']=$watch;
													      $daa['meta_name']=url_title($daa['name']);
													      $daa['content']=$content;
														  $this->dashboard_model->save_contents("package",$daa,array('mode'=>'media_library','file'=>$file,'meta_file'=>$thumb),array('posts','file'));
											  }		  
										      $data['status']="202";
										  
										}elseif($this->input->post('op_mode')=="edit"){
													
											if($file=="error"||$file=="no-file"){
												
												$meid=$this->input->post('media_id');
												$exmeid=$this->input->post('e_file');
												if(!empty($meid)&&$meid!="undefined"){
													$file=$meid;
												}elseif(!empty($exmeid)&&$exmeid!="undefined"){
													$file=$exmeid;
												}else{
													$file="";
												} 	
												$thumb="";
												
											}else{
												$thumb="";  
											    $datat=array('mode'=>'media_library','file'=>$file,'meta_file'=>$thumb);			  
												$file=$this->dashboard_model->save_file($datat);
												          
												
											}		
											        if(isset($daa['e_file']))unset($daa['e_file']);
													if(isset($daa['ee_file']))unset($daa['ee_file']);
												    if(isset($daa['media_id']))unset($daa['media_id']);
													if(isset($daa['media_i_file']))unset($daa['media_i_file']);
													if(isset($daa['meta_file_id']))unset($daa['meta_file_id']);
													if(isset($daa['existing_meta_image']))unset($daa['existing_meta_image']);
													if(isset($daa['valid_email']))unset($daa['valid_email']);
													if(isset($daa['p_id']))unset($daa['p_id']);
													if(isset($daa['p_price']))unset($daa['p_price']);
													if(isset($daa['quantity']))unset($daa['quantity']);
												    $daa['file']=$file;
												    $daa['content']=$content;
													$daa['products']=$products;
													$daa['meta_name']=url_title($daa['name']);
													$this->dashboard_model->update_contents('package',$daa,array('id'=>$this->input->post('op_id')));
											        $data['status']="202";
										
										
										
										}else{
											$data['status']="203";
										}
								     
						}
						
						
					}else{
						
						$data['error']=validation_errors();
						$data['status']="203";
					}
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}else{
				redirect('admin/user-logout');
			}
    		
    	
    }
    function edit_custom(){
    	
    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
				$parmss=$this->uri->rsegment_array();
		        $par=$this->uri->segment_array();
				
		        $parm=array_slice($par,1);
				$parms=array_slice($parmss,2);
				
				$data['user_info']=$this->user_info;
				$data['active']=$parms[0];
				$data['actived']=$parms[1];
				$this->load->view('admin/includes/header',$data);
				            $this->load->library('pagination');	
							$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1];
							$where=array();
							if($parm[1]=="authors"){
								$where=array('mode'=>'author');
							}
							$config['total_rows']=count($this->dashboard_model->get_rows_count(array($parms[2],$where)));
							$config['per_page']=8;
							$config['first_link'] = '« First';
							$config['last_link'] = 'Last »';
							$config['uri_segment'] = 4; 
							$this->pagination->initialize($config);
							if($parm[1]=="authors"){
								$where=array('a.mode'=>'author');
							}
							$result['result']=$this->dashboard_model->get_contents(array($parms[2],$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id'),array('posts','meta_file','file','id')));
							
							if($result['result']!=NULL&&!empty($result['result'])){
								$result['links']=$this->pagination->create_links();
							}
							
							$where=array('mode'=>'slider');
							$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
				            $result_l=$this->initiate_lib();
				            unset($where);
							$where=array('a.id'=>trim($this->input->post('id')));
							$result['result_id']=$this->dashboard_model->get_contents(array($parms[2],$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
							//echo '<pre>';print_r($result['result_id']);echo '</pre>';
							//$cat=$result['result_id'][0]["category"];
							//$condition=array('mode'=>'subcategory','meta_id'=>$cat);
							//$result['subcategory_selected']=$this->dashboard_model->get_de_contents('posts',$condition);
							//echo '<pre>';print_r($result['subcategory_selected']);echo '</pre>';exit();
							//$result['sizequantity']=json_decode($result['result_id'][0]['size_quantity'],TRUE);	
							//echo '<pre>';print_r($sizequantity);echo '</pre>';exit();
							if($result['result_id']==NULL||empty($result['result_id'])){
								$f=$this->uri->uri_string();
		                        redirect(dirname($f));
							}
							if($data['actived']=="package"&&!empty($result['result_id'])){
								$ids=json_decode($result['result_id'][0]['products'],TRUE);	
							    $idss=array_keys($ids);
								if(!empty($ids)){
									$ku=$this->dashboard_model->get_products_where_in('products',$idss);
									if(!empty($ku)){
									  foreach ($ku as $kuy => $kalue) {
										   foreach ($ids as $key => $value) {
											   if($key==$kalue['id']){
											   	  $ku[$kuy]=array_merge($kalue,array('package_price'=>$value['price'],'package_qty'=>$value['qty']));
											   }
										   } 
									  }
									  $result['package_product_list']=$ku;	
									}
								}
							}
							unset($where);
							$where=array('mode'=>'category','meta_mode'=>$parms[0]);
							$result['category']=$this->dashboard_model->get_de_contents('posts',$where);	
							//echo '<pre>';print_r($result['category']);echo '</pre>';exit();
							unset($where);
							$where=array('mode'=>'subcategory');
							$result['subcategory']=$this->dashboard_model->get_de_contents('posts',$where);
							unset($where);
							
				$this->load->view('admin/'.$parms[2].'/edit-'.$parms[1],array_merge($result,$result_l));
				$this->load->view('admin/includes/footer');
				
		}else{
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
		}
		
    }
	function home_settings(){
		$data['user_info']=$this->user_info;
		$data['active']='build-home';
		$data['actived']='build-home-settings';
		$this->load->view('admin/includes/header',$data);
		$where=array('mode'=>'slider');
		$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
		unset($where);
		$where=array('mode'=>'home-settings','meta_mode'=>'slider-one');
		$result['result']=$this->dashboard_model->get_de_contents('posts',$where);	
		$this->load->view('admin/home_settings',$result);
		$this->load->view('admin/includes/footer');
	}
	function save_home_slider(){
		$uri=$this->uri->segment_array();
		if(!isset($uri[4])&&!isset($uri[5])&&!isset($uri[6]))redirect('admin/not-found');
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('slider','Slider','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			    $sl_id=$this->input->post('slider');
				$data=array('mode'=>$uri[5],'meta_mode'=>$uri[6],'meta_id'=>$sl_id);
				$where=array('mode'=>$uri[5],'meta_mode'=>$uri[6]);
				$this->dashboard_model->save_or_update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect('admin/'.$uri[4]."/settings");
		}else{
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			redirect('admin/'.$uri[4]."/settings");
		}
		
		
	}
	function check_any_of_three($str){
		
		if((!isset($_FILES['file'])||!file_exists($_FILES['file']['tmp_name'])||!is_uploaded_file($_FILES['file']['tmp_name']))&&($str==""||$str==" ")&&($this->input->post('meta_id')==""||$this->input->post('meta_id')==" ")&&(!$this->input->post('media_id')||$this->input->post('media_id')=="")){
		  $this->form_validation->set_message('check_any_of_three','You must fill one of the following-(Image/Flash,Slider,Content)');	
		  return false;
		}else{
			return true;
		}
	}
	
    function  check_lib_file(){
    	if($this->input->post('media_i_file')&&$this->input->post('media_i_file')!=""){
    		$file_d=pathinfo($this->input->post('media_i_file'));
			if(isset($file_d['extension'])&&$file_d['extension']=="swf"){
				return "";
			}else{
				return $this->input->post('media_id');
			}
    	}else{
    		return $this->input->post('media_id');
    	}
    }
	function create_thumb($file,$width,$height){
		$path_parts = pathinfo($file);
		$tpath=$path_parts['dirname'];
		$target_path = './'.$tpath."/";
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image']	= './'.$file;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = "_".$width."X".$height;
		$config['width']	= $width;
		$config['height']	= $height;
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize())
		{
		   echo $this->image_lib->display_errors();
		    return null;
		}else{
			echo $this->image_lib->display_errors();
			return "_".$width."X".$height;
		}
		
		
	}
	function upload_image($file,$folder,$a_types){
		
		$this->load->library('upload');
		if(isset($_FILES[$file])&&file_exists($_FILES[$file]['tmp_name'])&&is_uploaded_file($_FILES[$file]['tmp_name'])){
			
			if (!file_exists('./uploads/'.$folder)) {
			    mkdir('./uploads/'.$folder, 0777, true);
			}
			
			$config['upload_path']="./uploads/".$folder;
			$config['allowed_types']=$a_types;
			$config['max_size']=$this->file_size_g;
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
	
    function settings($id=0){
    	
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
    	$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[1];
		$where=array('a.id'=>$id);
		$result['result']=$this->dashboard_model->get_f_contents($parm[0],$where);
	    if(empty($result['result'])){
		    redirect('admin/'.$mode.'/'.$meta_mode);
		}
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/products/settings',$result);
		$this->load->view('admin/includes/footer');
		
		
		
    }
	/*function update_details(){
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('publisher','Publisher','trim|xss_clean|required');
		$this->form_validation->set_rules('isbn_10','ISBN 10','trim|xss_clean');
		$this->form_validation->set_rules('isbn_13','ISBN 13','trim|xss_clean');
		$this->form_validation->set_rules('pages','pages','trim|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('pub_date','Year Of Publication','trim|xss_clean');
		$this->form_validation->set_rules('binding','Binding','trim|xss_clean');
		$this->form_validation->set_rules('width','Width','trim|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('height','Height','trim|xss_clean|is_natural_no_zero');
		if($this->form_validation->run()==TRUE){
			$where=array('id'=>$this->input->post('id'));
			$result=$this->dashboard_model->get_de_contents($this->input->post('mode'),$where);
			if(!empty($result)){
				  $p_data=$this->input->post();
				  if(isset($p_data['rurl']))unset($p_data['rurl']);
				  if(isset($p_data['mode']))unset($p_data['mode']);
				  if(isset($p_data['id']))unset($p_data['id']);
				  $where=array('b_id'=>$this->input->post('id'));
				  $p_data['b_id']=$this->input->post('id');
				  //$this->dashboard_model->save_or_update_contents('books_details',$p_data,$where);
				  $this->session->set_flashdata('success','details');
				  if($this->input->post('rurl')){
					 redirect($this->input->post('rurl')."#boo_det_ls");
				  }
				  redirect('admin/watches/products');
				
			}else{
				
				redirect('admin/watches/products');
			}
		
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			if($this->input->post('rurl')){
				redirect($this->input->post('rurl')."#boo_det_ls");
			}
			redirect('admin/watches/products');
		}	
		
	}
    function update_author(){
    	$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('auther_name[]','Author Name','trim|xss_clean|required');
		$this->form_validation->set_rules('auther_details[]','Author Details','trim|xss_clean');
		if($this->form_validation->run()==TRUE){
			$where=array('id'=>$this->input->post('id'));
			$result=$this->dashboard_model->get_de_contents($this->input->post('mode'),$where);
			if(!empty($result)){
				
				  
				  $p_data=$this->input->post();
				  if(isset($p_data['rurl']))unset($p_data['rurl']);
				  if(isset($p_data['mode']))unset($p_data['mode']);
				  if(isset($p_data['id']))unset($p_data['id']);
				  $author=$this->input->post('auther_name');
				  $author_details=$this->input->post('auther_details');
				  $posts_id=$this->input->post('posts_id');
				  $batch_id=array();
				  for($i=0; $i <count($author) ; $i++) {
				  	  $auth_det=(isset($author_details[$i]))?$author_details[$i]:"";
				  	  if(!empty($author[$i])&&!isset($posts_id[$i])){
				  	  	$id=$this->dashboard_model->save_get_id('posts',array('mode'=>'author','name'=>$author[$i],'meta_content'=>$auth_det));
						array_push($batch_id,$id);
				  	  }else{
				  	  	$this->dashboard_model->update_contents('posts',array('name'=>$author[$i],'meta_content'=>$auth_det),array('id'=>$posts_id[$i]));
				  	  	array_push($batch_id,$posts_id[$i]);
				  	  } 
					  
				  }
				  if(!empty($batch_id)){
				    $this->dashboard_model->save_or_update_contents('books_details',array('b_id'=>$this->input->post('id'),'author'=>implode(',',$batch_id)),array('b_id'=>$this->input->post('id')));
				  }
				  $this->session->set_flashdata('success','author');
				  if($this->input->post('rurl')){
							redirect($this->input->post('rurl')."#auth_or");
				  }
				  redirect('admin/bodhitreebooks/products');
				  
				
			}else{
				
				redirect('admin/bodhitreebooks/products');
			}
		
		}else{
			
			$this->session->set_flashdata('error','author');
			$this->session->set_flashdata('details',validation_errors());
			if($this->input->post('rurl')){
				redirect($this->input->post('rurl')."#auth_or");
			}
			redirect('admin/bodhitreebooks/products');
		}
		
    }*/
	function update_p_img(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    	$this->form_validation->set_rules('id','Product Id','trim|required|xss_clean');
				
				if($this->form_validation->run()==TRUE){
					$par=$this->uri->rsegment_array();
		            $parm=array_slice($par,2);
					$where=array('id'=>$this->input->post('id'));
					$result=$this->dashboard_model->get_de_contents($parm[0],$where);
					if(!empty($result)){
						  $file=$this->upload_image('file',$parm[1],"jpg|jpeg|png|gif|JPEG");
						  if($file=="error"){
								$data['error']=$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
							    $data['status']="203";
						   }elseif($file=="no-file"){
						        
								$data['error']='<p class="error-message"><i class="fa fa-close"></i>Must choose a file to upload.</p>';
							    $data['status']="203";
						   
						   }else{
						   			 	
						   			 $file_ar=array();
									 if(!empty($result[0]['meta_files'])){
									 	$file_ar=json_decode($result[0]['meta_files'],TRUE);
									 }
									 array_push($file_ar,$file);
						   			 
									 $file_ar_jstr=json_encode($file_ar);
									 $dat=array('meta_files'=>$file_ar_jstr);
					                 $this->dashboard_model->update_contents($parm[0],$dat,$where);
						   		     $data['status']="202";
									 $data['result']=$file;
						   	
						   }
					}else{
						
						$data['status']="204";
					    $data['error']='<p class="error-message"><i class="fa fa-close"></i>Something went wrong. Please try again.</p>';
						
					}
					
				}else{
					$data['status']="203";
					$data['error']=validation_errors();
				}			
		        $this->output->set_content_type('application/json')->set_output(json_encode($data));	
		
		}else{
			redirect('admin/dashboard');
		}
	}
    function delete_p_img(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    	$this->form_validation->set_rules('id','Product Id','trim|required|xss_clean');
				$this->form_validation->set_rules('order','Order','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$par=$this->uri->rsegment_array();
		            $parm=array_slice($par,2);
					$where=array('id'=>$this->input->post('id'));
					$result=$this->dashboard_model->get_de_contents($parm[0],$where);
					if(!empty($result)){
						  
						   			 	
						   			 $file_ar=array();
									 if(!empty($result[0]['meta_files'])){
									 	$file_ar=json_decode($result[0]['meta_files'],TRUE);
									 }
									 $order=$this->input->post('order');
									 
									 if(isset($file_ar[$order])){
									 	if(file_exists('./'.$file_ar[$order])){
									 		@unlink('./'.$file_ar[$order] );
									 	}	
									 	unset($file_ar[$order]);
									 	if(!empty($file_ar)){
									 		$tmpar=array();
											$i=0;
											foreach ($file_ar as $fkey => $fvalue) {
												$tmpar[$i]=$fvalue;
												$i++;
											}
											$file_ar=$tmpar;
									 	}
										
									 }
						   			
									 $file_ar_jstr=json_encode($file_ar);
									 $dat=array('meta_files'=>$file_ar_jstr);
					                 $this->dashboard_model->update_contents($parm[0],$dat,$where);
						   		     $data['status']="202";
									
						   	
						  
					}else{
						
						$data['status']="204";
					    $data['error']='<p class="error-message"><i class="fa fa-close"></i>Something went wrong. Please try again.</p>';
						
					}
					
				}else{
					$data['status']="203";
					$data['error']=validation_errors();
				}			
		        $this->output->set_content_type('application/json')->set_output(json_encode($data));	
		
		}else{
			redirect('admin/dashboard');
		}
	}
	/*********************Library**********************************************************************************************/
    function initiate_lib(){
    	            
			
					$this->load->library('pagination');	
					$config['base_url']=base_url()."admin/library/data/";
			        $where=array('mode'=>'media_library');
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=15;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segmant'] = 4;
					$config['anchor_class'] = 'class="ajax_pagination_a "';
					$this->pagination->initialize($config);
			        $result['result_lib']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],0,$where));
					$result['lib_links']=$this->pagination->create_links();
					return $result;	
			
    }
	function get_lib_data(){
		  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
				
				    $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/library/data/";
			        $where=array('mode'=>'media_library');
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=15;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$config['anchor_class'] = 'class="ajax_pagination_a"';
					$this->pagination->initialize($config);
					$result['lib_links']=$this->pagination->create_links();
			        $result['result_lib']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where));
					$result['status']="202";
					$this->output->set_content_type('application/json')->set_output(json_encode($result));
				   
			}else{
					
				
				redirect('admin/dashboard');
			}
		
		
	}
	function get_all_books(){
		
				
					$result=$this->dashboard_model->get_contents(array('bodhitreebooks',"","",array(),array('posts','file','file','id'),array('posts','meta_file','file','id'),array('books_details','author','id','b_id')));	
					$this->output->set_content_type('application/json')->set_output(json_encode($result));
						
		
					
	}
	/*********************End Library**********************************************************************************************/
	



}?>