<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->helper('form');
		$this->load->model('admin/user_model');
		$this->check_user_authentication();
	}
	protected function check_user_authentication(){
		
		$sess_data=$this->session->userdata('session_data');
		if($this->session->userdata('session_data')&&isset($sess_data['sess_created'])&&$sess_data['sess_created']==TRUE&&$this->uri->segment('2')!="user-logout"){
			redirect('admin/dashboard');
		}
		
	}
	public function index()
	{
        header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
		if($this->input->get('redirect')){
			$this->session->set_flashdata('redirect',$this->input->get('redirect'));
		}
		$this->load->view('admin/login');
	}
	function check_authentication(){
		
		$this->form_validation->set_rules('username', 'Username','required|xss_clean|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|xss_clean');
		if ($this->form_validation->run() == true)
		{ 
			
			if($this->user_model->login()){
				  if($this->session->flashdata('redirect')){
				  	redirect($this->session->flashdata('redirect'));
				  }
			      redirect("admin/dashboard");
			}else{
				  $this->session->set_flashdata('error','db_error');
				  if($this->session->flashdata('redirect')){
				  	//$this->session->keep_flashdata('redirect');
				  }
				  //echo $this->db->last_query();
			      redirect('admin/user-login');
			}	
			
		}
		else{
			$this->session->set_flashdata('error','validation_error');
			redirect('admin/user-login');
		}
		
		
	}
	function forgot_password(){
		
		header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->load->view('admin/forgot_password');
		
	}
    function check_user(){
    	
		$this->form_validation->set_rules('username', 'Username','required|xss_clean|valid_email');
		if ($this->form_validation->run() == true)
		{
			$user_details=$this->user_model->check_user();	
			
			if($user_details!=NULL){
				$user_mail="";
				$user_id=0;	
				$user_name="";	
				foreach($user_details as $row){
					$user_mail=$row['email'];
					$user_id=$row['id'];
					$user_name=$row['name'];
				}
				  
					$email_config = Array(		
							'mailtype'  => 'html', 
							'charset'   => 'utf-8',
							'wordwrap' => TRUE,
							'newline'  => "\r\n"
							);   
					
			       $this->load->library('email', $email_config);
				   $msg='<img src="cid:logo.png" border="0">';
				   $this->email->attach("./resource/frontend/img/logo.png","inline");
			       $this->email->from("info@bodhitreepublications.org","BodhiTreeBooks");
			       $this->email->to($this->input->post('username'));
				   $this->email->reply_to("info@bodhitreepublications.org","BodhiTreeBooks");
			       $this->email->subject("Bodhi Tree Books - Admin Password Recovery");
				   $email_message ="<html>
				                      <head>
				                            
				                      </head>
				                      <body>
				                         <div style='width:93%;border:1px solid #ddf;padding: 18px;box-shadow: 0px 8px 7px 1px #ddf;'>
				                              <div style='width:100%;display:block;padding-left:10px;padding-bottom: 22px;'>
				                                <b>Dear User,</b>
				                              </div>
				                              <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'>
				                                    You recently requested to reset your bodhitreebooks admin password. To complete your request, please click the 'Reset Password' button below and confirm the submission by follow.
				                              </div>
				                              <div style='width:100%;display:block;text-align:center;padding-bottom: 22px;cursor: pointer;'>
				                                    <form method='post' action='".base_url()."admin/password-recovery/reset-password/bodhitreebooks/sess-id-".md5(base64_encode(time()))."/reset'>
				                                           <input type='hidden' name='".$this->security->get_csrf_token_name()."' value='".$this->security->get_csrf_hash()."'/>
				                                           <input type='hidden' name='id' value='".$user_id."'/>
				                                           <input type='hidden' name='username' value='".$user_mail."'/>
				                                           <input type='submit' style='width: 50%;min-height: 40px;background-color: #137774;border: none;color: #fff;font-size: 14px;cursor: pointer;' value='Click here to reset your password' />
				                                    </form>
				                             </div> 
				                             <div style='width:100%;display:block;text-align:center;font-size:12px;color: #9C9C9C;padding-bottom: 22px;'>
				                               This email is sent from <a style='color: #1B6BC1;' href='".base_url()."'>www.bodhitreepublications.org</a> to <span style='color: #1B6BC1;' >".$user_mail."</span> based on his/her request to reset the password of Administrator Dashboard.
				                               If this mail does not belongs to you or You won't reset the password, please ignore it.
				                             </div>   
				                             <div style='width:100%;display:block;text-align:center;font-size:12px;color: #9C9C9C;padding-bottom: 22px;'>
				                               <a href='".base_url()."' >".$msg."</a>
				                             </div>     
				                         </div>           
				                     </body>
				                    </html>";
				   $this->email->message($email_message);
					
					if($this->email->send()){
						  $this->session->set_flashdata('success','success');
						  $this->session->set_flashdata('email',$this->input->post('username'));		
					      redirect("admin/forgot-password");
					}
					else{
						  $this->session->set_flashdata('error','mail_error');
						  $this->session->set_flashdata('email',$this->input->post('username'));		
					      redirect("admin/forgot-password");
					}
				
				
				  
			}else{
				  $this->session->set_flashdata('error','db_error');
			      redirect("admin/forgot-password");
			}	
			
		}
		else{
			$this->session->set_flashdata('error','validation_error');
			$this->forgot_password();
		}
		
		
	}
    function password_recovery(){
					
		$this->form_validation->set_rules('username', 'Username','required|xss_clean|valid_email');
		$this->form_validation->set_rules('id', 'User Id','required|xss_clean|valid_number');
		if ($this->form_validation->run() == true)
		{
				
				if($this->user_model->check_user_by_id()){
					
					$data['email']=$this->input->post('username');
					header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
                    header("Cache-Control: no-store, no-cache, must-revalidate");
					$this->load->view('admin/reset_password',$data);
					
				}else{
					
					$this->session->set_flashdata('ferror','The request you have submitted was not valid to reset the password. Please try <b><a href="'.base_url("admin/forgot-password").'">Forgot Password</a></b> again.');
			        redirect('admin/forgot-password');
				}	
				
			
		}else{
			$this->session->set_flashdata('ferror','The request you have submitted was not valid to reset the password. Please try <b><a href="'.base_url("admin/forgot-password").'">Forgot Password</a></b> again.');
			redirect('admin/forgot-password');
		}		
			
		
	}
	function reset_password_submit(){
		
		$this->form_validation->set_rules('username', 'Username','required|xss_clean|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|xss_clean|min_length[6]|max_length[12]|matches[cpass]');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == true)
		{
			$data=array('password'=>md5($this->input->post('pass')));	
			if($this->user_model->reset_password($data)){
				  
				  $this->session->set_flashdata('success','success');	
			      $this->session->set_flashdata('email',$this->input->post('username'));
			      redirect('admin/reset-password');
			}else{
				  $this->session->set_flashdata('error','db_error');
				  $this->session->set_flashdata('email',$this->input->post('username'));
			      redirect('admin/reset-password');
			     
			}	
			
		}
		else{
			$this->session->set_flashdata('error','validation_error');
			$data['email']=$this->input->post('username');
			$this->load->view('admin/reset_password',$data);
		}
		
	}
   function re_set_me(){
   	    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->load->view('admin/reset_password');
		
   }
   function logout(){
       echo "here"; exit();
   	  $this->session->unset_userdata('session_data');
   	  $this->session->sess_destroy();
	  redirect('admin');
   }
	
}

