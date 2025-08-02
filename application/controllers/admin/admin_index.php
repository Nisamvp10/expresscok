<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_index extends CI_Controller 
{
    var $user_info=array();
	var $file_size_g=1024;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/dashboard_model');
		$this->load->helper('form');
		$this->check_user_authentication();
		$this->file_size_g=1024*4;
    }
	function check_user_authentication(){
		$sess_data=$this->session->userdata('session_data');
		
		if($this->session->userdata('session_data')&&isset($sess_data['sess_created'])&&$sess_data['sess_created']==TRUE){
				
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
		$result_l=$this->initiate_lib();
		$where=array('a.mode'=>'slides');
		$result['slides']=$this->dashboard_model->get_f_contents('posts',$where);
		$this->load->view('admin/index',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
	}
	function media_controller(){
		
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		if(!isset($parm[0])&&!isset($parm[1])&&!isset($parms[0])&&!isset($parms[1]))redirect('admin/dashboard');
		$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[1];
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1];
					$where=array();
					if(!empty($parms[1]))$where['mode']=$parms[1];
					if(isset($parms[2]))$where['meta_mode']=$parms[2];
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=18;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					unset($where);
					$where=array();
					if(!empty($parms[1]))$where['a.mode']=$parms[1];
					if(isset($parms[2]))$where['a.meta_mode']=$parms[2];
					$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
                    $view=$parm[1];
					if(isset($parms[2])){ $view=$parm[0]."_".$parm[1];}
		$result_l=$this->initiate_lib();			
		$this->load->view('admin/'.$view,array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
	}
   
    function media_controller_image(){
    	
            $parmss=$this->uri->rsegment_array();
            $parms=array_slice($parmss,2);
            $par=$this->uri->segment_array();
            $parm=array_slice($par,1);
            if(!isset($parm[0])&&!isset($parm[1])&&!isset($parms[0])&&!isset($parms[1]))redirect('admin/dashboard');
            $data['user_info']=$this->user_info;
            $data['active']=$parm[0];
            $data['actived']=$parm[1];
            $this->load->view('admin/includes/header',$data);
                        $this->load->library('pagination');	
                        $config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1];
                        $where=array();
                        if(!empty($parms[1]))$where['mode']=$parms[1];
                        if(isset($parms[2]))$where['meta_mode']=$parms[2];
                        $config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
                        $config['per_page']=18;
                        $config['first_link'] = 'Â« First';
                        $config['last_link'] = 'Last Â»';
                        $config['uri_segment'] = 4; 
                        $this->pagination->initialize($config);
                        unset($where);
                        $where=array();
                        if(!empty($parms[1]))$where['a.mode']=$parms[1];
                        if(isset($parms[2]))$where['a.meta_mode']=$parms[2];
                        $result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
                        if($result['result']!=NULL&&!empty($result['result'])){
                            $result['links']=$this->pagination->create_links();
                        }
                       
            $result_l=$this->initiate_lib();	
			$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>isset($parm[0])?$parm[0]:""));		
            $this->load->view('admin/gallery_all',array_merge($result,$result_l));
            $this->load->view('admin/includes/footer');
    }
    
    function media_save(){
    	$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
    	$this->form_validation->set_rules('name','Name','trim|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file',$parms[0],"jpg|jpeg|png|gif");
			$media_id=$this->input->post('media_id');
			$video_id=$this->input->post('vurl');
			$data=array();
			$data_m=array();
			if($file=="no-file"&&empty($media_id)){
				if(!empty($video_id)){
                    /*
					if(!$this->valid_url($video_id)){
						$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>The Video Url must be a valid URL.</p>');
					    $f=$this->uri->uri_string();
				        redirect(dirname($f));
					}
					$data=array('mode'=>$parms[1],'meta_mode'=>(isset($parms[2]))?$parms[2]:$parms[1],'name'=>$this->input->post('name'),'content'=>$this->input->post('content'),'meta_content'=>$video_id);
					$this->dashboard_model->save_contents('posts',$data,$data_m,array('posts','file'));
				    $this->session->set_flashdata('success',TRUE);
					$f=$this->uri->uri_string();
			        redirect(dirname($f));*/
                    $this->session->set_flashdata('error','no-file');
				    $f=$this->uri->uri_string();
			        redirect(dirname($f));
				}else{
					$this->session->set_flashdata('error','no-file');
				    $f=$this->uri->uri_string();
			        redirect(dirname($f));
				
				}
				
			}elseif($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->uri->uri_string();
		        redirect(dirname($f));
			}else{
				
				if(($file=="error"||$file=="no-file")&&!empty($media_id)){
					
					/*
					if(!empty($video_id)){
						$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Both image and video for a single slide is not allowed.</p>');
						$f=$this->uri->uri_string();
						redirect(dirname($f));
					}*/
					
					
					$data=array('mode'=>$parms[1],'meta_mode'=>(isset($parms[2]))?$parms[2]:$parms[1],'name'=>$this->input->post('name'),'meta_content'=>prep_url($video_id),'content'=>$this->input->post('content'),'file'=>$media_id);
				
				}else{
                    /*
					if(!empty($video_id)){
						$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Both image and video for a single slide is not allowed.</p>');
					    $f=$this->uri->uri_string();
				        redirect(dirname($f));
					}*/

					$data=array('mode'=>$parms[1],'meta_mode'=>(isset($parms[2]))?$parms[2]:$parms[1],'name'=>$this->input->post('name'),'meta_content'=>prep_url($video_id),'content'=>$this->input->post('content'));
				    $data_m=array('mode'=>$parms[0],'file'=>$file);
				
				}
				
				$this->dashboard_model->save_contents('posts',$data,$data_m,array('posts','file'));
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
			}
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$f=$this->uri->uri_string();
		    redirect(dirname($f));
		}
		
		
    }
    function media_image_save(){
    	$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|xss_clean');
		$this->form_validation->set_rules('category','Category','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file',$parms[0],"jpg|jpeg|png|gif");
			$media_id=$this->input->post('media_id');
			if($file=="no-file"&&empty($media_id)){
				$this->session->set_flashdata('error','no-file');
			    $f=$this->uri->uri_string();
		        redirect(dirname($f));
			}elseif($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->uri->uri_string();
		        redirect(dirname($f));
			}else{
				$data=array();
				$data_m=array();
				if(($file=="error"||$file=="no-file")&&!empty($media_id)){
					$data=array('mode'=>$parms[1],'meta_mode'=>(isset($parms[2]))?$parms[2]:$parms[1],'name'=>$this->input->post('name'),'meta_id'=>$this->input->post('category'),'file'=>$media_id);
				}else{
					
					$data=array('mode'=>$parms[1],'meta_mode'=>(isset($parms[2]))?$parms[2]:$parms[1],'name'=>$this->input->post('name'),'meta_id'=>$this->input->post('category'));
				    $data_m=array('mode'=>$parms[0],'file'=>$file);
				
				}
				
				$this->dashboard_model->save_contents('posts',$data,$data_m,array('posts','file'));
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
			}
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->uri->uri_string();
		    redirect(dirname($f));
		}
		
		
    }
    function edit_media(){
		
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[1];
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1];
					$where=array();
					if(!empty($parms[1]))$where['mode']=$parms[1];
					if(isset($parms[2]))$where['meta_mode']=$parms[2];
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=18;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					unset($where);
					$where=array();
					if(!empty($parms[1]))$where['a.mode']=$parms[1];
					if(isset($parms[2]))$where['a.meta_mode']=$parms[2];
					$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
					unset($where);
					$where['a.id']=$this->uri->segment(5,0);
		$result['result_i']=$this->dashboard_model->get_contents_by_id_g(array('posts',$where,array('posts','file','file','id')));
		if($result['result_i']==NULL&&empty($result['result_i'])){
			redirect("admin/".$parm[0]."/".$parm[1]);
		}
		
		$view=$parm[2].'_'.$parm[1];
		if(isset($parms[2])){ $view=$parm[2].'_'.$parm[0]."_".$parm[1];}
		$result_l=$this->initiate_lib();		
		$this->load->view('admin/'.$view,array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
    }
    function edit_media_image(){
		
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[1];
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1];
					$where=array();
					if(!empty($parms[1]))$where['mode']=$parms[1];
					if(isset($parms[2]))$where['meta_mode']=$parms[2];
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=18;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					unset($where);
					$where=array();
					if(!empty($parms[1]))$where['a.mode']=$parms[1];
					if(isset($parms[2]))$where['a.meta_mode']=$parms[2];
					$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
					unset($where);
					$where['a.id']=$this->uri->segment(5,0);
		$result['result_i']=$this->dashboard_model->get_contents_by_id_g(array('posts',$where,array('posts','file','file','id')));
		
		if($result['result_i']==NULL&&empty($result['result_i'])){
			redirect("admin/".$parm[0]."/".$parm[1]);
		}
		$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>isset($parm[0])?$parm[0]:""));
		$result_l=$this->initiate_lib();		
		$this->load->view('admin/edit_gallery_all',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
    }
	function update_media(){
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
    	$this->form_validation->set_rules('name','Name','trim|xss_clean');
		$this->form_validation->set_rules('e_file','Existing File','trim|xss_clean');
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file',$parms[0],"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->uri->uri_string();
		        redirect(dirname($f)."/edit/".$this->input->post('id'));
			}else{
				$media_id=$this->input->post('media_id');
				$video_id=prep_url($this->input->post('vurl'));
				if($file=="error"||$file=="no-file"){
					
					if(empty($media_id)){
						                            $file=$this->input->post('e_file');
													if(empty($file)){
														$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Image is required.</p>');
														$f=$this->uri->uri_string();
														redirect(dirname($f)."/edit/".$this->input->post('id'));
													}
						        
						/*
						if(!empty($video_id)){
													$file="";
												}else{
													$file=$this->input->post('e_file');
													if(empty($file)){
														$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Either image or video is required.</p>');
														$f=$this->uri->uri_string();
														redirect(dirname($f)."/edit/".$this->input->post('id'));
													}
												}*/
						
					}else{
						/*
						if(!empty($video_id)){
													$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Both image and video for a single slide is not allowed.</p>');
													$f=$this->uri->uri_string();
													redirect(dirname($f)."/edit/".$this->input->post('id'));
													
												}else{
													$file=$media_id;
												}*/
						
						$file=$media_id;
					}	
					
				}else{
					/*
					if(!empty($video_id)){
												$this->session->set_flashdata('error','<p class="error-message"><i class="fa fa-close"></i>Both image and video for a single slide is not allowed.</p>');
												$f=$this->uri->uri_string();
												redirect(dirname($f)."/edit/".$this->input->post('id'));
												
										}else{
												$data=array('mode'=>'media_library','file'=>$file);
												$file=$this->dashboard_model->save_file($data);
										}*/
					
					
					$data=array('mode'=>'media_library','file'=>$file);
					$file=$this->dashboard_model->save_file($data);
				}
                if(empty($video_id))$video_id="";
				$data=array('name'=>$this->input->post('name'),'content'=>$this->input->post('content'),'meta_content'=>prep_url($video_id),'file'=>$file);
				$where=array();
				$where['id']=$this->input->post('id');
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname($f)."/edit/".$where['id']);
			}
		}else{
			
			$this->session->set_flashdata('error','validation');
			$f=$this->uri->uri_string();
		    redirect(dirname($f));
		}
		
		
	}
    function update_media_image(){
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|xss_clean');
		$this->form_validation->set_rules('e_file','Existing File','trim|xss_clean');
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('category','Category','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file',$parms[0],"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->uri->uri_string();
		        redirect(dirname($f)."/edit/".$this->input->post('id'));
			}else{
				$media_id=$this->input->post('media_id');
				if($file=="error"||$file=="no-file"){
					if(empty($media_id)){
						$file=$this->input->post('e_file');
					}else{
						$file=$media_id;
					}	
				}else{
					$data=array('mode'=>'media_library','file'=>$file);
					$file=$this->dashboard_model->save_file($data);
				}
				$data=array('name'=>$this->input->post('name'),'file'=>$file,'meta_id'=>$this->input->post('category'));
				$where=array();
				$where['id']=$this->input->post('id');
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname($f)."/edit/".$where['id']);
			}
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->uri->uri_string();
		    redirect(dirname($f)."/edit/".$this->input->post('id'));
		}
		
		
	}
	
	function delete_post($fld){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				if($this->input->post('id')){
					$this->dashboard_model->delete_content($fld,$this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}
			    $this->output->set_content_type('application/json')->set_output(json_encode($data));	
		}else{
			redirect('admin/user-logout');
		}		
	}
	function post_status($fld){
				
		    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
				$this->form_validation->set_rules('status','status','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$st=array('status'=>$this->input->post('status'));
					$where=array('id'=>$this->input->post('id'));
					$this->dashboard_model->change_status($fld,$where,$st);
					
				}
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
	}
    function post_display(){
				
		    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
				$this->form_validation->set_rules('status','status','trim|required|xss_clean');
				$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
				$this->form_validation->set_rules('redirect','Redirect','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					    $par=$this->uri->rsegment_array();
		                $parm=array_slice($par,2);
						$st=array('display'=>"");
						$where=array('id'=>$this->input->post('id'));
						$re=$this->dashboard_model->get_de_contents('watches',$where);
						if(!empty($re)&&isset($re[0]['display'])){
							$st=array('display'=>$re[0]['display']);
							if(!empty($re[0]['display'])){
							    $display_ar=explode(',',$re[0]['display']);
							}else{
								$display_ar=array();
							}
							if($this->input->post('mode')=="add"){
								if(!in_array($this->input->post('status'),$display_ar)){
									if(!empty($display_ar)){
										$st=array('display'=>$re[0]['display'].",".$this->input->post('status'));
									}else{
										$st=array('display'=>$this->input->post('status'));
									}
								}
							}else{
								if(($key = array_search($this->input->post('status'),$display_ar)) !== false) {
								    array_splice($display_ar,$key,1);	
									$st=array('display'=>implode(',',$display_ar));
								}
							}
							$this->dashboard_model->change_status($parm[0],$where,$st);
						}else{
							$f=$this->uri->uri_string();
		                    redirect(dirname($f));
						}
						
				}else{
					$f=$this->uri->uri_string();
		            redirect(dirname($f));
				}
				redirect($this->input->post('redirect'));
	}
	function customize_status($mode){
		        $this->form_validation->set_rules('id','Id','trim|required|xss_clean');
				$this->form_validation->set_rules('status','status','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
                /*
					if($this->input->post('status')=="0"){
						$st=array('status'=>1);
					}else{
						$st=array('status'=>1);
					}
					$where=array('mode'=>$mode);	
					$this->dashboard_model->change_status('posts',$where,$st);*/
					unset($where);
					if(isset($st))unset($st);	
					$st=array('status'=>$this->input->post('status'));
					$where=array('id'=>$this->input->post('id'));
					$this->dashboard_model->change_status('posts',$where,$st);
					
					
				}
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
	}
	
	
    function editor_upload(){
    	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP"||strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')){
						
				    $file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
					if($file=="error"){
						$data['error']=array('message'=>strip_tags($this->upload->display_errors()." Permited Size is ".(($this->file_size_g)/1024)."Mb"));
					}else{
						if($file=="error"||$file=="no-file"){
							$data['error']=array('message'=>"Choose a file to upload");
						}else{
							$data=array('mode'=>'media_library','file'=>$file);
							$id=$this->dashboard_model->save_file($data);
							$u_data=$this->upload->data();
							$data['upload']=array('links'=>array('original'=>base_url($file)),'image'=>array('width'=>$u_data['image_width'],'height'=>$u_data['image_height']));
						    
						}
						
						
					}
			 
		
		            $this->output->set_content_type('application/json')->set_output(json_encode($data));
					
		}else{
			  
			redirect('admin/user-logout');
		}
    }
	function sliders(){
		
		$data['user_info']=$this->user_info;
		$data['active']='slider-settings';
		$data['actived']='sliders';
		$this->load->view('admin/includes/header',$data);
		$where=array('a.mode'=>'slides');
		$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
		unset($where);
		
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/slider-settings/sliders/";
					$where=array('mode'=>'slider');
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=10;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					$result['slider_result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where));
					if($result['slider_result']!=NULL&&!empty($result['slider_result'])){
						$result['links']=$this->pagination->create_links();
					}
		$this->load->view('admin/sliders',$result);
		$this->load->view('admin/includes/footer');
		
	}
	function edit_slider(){
		$this->form_validation->set_rules('id','Slider Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
				$id=$this->input->post('id');	
				$data['user_info']=$this->user_info;
				$data['active']='slider-settings';
		        $data['actived']='sliders';
				$this->load->view('admin/includes/header',$data);
				$where=array('a.mode'=>'slides');
				$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
				unset($where);
				$where=array('a.id'=>$id,'a.mode'=>'slider');
				$result['result_id']=$this->dashboard_model->get_f_contents('posts',$where);
				unset($where);
				$result['slides_result']=$this->dashboard_model->get_find_in_set_contents('posts',$id,'content','posts');
				$this->load->view('admin/edit_sliders',$result);
				$this->load->view('admin/includes/footer');
		}else{
			$iid=$this->session->flashdata('slider_id');
			if($this->session->flashdata('slider_id')&&!empty($iid)&&$this->session->flashdata('slider_id')!=" "){
				$id=trim($this->session->flashdata('slider_id'));	
				$data['user_info']=$this->user_info;
				$data['active']='slider-settings';
		        $data['actived']='sliders';
				$this->load->view('admin/includes/header',$data);
				$where=array('a.mode'=>'slides');
				$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
				unset($where);
				$where=array('a.id'=>$id,'a.mode'=>'slider');
				$result['result_id']=$this->dashboard_model->get_f_contents('posts',$where);
				unset($where);
				$result['slides_result']=$this->dashboard_model->get_find_in_set_contents('posts',$id,'content','posts');
				$this->load->view('admin/edit_sliders',$result);
				$this->load->view('admin/includes/footer');
				
			}else{
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
			}
			  
			
		}
		
	}
	function save_sliders(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Slider Name','trim|required|xss_clean');
		$this->form_validation->set_rules('sid[]','Slider Image','required|xss_clean');
		if($this->form_validation->run()==TRUE){
			    $sl_id=$this->input->post('sid');
				$slid_str=implode("##", $sl_id);
				$data=array('mode'=>'slider','meta_mode'=>"",'name'=>$this->input->post('name'),'content'=>$slid_str);
				$this->dashboard_model->save_contents('posts',$data);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
		}else{
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('validation',validation_errors());
			$f=$this->uri->uri_string();
		    redirect(dirname($f));
		}
	}
	function update_slider(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Slider Name','trim|required|xss_clean');
		$this->form_validation->set_rules('id','Slider Id','trim|required|xss_clean');
		$this->form_validation->set_rules('sid[]','Slider Image','required|xss_clean');
		if($this->form_validation->run()==TRUE){
			    $sl_id=$this->input->post('sid');
				$slid_str=implode("##", $sl_id);
				$data=array('name'=>$this->input->post('name'),'content'=>$slid_str);
				$where=array('id'=>$this->input->post('id'));
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect(dirname(dirname($f)));
		}else{
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('validation',validation_errors());
			$this->session->set_flashdata('slider_id',$this->input->post('id'));
			$f=$this->uri->uri_string();
		    redirect(dirname($f));
		}
		
		
	}
	function home_bulider_create(){
		
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$data['user_info']=$this->user_info;
		$data['active']=$parms[0];
		$data['actived']=$parms[1];
		$data['mode']=$parms[2];
		$this->load->view('admin/includes/header',$data);
		$where=array('mode'=>'slider');
		$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
		unset($where);
		$where=array('mode'=>$parms[2]);
		$result['result']=$this->dashboard_model->get_de_contents_t('posts',$where,'ASC','meta_mode');
		if($parms[0]=="magazine"){
			$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>$parms[0]));
		}
		$result_l=$this->initiate_lib();
		$this->load->view('admin/create_tiles',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
		
		
	}
	function save_home_bulider(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>','</p>');
		    	$this->form_validation->set_rules('name','Title','trim|required|xss_clean');
				$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
				$this->form_validation->set_rules('url','Redirect URL','trim|xss_clean|callback_valid_url_custom');
				if($this->form_validation->run()==TRUE){
					
					$meta_file="";
					if($this->input->post('bgcolor')){
						$meta_file=$this->input->post('bgcolor');
					}
					if($this->input->post('fcolor')){
						$meta_file=$meta_file."$$".$this->input->post('fcolor');
					}	
					if($this->input->post('op_mode')&&$this->input->post('op_mode')=="edit"&&$this->input->post('op_id')&&$this->input->post('op_id')!=""&&$this->input->post('op_id')!="undefined"){
						$id=trim($this->input->post('op_id'));
						if(!empty($id)){
									
							$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
							if($file=="error"){
								$data['eeror']=$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>');
							    $data['status']="203";
							}else{
							     
								    $media_id=$this->input->post('media_id');
									if($file=="error"||$file=="no-file"){
										if(empty($media_id)){
											$file=$this->input->post('e_file');
										}else{
											$file=$media_id;
										}	
									}else{
										$data=array('mode'=>'media_library','file'=>$file);
										$file=$this->dashboard_model->save_file($data);
									}	
								    
									$content=$this->input->post('description');	
									if($this->input->post('description')!=""){
										require_once APPPATH.'libraries/filter_library/HTMLPurifier.auto.php';
										$config = HTMLPurifier_Config::createDefault();
										$purifier = new HTMLPurifier($config);
										$content= $purifier->purify($this->input->post('description'));
									}	
									$dat=array('name'=>$this->input->post('name'),'content'=>$content,'file'=>$file,'meta_file'=>$meta_file,'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('url'));
								    $where=array('id'=>$id,'mode'=>$this->input->post('mode'));
						            $this->dashboard_model->update_contents('posts',$dat,$where);
									$data['status']="202";
							


							}
						}else{
							$data['status']="203";
						}
						
					}else{
						
						$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif|swf");
						if($file=="error"){
							$data['eeror']=$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>');
						    $data['status']="203";
						}else{
						     
							    $media_id=$this->input->post('media_id');
								if($file=="error"||$file=="no-file"){
									if(empty($media_id)){
										$file="";
									}else{
										$file=$media_id;
									}	
								}else{
									$data=array('mode'=>'media_library','file'=>$file);
									$file=$this->dashboard_model->save_file($data);
								}
								
							    $dat=array('mode'=>$this->input->post('mode'),'meta_mode'=>'none','file'=>$file,'meta_file'=>$meta_file,'name'=>$this->input->post('name'),'content'=>$this->input->post('description'),'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('url'));
								$this->dashboard_model->save_contents('posts',$dat);
								$data['status']="202";
						
						}
						
				
						
					}
					
				
				}else{
						
					$data['eeror']=validation_errors();
					$data['status']="203";
				}	
				
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}	
		
		
	}
    function valid_url_custom($url)
	{
	   	
	   
	    if ($url!="" && filter_var($url, FILTER_VALIDATE_URL) === FALSE)
	    {
	       	if($this->input->post('mode')&&$this->input->post('mode')=="magazine_builder"){
			  if(is_numeric($url))return TRUE;			   
			}
			
	       	$this->form_validation->set_message('valid_url_custom','The %s must be a valid Url');
	        return FALSE;
			
	    }else{
	    	return TRUE;
	    }
	
	    
	}
    function update_home_bulider_order(){
    	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    	$this->form_validation->set_rules('id','ID','trim|required|xss_clean');
				$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
				if($this->form_validation->run()==TRUE){
					$order_str=$this->input->post('id');
					$order=explode(',',$order_str);	
					if(count($order)>0){
						for($i=0;$i<count($order);$i++){
							
							$id=array('id'=>$order[$i],'mode'=>$this->input->post('mode'));
							$dat=array('meta_mode'=>($i+1));
					        $this->dashboard_model->update_contents('posts',$dat,$id);
							
						}
						
					}	
					$data['status']="202";
				}else{
						
					$data['eeror']=validation_errors();
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
	function home_bulider(){
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$data['user_info']=$this->user_info;
		$data['active']=$parms[0];
		$data['actived']=$parms[1];
		$data['mode']=$parms[2];
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/$parms[0]/tiles/";
					$where=array('mode'=>$parms[2]);
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=8;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					unset($where);
					$where=array('a.mode'=>$parms[2]);
					$order=array('ASC','meta_mode');
					$result['result']=$this->dashboard_model->get_contents_tti(array('posts','posts'),array($config['per_page'],$this->uri->segment(4,0)),$where,$order);
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
		if($parms[0]=="magazine"){
			$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>$parms[0]));
		}				
	    $this->load->view('admin/home_tiles',$result);
		$this->load->view('admin/includes/footer');
	}
	function customize_home($mode){
		
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		
		$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']='customize';
		if($parm[0]=="magazine-customize"){
			$data['header_t']='Customize Magazine Details';
		}
		$data['actived']='customize';
		$this->load->view('admin/includes/header',$data);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1]."/";
					$where=array('mode'=>$mode);
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=8;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
					unset($where);
					$where=array('a.mode'=>$mode);
					$order=array('desc','id');
					$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
					if($result['result']!=NULL&&!empty($result['result'])){
						$result['links']=$this->pagination->create_links();
					}
					unset($where);
					$where=array('mode'=>'slider');
					$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
		$result_l=$this->initiate_lib();			
		$this->load->view('admin/home_customize',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
	}
    function customisation($mode){
    			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
					$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>','</p>');	
					$this->form_validation->set_rules('name','Name','trim|xss_clean');
					$this->form_validation->set_rules('meta_content','Details','trim|xss_clean');
					$this->form_validation->set_rules('content','Description','trim|callback_check_any_of_three');
					$this->form_validation->set_rules('meta_file','Redirect URL','trim|xss_clean|callback_valid_url');
					
					if($this->form_validation->run()==TRUE){
						$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif|swf");
						if($file=="error"){
							$data['error']=$this->upload->display_errors();
						    $data['status']="204";
						}else{
							$content="";
							
							if($this->input->post('content')!=""){
								require_once APPPATH.'libraries/filter_library/HTMLPurifier.auto.php';
								$config = HTMLPurifier_Config::createDefault();
								$purifier = new HTMLPurifier($config);
								$content= $purifier->purify($this->input->post('content'));
							}else{
								$content=$this->input->post('content');
							}
								
							if($this->input->post('op_mode')=="save"){
								if($file=="error"||$file=="no-file"){
								    if($this->input->post('media_id')&&$this->input->post('media_id')!=""&&$this->input->post('media_id')!="undefined"){
										$file=$this->input->post('media_id');
										
									}else{
										$file="";
									} 
									      
									      $data=array('mode'=>$mode,'file'=>$file,'name'=>$this->input->post('name'),'content'=>$content,'meta_id'=>$this->input->post('meta_id')
										              ,'meta_content'=>$this->input->post('meta_content'),'meta_file'=>$this->input->post('meta_file'));
										  $where=array('mode'=>$mode);
										  $st=array('status'=>1);
								          //$this->dashboard_model->change_status('posts',$where,$st);
										  $this->dashboard_model->save_contents('posts',$data);
									
									
									
								}else{
						
										  $data=array('mode'=>$mode,'name'=>$this->input->post('name'),'content'=>$content,'meta_id'=>$this->input->post('meta_id')
										              ,'meta_content'=>$this->input->post('meta_content'),'meta_file'=>$this->input->post('meta_file'));
										  $where=array('mode'=>$mode);
										  $st=array('status'=>1);
								          //$this->dashboard_model->change_status('posts',$where,$st);
										  $this->dashboard_model->save_contents('posts',$data,array('mode'=>'media_library','file'=>$file),array('posts','file'));
							    }		  
						        $data['status']="202";
							  
							}elseif($this->input->post('op_mode')=="edit"){
										
								if($file=="error"||$file=="no-file"){
									if($this->input->post('media_id')&&$this->input->post('media_id')!=""&&$this->input->post('media_id')!="undefined"){
										$file=$this->input->post('media_id');
										
									}elseif($this->input->post('e_file')&&$this->input->post('e_file')!=""&&$this->input->post('e_file')!="undefined"){
										$file=$this->input->post('e_file');
									}else{
										$file="";
									} 	
									
									
								}else{
									$data=array('mode'=>'media_library','file'=>$file);
									$file=$this->dashboard_model->save_file($data);
								}		
								$data=array('mode'=>$mode,'name'=>$this->input->post('name'),'file'=>$file,'content'=>$content,'meta_id'=>$this->input->post('meta_id')
							              ,'meta_content'=>$this->input->post('meta_content'),'meta_file'=>$this->input->post('meta_file'));	
								$this->dashboard_model->update_contents('posts',$data,array('id'=>$this->input->post('op_id')));
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
    function customize_edit($mode){
    	$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		
    	$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
				$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		if($parm[0]=="magazine-customize"){
			$data['header_t']='Customize Magazine Details';
		}
		$data['actived']='customize';
		$this->load->view('admin/includes/header',$data);
				            $this->load->library('pagination');	
							$config['base_url']=base_url()."admin/".$parm[0]."/".$parm[1]."/";
							$where=array('mode'=>$mode);
							$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
							$config['per_page']=8;
							$config['first_link'] = '« First';
							$config['last_link'] = 'Last »';
							$config['uri_segment'] = 4; 
							$this->pagination->initialize($config);
							unset($where);
							$where=array('a.mode'=>$mode);
							$order=array('desc','id');
							$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
							if($result['result']!=NULL&&!empty($result['result'])){
								$result['links']=$this->pagination->create_links();
							}
							unset($where);
							$where=array('a.id'=>$this->input->post('id'));
							$order=array('desc','id');
							$result['result_id']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
							
							unset($where);
							$where=array('mode'=>'slider');
							$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
				$result_l=$this->initiate_lib();			
				$this->load->view('admin/home_customize_edit',array_merge($result,$result_l));
				$this->load->view('admin/includes/footer');
				
		}else{
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
		}
		
    }

    function page_settings(){
		
		$parmss=$this->uri->rsegment_array();
		$parms=array_slice($parmss,2);
		$par=$this->uri->segment_array();
		$parm=array_slice($par,1);
		
		$data['user_info']=$this->user_info;
		$data['active']=$parm[0];
		$data['actived']=$parm[1];
		if(isset($parm[2])){
			$data['activedd']=$parm[2];
		}
		
		$data['mode']=$parms[0];
		$data['meta_mode']=$parms[2];
		
		$data['rurl']=current_url();
		$this->load->view('admin/includes/header',$data);
		$where=array('mode'=>'slider');
		$result['all_slider']=$this->dashboard_model->get_de_contents('posts',$where);
		unset($where);
		$where=array('mode'=>$parms[0],'meta_mode'=>"slider");
		$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
		unset($where);
		$where=array('mode'=>$parms[0],'meta_mode'=>"seo");
		$result['seo_result']=$this->dashboard_model->get_de_contents('seo_settings',$where);
		$result_l=$this->initiate_lib();
		$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>isset($parms[0])?$parms[0]:""));			
		$this->load->view('admin/'.$parms[3]."/".$parms[1],array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
	}
	function save_page_settings(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('slider','Slider','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_mode','Meta Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Rurl','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			
			    $sl_id=$this->input->post('slider');
				$data=array('mode'=>$this->input->post('mode'),'meta_mode'=>$this->input->post('meta_mode'),'meta_id'=>$sl_id);
				$where=array('mode'=>$this->input->post('mode'),'meta_mode'=>$this->input->post('meta_mode'));
				$this->dashboard_model->save_or_update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->uri->uri_string();
		        redirect($this->input->post('rurl'));
				
		}else{
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			redirect($this->input->post('rurl'));
		}
		
		
	}
    function seo_page_settings($mode,$meta_mode,$id=0){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
			$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
			$this->form_validation->set_rules('meta','Meta Tags','trim|callback_check_seo_of_three');
			$this->form_validation->set_rules('h1','Header 1 Title','trim|xss_clean');
			$this->form_validation->set_rules('title','Title','trim|xss_clean');
			if($this->form_validation->run()==TRUE){
				   $content="";
				   if($this->input->post('meta')!=""){
								/*
								require_once APPPATH.'libraries/filter_library/HTMLPurifier.auto.php';
																$config = HTMLPurifier_Config::createDefault();
																$config->set('HTML.AllowedElements', array('meta'));
																$config->set('HTML.AllowedAttributes', array('meta.name','meta.content'));
																$purifier = new HTMLPurifier($config);
																$content= $purifier->purify($this->input->post('meta'));*/
								$content=$this->input->post('meta');
							}else{
								$content=$this->input->post('meta');
							}
				
				  
					$dat=array('mode'=>$mode,'meta_mode'=>$meta_mode,
					            'meta_id'=>$id,
					            'h1'=>$this->input->post('h1'),
					            'meta'=>$content,
					            'post_meta'=>$this->input->post('post_meta'),
					            'title'=>$this->input->post('title'));
								
					if(is_numeric($id)&&!empty($id)){
						
						$where=array('mode'=>$mode,'meta_mode'=>$meta_mode,'meta_id'=>$id);
					}else{
						$where=array('mode'=>$mode,'meta_mode'=>$meta_mode);
					}
					$this->dashboard_model->save_or_update_contents('seo_settings',$dat,$where);
					$data['status']="202";
					
					
			}else{
				
				$data['status']="203";
				$data['error']=validation_errors();
				
			}

            $this->output->set_content_type('application/json')->set_output(json_encode($data));
			
		}else{
			redirect('admin/user-logout');
		}	
		
	}
    function global_seo_settings($mode,$meta_mode,$id=0){
    	$par=$this->uri->segment_array();
		$parm=array_slice($par,2);
    	$data['user_info']=$this->user_info;
		$data['active']=$mode;
		$data['actived']=$meta_mode;
		$data['mode']=$mode;
		$data['meta_mode']=$meta_mode;
		$data['post_meta']=isset($parm[0])?$parm[0]:"";
		$data['meta_id']=($id!=0)?$id:"";
		$this->load->view('admin/includes/header',$data);
		$where=array('mode'=>$mode,'meta_mode'=>$meta_mode,'meta_id'=>$id);
		$result['seo_result']=$this->dashboard_model->get_de_contents('seo_settings',$where);
		if(isset($parm[0])&&!empty($id)){
			unset($where);	
			$where=array('id'=>$id);
		    $result['page_result']=$this->dashboard_model->get_de_contents($parm[0],$where);
			if(empty($result['page_result'])){
				redirect('admin/dashboard');
			}else{
				 
				if(isset($result['page_result'][0]['category'])&&!empty($result['page_result'][0]['category'])&&is_numeric($result['page_result'][0]['category'])){
					unset($where);
					$where=array('id'=>$result['page_result'][0]['category']);
					$result['category_result']=$this->dashboard_model->get_de_contents('posts',$where);
					
				}
			}
		}
		
		$this->load->view('admin/global_seo_settings',$result);
		$this->load->view('admin/includes/footer');
		
    }
	function check_seo_of_three($str){
		
		if(($str==""||$str==" ")&&($this->input->post('title')==""||$this->input->post('title')==" ")&&($this->input->post('h1')==""||$this->input->post('h1')==" ")){
		  $this->form_validation->set_message('check_seo_of_three','You must fill at least one field.');	
		  return false;
		}else{
			return true;
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
		unset($where);
		$where=array('mode'=>"home",'meta_mode'=>"seo");
		$result['seo_result']=$this->dashboard_model->get_de_contents('seo_settings',$where);
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
		
		if((!isset($_FILES['file'])||!file_exists($_FILES['file']['tmp_name'])||!is_uploaded_file($_FILES['file']['tmp_name']))&&($str==""||$str==" ")&&($this->input->post('meta_id')==""||$this->input->post('meta_id')==" ")&&(!$this->input->post('media_id')||$this->input->post('media_id')=="")&&(!$this->input->post('e_file')||$this->input->post('e_file')=="")){
		  $this->form_validation->set_message('check_any_of_three','You must fill one of the following-(Image/Flash,Slider,Content)');	
		  return false;
		}else{
			return true;
		}
	}
	function edit_home_bulider_order(){
		
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			    $parmss=$this->uri->rsegment_array();
				$parms=array_slice($parmss,2);
				$data['user_info']=$this->user_info;
				$data['active']=$parms[0];
				$data['actived']=$parms[1];
				$data['mode']=$parms[2];
				$id=$this->input->post('id');	
				$this->load->view('admin/includes/header',$data);
				$where=array('mode'=>'slider');
				$result['slider_result']=$this->dashboard_model->get_de_contents('posts',$where);
				unset($where);
				$where=array('a.mode'=>$parms[2],'a.id'=>$id);
				$result['result_id']=$this->dashboard_model->get_f_contents('posts',$where,'ASC','a.meta_mode');
				if($parms[0]=="magazine"){
					$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category','meta_mode'=>$parms[0]));
				}
                $result_l=$this->initiate_lib();
		        $this->load->view('admin/edit_tiles',array_merge($result,$result_l));
				$this->load->view('admin/includes/footer');
		}else{
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
		}
		
	}
	function news($mode){
		$data['user_info']=$this->user_info;
		$data['active']="products";
		$data['actived']="news_scroll";
		$this->load->view('admin/includes/header',$data);
		            $par=$this->uri->segment_array();
		            $parm=array_slice($par,1);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/$parm[0]/$parm[1]/";
					$where=array('mode'=>'news_scroll');
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=10;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
		$result['mode']=ucfirst($mode);
		unset($where);
		$where=array('a.mode'=>'news_scroll');
		$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
		if($result['result']!=NULL&&!empty($result['result'])){
			$result['links']=$this->pagination->create_links();
		}
		$result_l=$this->initiate_lib();
		$this->load->view('admin/news',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
	}	
	function edit_news(){
		$this->form_validation->set_rules('id','id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$mode=$this->input->post('mode');
			$data['user_info']=$this->user_info;
			$data['active']=$mode;
			$data['actived']="category";
			$this->load->view('admin/includes/header',$data);
			$where=array('a.id'=>$this->input->post('id'));			
			$result['mode']=ucfirst($mode);
			$result['rurl']=$this->input->post('rurl');
			$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
			
			$result_l=$this->initiate_lib();
			$this->load->view('admin/edit_news',array_merge($result,$result_l));
			$this->load->view('admin/includes/footer');
		}
		
	}
	function save_news(){
	
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('content','Content','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			
				$data=array('mode'=>'news_scroll','content'=>$this->input->post('content'));
				
				$this->dashboard_model->save_contents('posts',$data);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				redirect($f);
			}else{
				redirect('admin/dashboard');
			}
		    
		}
		
	}
	function update_news(){
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('content','Content','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			
			
				
				$data=array();	
				
					$data=array('content'=>$this->input->post('content'),'mode'=>"news_scroll");
					
				
				$where=array('id'=>$this->input->post('id'));
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
						
					redirect("admin/news_scroll/news");
				}else{
					redirect('admin/dashboard');
				}
		 
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
				redirect("admin/category/edit");
			}else{
				redirect('admin/dashboard');
			}
		    
		}

	}
	
	
	
	function category($mode){
		
		$data['user_info']=$this->user_info;
		$data['active']=$mode;
		$data['actived']="category";
		$this->load->view('admin/includes/header',$data);
		            $par=$this->uri->segment_array();
		            $parm=array_slice($par,1);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/$parm[0]/$parm[1]/";
					$where=array('mode'=>'category','meta_mode'=>$mode);
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=10;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
		$result['mode']=ucfirst($mode);
		unset($where);
		$where=array('a.mode'=>'category','a.meta_mode'=>$mode);
		$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
		if($result['result']!=NULL&&!empty($result['result'])){
			$result['links']=$this->pagination->create_links();
		}
        if($mode=="products"){
				    $result['slider_result']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'slider'));
		}
		$result_l=$this->initiate_lib();
		$this->load->view('admin/category',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
		
	}
	
    function sub_category($mode){
		
		$data['user_info']=$this->user_info;
		$data['active']=$mode;
		//echo $mode;
		$data['actived']="subcategory";
		$this->load->view('admin/includes/header',$data);
		            $par=$this->uri->segment_array();
		            $parm=array_slice($par,1);
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/$parm[0]/$parm[1]/";
					$where=array('mode'=>'subcategory','meta_mode'=>$mode);
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=10;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
		$result['mode']=ucfirst($mode);
		unset($where);
		$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category'));
		//echo '<pre>';print_r($result['category']);echo '</pre>';exit();
		$where=array('a.mode'=>'subcategory','a.meta_mode'=>$mode);
		
		$result['result']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
		$result['subcategory']=$this->dashboard_model->get_contents(array('posts',$config['per_page'],$this->uri->segment(4,0),$where,array('posts','file','file','id')));
		//echo '<pre>';print_r($result['result']);echo '</pre>';exit();
		if($result['result']!=NULL&&!empty($result['result'])){
			$result['links']=$this->pagination->create_links();
		}
		
		$result_l=$this->initiate_lib();
		$this->load->view('admin/sub_category',array_merge($result,$result_l));
		$this->load->view('admin/includes/footer');
		
		
	}	
    function suggestion(){
		
		$data['user_info']=$this->user_info;
		$data['active']="suggestion";
		$data['actived']="suggestion";
		$this->load->view('admin/includes/header',$data);
		            $par=$this->uri->segment_array();
		            $this->load->library('pagination');	
					$config['base_url']=base_url()."admin/bothitreebooks/suggestion/";
					$where=array('mode'=>'suggestion');
					$config['total_rows']=count($this->dashboard_model->get_rows_count(array('posts',$where)));
					$config['per_page']=10;
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['uri_segment'] = 4; 
					$this->pagination->initialize($config);
		$where=array('a.mode'=>'suggestion');
		$result['result']=$this->dashboard_model->get_sug_contents($where,$config['per_page'],$this->uri->segment(4,0));
		if($result['result']!=NULL&&!empty($result['result'])){
			$result['links']=$this->pagination->create_links();
		}
		$result['author_list']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'author'));
		$result['books']=$this->dashboard_model->get_de_contents('watches',array());
		$this->load->view('admin/suggestion',$result);
		$this->load->view('admin/includes/footer');
		
		
	}
    function edit_suggestion(){
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
				$data['user_info']=$this->user_info;
				$data['active']="suggestion";
				$data['actived']="suggestion";
				$this->load->view('admin/includes/header',$data);      
				$where=array('id'=>$this->input->post('id'));
				$result['result_id']=$this->dashboard_model->get_de_contents('posts',$where);
				$result['author_list']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'author'));
				$result['books']=$this->dashboard_model->get_de_contents('watches',array());
				$this->load->view('admin/edit_suggestion',$result);
				$this->load->view('admin/includes/footer');
		}else{
				$f=$this->uri->uri_string();
		        redirect(dirname($f));
		}
		
	}
	function save_category(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|required|xss_clean|callback_category_uniqness');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_id','Slider','trim|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
			}else{
				$data_m=array();
				$data=array();	
				if($file=="no-file"||$file=="error"){
					if($this->input->post('media_id')&&$this->input->post('media_id')!=""){
						$file=$this->check_lib_file();
						
					}else{
						$file="";
					} 	
					$meta_file="";
					if($this->input->post('mode')=="directory"){
						
						$img_f=$this->dashboard_model->get_de_contents('posts',array('id'=>$file));
						if(isset($img_f[0])&&file_exists("./".$img_f[0]['file'])){
							$meta_file_r=$this->manipulate_new_file("./".$img_f[0]['file']);
							
							if($meta_file_r=="failed"){
								$meta_file=$file;
							}else{
								$meta_file=$meta_file_r;
							}
						}
						
					}
					$data=array('mode'=>'category','meta_mode'=>$this->input->post('mode'),'meta_id'=>$this->input->post('meta_id'),'name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),
					            'file'=>$file,'meta_file'=>$meta_file,'meta_content'=>$this->input->post('meta_content'));
					
				}else{
						
					$file_id=$this->dashboard_model->save_file(array('mode'=>"media_library",'file'=>$file));
					$meta_file="";
					if($this->input->post('mode')=="directory"){
					    $meta_file_r=$this->manipulate_new_file("./".$file);
						if($meta_file_r=="failed"||empty($meta_file_r)){
									$meta_file=$file_id;
						}else{
									$meta_file=$meta_file_r;
						}
					
					}	
					
					
					$data=array('mode'=>'category','meta_mode'=>$this->input->post('mode'),'meta_id'=>$this->input->post('meta_id'),'name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),
					            'file'=>$file_id,'meta_file'=>$meta_file,'meta_content'=>$this->input->post('meta_content'));
				}
				
				
				$this->dashboard_model->save_contents('posts',$data);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
			}
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				redirect($f);
			}else{
				redirect('admin/dashboard');
			}
		    
		}
		
		
		
		
		
	}
	function category_uniqness($str){
		
		$where=array('id != '=>$this->input->post('id'),'mode'=>'category','meta_mode'=>$this->input->post('mode'),'content'=>url_title(strtolower($str)));
		$result=$this->dashboard_model->get_de_contents('posts',$where);
		if(!empty($result)){
			$this->form_validation->set_message('category_uniqness','The category is already exist. Please choose different name.');
			return FALSE;
		}
		return TRUE;
	}
    function save_subcategory(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_id','Meta Id','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
			}else{
				$data_m=array();
				$data=array();	
				if($file=="no-file"||$file=="error"){
					if($this->input->post('media_id')&&$this->input->post('media_id')!=""){
						$file=$this->check_lib_file();
						
					}else{
						$file="";
					} 	
					
					
					$data=array('mode'=>'subcategory','meta_id'=>$this->input->post('meta_id'),'meta_mode'=>$this->input->post('meta_mode'),'name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$file);
				}else{
					$file_id=$this->dashboard_model->save_file(array('mode'=>"media_library",'file'=>$file));
					$data=array('mode'=>'subcategory','meta_id'=>$this->input->post('meta_id'),'meta_mode'=>$this->input->post('meta_mode'),'name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$file_id);
				}
				
				
				$this->dashboard_model->save_contents('posts',$data);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
			}
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				redirect($f);
			}else{
				redirect('admin/dashboard');
			}
		    
		}
		
	}
	function manipulate_new_file($file){
		
			    $path_ext=pathinfo($file,PATHINFO_EXTENSION);
				if($path_ext=="png"||$path_ext==".png"){
					$path_base=pathinfo($file,PATHINFO_BASENAME);
		            if(!file_exists("./uploads/custom/".$path_base)){ 
							                            $file_to_m="./uploads/custom/".$path_base;
							                            $im = imagecreatefrompng($file);
														imagealphablending($im, false);
														for ($x = imagesx($im); $x--;) {
															for ($y = imagesy($im); $y--;) {
																$rgb = imagecolorat($im, $x,$y);
																$c = imagecolorsforindex($im,$rgb);
																if ($c['red'] < 40 && $c['green'] < 40 && $c['blue'] < 40) {
																	$colorB = imagecolorallocatealpha($im, 255, 255, 255, $c['alpha']);
																	imagesetpixel($im, $x, $y, $colorB);
																}
															}
														}
														imageAlphaBlending($im, true);
														imageSaveAlpha($im, true);
														imagepng($im,$file_to_m);
														imagedestroy($im);
														
														$id=$this->dashboard_model->save_file(array('mode'=>"media_library",'file'=>substr($file_to_m,2)));
							return $id;
							
					     
					}else{
						$img_f=$this->dashboard_model->get_de_contents('posts',array('file'=>"uploads/custom/".$path_base,'mode'=>"media_library"));
						if(isset($img_f[0]['id'])){
							
							return $img_f[0]['id'];
						}else{
							
							return "failed";
						}
					}
					
					
				}else{
					return "failed";
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
	function edit_category(){
		$this->form_validation->set_rules('id','id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$mode=$this->input->post('mode');
			$data['user_info']=$this->user_info;
			$data['active']=$mode;
			$data['actived']="category";
			$this->load->view('admin/includes/header',$data);
			$where=array('a.id'=>$this->input->post('id'));			
			$result['mode']=ucfirst($mode);
			$result['rurl']=$this->input->post('rurl');
			$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
			if($mode=="watches"){
				    $result['slider_result']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'slider'));
		    }
			$result_l=$this->initiate_lib();
			$this->load->view('admin/edit_category',array_merge($result,$result_l));
			$this->load->view('admin/includes/footer');
		}else{
			$id_a=$this->session->flashdata('meta_content');
			if(!empty($id_a)){
				
				$mode=$id_a[2];
				$data['user_info']=$this->user_info;
				$data['active']=$mode;
				$data['actived']="category";
				$this->load->view('admin/includes/header',$data);
				$where=array('a.id'=>$id_a[0]);			
				$result['mode']=ucfirst($mode);
				$result['rurl']=$id_a[1];
				$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
				if($mode=="watches"){
				    $result['slider_result']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'slider'));
		        }
				$result_l=$this->initiate_lib();
				$this->load->view('admin/edit_category',array_merge($result,$result_l));
				$this->load->view('admin/includes/footer');
				
			}else{
				
				$f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
				
			}
			
		    
		}
		
	}
    function edit_subcategory(){
		$this->form_validation->set_rules('id','id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$mode=$this->input->post('mode');
			$data['user_info']=$this->user_info;
			$data['active']=$mode;
			$data['actived']="category";
			$this->load->view('admin/includes/header',$data);
			$where=array('a.id'=>$this->input->post('id'));			
			$result['mode']=ucfirst($mode);
			$result['rurl']=$this->input->post('rurl');
			$result['category']=$this->dashboard_model->get_de_contents('posts',array('mode'=>'category'));
			$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
			$result_l=$this->initiate_lib();
			$this->load->view('admin/edit_subcategory',array_merge($result,$result_l));
			$this->load->view('admin/includes/footer');
		}else{
			$id_a=$this->session->flashdata('meta_scontent');
			if(!empty($id_a)){
				
				$mode=$id_a[2];
				$data['user_info']=$this->user_info;
				$data['active']=$mode;
				$data['actived']="category";
				$this->load->view('admin/includes/header',$data);
				$where=array('a.id'=>$id_a[0]);			
				$result['mode']=ucfirst($mode);
				$result['rurl']=$id_a[1];
				$result['result']=$this->dashboard_model->get_f_contents('posts',$where);
				$result_l=$this->initiate_lib();
				$this->load->view('admin/edit_subcategory',array_merge($result,$result_l));
				$this->load->view('admin/includes/footer');
				
			}else{
				
				$f=$this->input->post('rurl');
				if(!empty($f)){
					redirect($f);
				}else{
					redirect('admin/dashboard');
				}
				
			}
			
		    
		}
		
	}
	function update_category(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|required|xss_clean|callback_category_uniqness');
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_id','Slider','trim|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->input->post('rurl');
				if(!empty($f)){
						
					$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
					redirect("admin/category/edit");
				}else{
					redirect('admin/dashboard');
				}
			}else{
				
				$data=array();	
				if($file=="no-file"||$file=="error"){
					if($this->input->post('media_id')&&$this->input->post('media_id')!=""){
						$file=$this->check_lib_file();
						
						$meta_file="";
						if($this->input->post('mode')=="directory"){
							
							$img_f=$this->dashboard_model->get_de_contents('posts',array('id'=>$file));
							if(isset($img_f[0])&&file_exists("./".$img_f[0]['file'])){
								$meta_file_r=$this->manipulate_new_file("./".$img_f[0]['file']);
								
								if($meta_file_r=="failed"){
									$meta_file=$file;
								}else{
									$meta_file=$meta_file_r;
								}
							}
						}
                        if($meta_file==""||$meta_file=="failed"){
						
						$data=array('name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$file,'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('meta_content'));
						}else
						$data=array('name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$file,'meta_file'=>$meta_file,'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('meta_content'));	
						
					}
					else{
						$data=array('name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('meta_content'));
					} 	
					
				}else{
					
					$data_m=array('mode'=>'media_library','file'=>$file);
					$id=$this->dashboard_model->save_file($data_m);
					$meta_file="";
					if($this->input->post('mode')=="directory"){
					    $meta_file_r=$this->manipulate_new_file("./".$file);
						if($meta_file_r=="failed"||$meta_file_r==""){
									$meta_file=$id;
						}else{
									$meta_file=$meta_file_r;
						}
					    
					}	
					$data=array('name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$id,'meta_file'=>$file,'meta_id'=>$this->input->post('meta_id'),'meta_content'=>$this->input->post('meta_content'));
					
				}
				$where=array('id'=>$this->input->post('id'));
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
						
					redirect("admin/category/edit");
				}else{
					redirect('admin/dashboard');
				}
		   }
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
				redirect("admin/category/edit");
			}else{
				redirect('admin/dashboard');
			}
		    
		}
	}
    function update_subcategory(){
		
		$this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
    	$this->form_validation->set_rules('name','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
		$this->form_validation->set_rules('rurl','Redirect Url','trim|required|xss_clean');
		$this->form_validation->set_rules('mode','Mode','trim|required|xss_clean');
		if($this->form_validation->run()==TRUE){
			$file=$this->upload_image('file','media_library',"jpg|jpeg|png|gif");
			if($file=="error"){
				$this->session->set_flashdata('error',$this->upload->display_errors('<p class="error-message"><i class="fa fa-close"></i>','</p>'));
				$this->session->set_flashdata('file_error','<p class="error-message"><i class="fa fa-close"></i>Maximum file size is '.(intval($this->file_size_g)/1024).' Mb.</p>');
			    $f=$this->input->post('rurl');
				if(!empty($f)){
						
					$this->session->set_flashdata('meta_scontent',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
					redirect("admin/category/sub-category/edit");
				}else{
					redirect('admin/dashboard');
				}
			}else{
				
				$data=array();	
				if($file=="no-file"||$file=="error"){
					if($this->input->post('media_id')&&$this->input->post('media_id')!=""){
						$file=$this->check_lib_file();
						$data=array('name'=>$this->input->post('name'),'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$file, 'meta_id'=>$this->input->post('meta_id'));
					}
					else{
						$data=array('name'=>$this->input->post('name'),'meta_id'=>$this->input->post('meta_id'),'content'=>url_title(strtolower($this->input->post('name'))));
					} 	
					
				}else{
					
					$data_m=array('mode'=>'media_library','file'=>$file);
					$id=$this->dashboard_model->save_file($data_m);
					$data=array('name'=>$this->input->post('name'),'meta_id'=>$this->input->post('meta_id'), 'content'=>url_title(strtolower($this->input->post('name'))),'file'=>$id);
					
				}
				$where=array('id'=>$this->input->post('id'));
				$this->dashboard_model->update_contents('posts',$data,$where);
			    $this->session->set_flashdata('success',TRUE);
				$f=$this->input->post('rurl');
				if(!empty($f)){
					$this->session->set_flashdata('meta_scontent',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
						
					redirect("admin/category/sub-category/edit");
				}else{
					redirect('admin/dashboard');
				}
			}
			
			
		}else{
			
			$this->session->set_flashdata('error','validation');
			$this->session->set_flashdata('details',validation_errors());
			$f=$this->input->post('rurl');
			if(!empty($f)){
				$this->session->set_flashdata('meta_content',array($this->input->post('id'),$this->input->post('rurl'),$this->input->post('mode')));	
				redirect("admin/category/edit");
			}else{
				redirect('admin/dashboard');
			}
		    
		}
	}
	function remove_image($field,$rem=false){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
					$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
					$this->form_validation->set_rules('field','Field','trim|xss_clean');
					if($this->form_validation->run()==TRUE){
						$col=$this->input->post('field');
						if($col==""||$col=="undefined")$col="file";
						$this->dashboard_model->remove_image($field,$this->input->post('id'),$rem,$col);
						$data['status']="202";			
						
					}else{
						
						$data['status']="203";	
						
						
					}
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
					
		}else{
			redirect('admin/user-logout');
		}			
		
	}
	
	function get_media_file(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				if($this->input->post('id')){
					$data['contents']=$this->dashboard_model->get_media_file($this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}		
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}				
		
		
   }
    function update_media_file(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
				$id=$this->input->post('id');					
				if(!empty($id)){
					$name=url_title($this->input->post('name'));
					
					if(file_exists($this->input->post('e_file'))&&$this->input->post('name')&&!empty($name)){
						
						$old_name="./".$this->input->post('e_file');
						$extention = pathinfo($old_name,PATHINFO_EXTENSION);
                        $newName ="./uploads/media_library/".$name.".".$extention;
						if($old_name!=$newName){
							$i=1;
							while(file_exists($newName)){	
							    $newName ="./uploads/media_library/".$name.$i.".".$extention;
								$i++;
							}
                            
							if(rename($old_name,$newName)){
								$dda=array('file'=>substr($newName,2));
								$where=array('id'=>$this->input->post('id'));
								$this->dashboard_model->save_or_update_contents('posts',$dda,$where);
							}
                        
						}    
					}
					$daa=array('name'=>url_title($this->input->post('name')),'content'=>url_title($this->input->post('content'),'/',TRUE),'meta_content'=>$this->input->post('meta_content'));
					$where=array('id'=>$this->input->post('id'));
					$this->dashboard_model->save_or_update_contents('posts',$daa,$where);
					$data['contents']=$this->dashboard_model->get_media_file($this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}		
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}				
		
		
   }
	
	function delete_media_file(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
									
				$this->form_validation->set_rules('id','Id','trim|required|xss_clean');
					if($this->form_validation->run()==TRUE){
						
						$this->dashboard_model->delete_content("posts",$this->input->post('id'));
						$data['status']="202";			
						
					}else{
						
						$data['status']="203";	
						
						
					}
					
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}				
		
		
   }
	function bulk_action($fld){
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				if($this->input->post('id')){
					$this->dashboard_model->bulk_action_delete($fld,$this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}		
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
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
			$config['file_name']=preg_replace("/\W(?=.*\.[^.]*$)/", "",$_FILES[$file]['name']);
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
	
	function comments($mode){
		
		$data['user_info']=$this->user_info;
		$data['active']="watches";
		$data['actived']=trim($mode);
		$this->load->view('admin/includes/header',$data);
		$data['result']=$this->dashboard_model->get_de_contents('comments',array('mode'=>trim($mode)));
		$this->load->view('admin/comments',$data);
		$this->load->view('admin/includes/footer');
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
	/*********************End Library**********************************************************************************************/
	
	/*********************************************************************Super admin only*************************************************/
	function nt_override(){
		$data['user_info']=$this->user_info;
		$data['active']="nf";
		$data['actived']="nf";
		$data['redirect']=current_url();
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/index_nt');
		$this->load->view('admin/includes/footer');
	}
	function users(){
		$data['user_info']=$this->user_info;
		if($this->user_info['privilage']==md5('superadmin')||$this->user_info['privilage']==md5('developer')){
			    	
			    $data['active']="settings";
				$data['actived']="users";
				$this->load->view('admin/includes/header',$data);
				            $this->load->library('pagination');	
							$config['base_url']=base_url()."admin/settings/users";
							$config['total_rows']=count($this->dashboard_model->get_rows_count_users());
							$config['per_page']=10;
							$config['first_link'] = '« First';
							$config['last_link'] = 'Last »';
							$config['uri_segment'] = 4; 
							$this->pagination->initialize($config);
							$result['result']=$this->dashboard_model->get_users(array('users',12,$this->uri->segment(3,0)));
							if($result['result']!=NULL&&!empty($result['result'])){
								$result['links']=$this->pagination->create_links();
							}
				$this->load->view('admin/users',$result);
				$this->load->view('admin/includes/footer');
				
			
		}else{
			
			redirect('not-found');
		}
		
		
	}
	function save_user(){
		    $this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    $this->form_validation->set_rules('name','Name','trim|required|min_length[4]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email','Email Id','trim|required|xss_clean|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','required|xss_clean|min_length[8]|matches[confirmpassword]|callback_valid_pass');
			$this->form_validation->set_rules('confirmpassword','Confirm Password','required|xss_clean');
			
			if($this->form_validation->run()==TRUE){
				
					
					$data=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'password'=>md5($this->input->post('password')),
					            'privilage'=>md5("user"),'status'=>0);
					$this->dashboard_model->save_user($data);
				    $this->session->set_flashdata('success',TRUE);
					redirect("admin/settings/users");
					
				
			}else{
				
				
					$this->session->set_flashdata('error','validation');
					$this->session->set_flashdata('validation',validation_errors());
					$this->session->set_flashdata('value',array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'confirmpassword'=>$this->input->post('confirmpassword')));
					
				    redirect("admin/settings/users");
				
				
			}
		
	}
	function valid_pass($candidate) {
		
		if($this->input->post('password')&&$this->input->post('password')!=""){
			if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $candidate,$matches)==FALSE){
		    	$this->form_validation->set_message('valid_pass','The password field must contain atleast one lowercase letter,uppercase letter,number and a special character.');
		    	return FALSE;
		    }else{
		    	 return TRUE;
		    }
			
		}else{
			
			 return TRUE;
		}
	    
		     
	        
	   
	}
	function edit_user(){
		$this->form_validation->set_rules('id','Id','required|xss_clean');
		if($this->form_validation->run()==TRUE){
			
			$data['user_info']=$this->user_info;
			$data['active']="settings";
			$data['actived']="users";
			$this->load->view('admin/includes/header',$data);
			$result['result']=$this->dashboard_model->get_contents_by_id(array('users','users',$this->input->post('id')));			
			$this->load->view('admin/users_edit',$result);
			$this->load->view('admin/includes/footer');		
			
		}else{
			
				if($this->session->flashdata('u_id')!=FALSE&&$this->session->flashdata('u_id')!=""&&$this->session->flashdata('u_id')!="0"){
						
					$data['user_info']=$this->user_info;
					$data['active']="settings";
					$data['actived']="users";
					$this->load->view('admin/includes/header',$data);
					$result['result']=$this->dashboard_model->get_contents_by_id(array('users','users',$this->session->flashdata('u_id')));			
					$this->load->view('admin/users_edit',$result);
					$this->load->view('admin/includes/footer');	
						
				}else{
					redirect("admin/settings/users");
				}
			
			
		}
		
		
	}
    function delete_user(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				if($this->input->post('id')){
					$this->dashboard_model->delete_users($this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}		
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}				
		
		
	}
    function user_bulk_action(){
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&($_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"||$this->input->is_ajax_request()||$_SERVER['HTTP_X_REQUESTED_WITH']=="Msxml2.XMLHTTP"||
					$_SERVER['HTTP_X_REQUESTED_WITH']=="Microsoft.XMLHTTP")){
						
				if($this->input->post('id')){
					$this->dashboard_model->user_bulk_action_delete($this->input->post('id'));
					$data['status']="202";
				}else{
					$data['status']="203";
				}		
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
						
		}else{
			
			redirect('admin/user-logout');
		}				
		
		
		
	}
	function edit_user_save(){
		
		    $this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    $this->form_validation->set_rules('name','Name','trim|required|min_length[4]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email','Email Id','trim|required|xss_clean|valid_email|callback_check_edit_field');
			$this->form_validation->set_rules('password','Password','xss_clean|min_length[8]|matches[confirmpassword]|callback_valid_pass');
			$this->form_validation->set_rules('confirmpassword','Confirm Password','xss_clean');
			$this->form_validation->set_rules('id','Id','required|xss_clean');
			if($this->form_validation->run()==TRUE){
			
				if($this->input->post('password')&&$this->input->post('password')!=""){
					$data=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'password'=>md5($this->input->post('password')));
				}
				else{
					$data=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'));
				}
				
				$this->dashboard_model->update_user($data,$this->input->post('id'));
				$this->session->set_flashdata('u_id',$this->input->post('id'));
			    $this->session->set_flashdata('success',TRUE);
				redirect("admin/settings/users/edit");
				
			
			}else{
				
				
					$this->session->set_flashdata('error','validation');
					$this->session->set_flashdata('validation',validation_errors());
					$this->session->set_flashdata('u_id',$this->input->post('id'));
				    redirect("admin/settings/users/edit");
					
				
				
			}
		
	}
	function check_edit_field($str){
		
		if($this->dashboard_model->check_field('users','email',$str,$this->input->post('id'))){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('check_edit_field','The email id you have submitted is already exist.');
			return FALSE;
		}
	}
	function user_status(){
		    $this->form_validation->set_rules('id','Id','required|xss_clean');
			$this->form_validation->set_rules('status','Status','required|xss_clean');
			
			if($this->form_validation->run()==TRUE){
				
					
					$data=array('status'=>$this->input->post('status'));
					$this->dashboard_model->update_user($data,$this->input->post('id'));
				    $this->session->set_flashdata('success',TRUE);
					redirect("admin/settings/users");
					
				
			}else{
				
				    redirect("admin/settings/users");
				
				
			}
		
		
	}
	
	/*********************************************************************End of super admin only*************************************************/
	
	
	
	
	function profile(){
		
		$data['user_info']=$this->user_info;
		$data['active']="settings";
		$data['actived']="profile";
		$this->load->view('admin/includes/header',$data);
		$result['result']=$this->dashboard_model->get_user_by_id($data['user_info']['id']);			
		$this->load->view('admin/profile',$result);
		$this->load->view('admin/includes/footer');
		
		
	}
    function update_profile(){
    	
		    $this->form_validation->set_error_delimiters('<p class="error-message"><i class="fa fa-close"></i>', '</p>');
		    $this->form_validation->set_rules('name','Name','trim|required|min_length[4]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email','Email Id','trim|required|xss_clean|valid_email|callback_check_edit_field');
			$this->form_validation->set_rules('password','Password','xss_clean|min_length[8]|matches[confirmpassword]|callback_valid_pass');
			$this->form_validation->set_rules('confirmpassword','Confirm Password','xss_clean');
			$this->form_validation->set_rules('id','Id','required|xss_clean');
			if($this->form_validation->run()==TRUE){
			
				$file=$this->upload_image('file','profile',"jpg|jpeg|png|gif");
				if($file=="error"){
						
					    $this->session->set_flashdata('error','validation');
						$this->session->set_flashdata('validation',$this->upload->display_errors());
					    redirect("admin/settings/profile");
					    
				}else{
						
					if($file=="error"||$file=="no-file"){$file=$this->input->post('e_file');}else{if(file_exists("./".$this->input->post('e_file')))@unlink("./".$this->input->post('e_file'));}
					
					if($this->input->post('password')&&$this->input->post('password')!=""){
						$data=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'password'=>md5($this->input->post('password')),'file'=>$file);
					}
					else{
						$data=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'file'=>$file);
					}
					$q=$this->dashboard_model->update_user($data,$this->input->post('id'));
					if(!empty($q)){
						foreach($q as $row){
				 	
						 	$this->session->unset_userdata('eurotech_session_data');
							$data=array('id'=>$row['id'],'username'=>$row['email'],'name'=>$row['name'],'file'=>$row['file'],'privilage'=>$row['privilage'],'sess_created'=>TRUE);
							$this->session->set_userdata('eurotech_session_data',$data);
							
						}	
					}
					
					$this->session->set_flashdata('u_id',$this->input->post('id'));
				    $this->session->set_flashdata('success',TRUE);
					 redirect("admin/settings/profile");
					
				}	
				
				
			
			}else{
				
				
					$this->session->set_flashdata('error','validation');
					$this->session->set_flashdata('validation',validation_errors());
				    redirect("admin/settings/profile");
					
				
				
			}
		
		
   }
   



}?>