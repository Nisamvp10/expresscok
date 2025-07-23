<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	var $user_info=array();
	var $captcha_exp=100;
	public function __construct(){
		parent::__construct();
		$this->check_user_auth();
		//$this->redirect_www();
	}
	function redirect_www(){
		if(substr($_SERVER['SERVER_NAME'],0,3)!="www"){
		    header("HTTP/1.1 301 Moved Permanently");
		    header("Location: http://www.expresscok.com".$_SERVER['REQUEST_URI']);
		}
	}
	function check_user_auth(){
		$sess_data=$this->session->userdata('user_session_data');
		if($this->session->userdata('user_session_data')&&isset($sess_data['sess_created'])&&$sess_data['sess_created']==TRUE){
			$this->user_info=$sess_data;
			
		}
		
	}
	public function index()
	{
			        
					$result['active']="home";
					//$result['tittle']="DHL EXPRESS INTERNATIONAL COURIER CALL 7403005001 & CARGO SERVICE";
					$result['tittle']="DHL EXPRESS INTERNATIONAL COURIER & CARGO SERVICE";
					$result['news']=$this->home_model->get_de_contents('posts',array('mode'=>"news_scroll"));
					//$result['sub_category']=$this->home_model->get_subcategory();
                    $this->load->view('includes/header',$result);
					$result['slides']=$this->home_model->get_slides_rows(array('a.mode'=>"slides"));
					//$result['latest_products']=$this->home_model->get_f_contents_limit('products',array('a.status'=>0),6);
					
					$this->load->view('home',$result);
					$this->load->view('includes/footer');
	}
	
    function initiate_lib_t($pg_conf){
    	            
					$this->load->library('pagination');	
					$config['base_url']=$pg_conf[0];
					$config['total_rows']=count($this->home_model->get_rows_count(array($pg_conf[3],$pg_conf[1],$pg_conf[9],$pg_conf[11],$pg_conf[15])));
					$config['per_page']=$pg_conf[4];
					$config['first_link'] = '« First';
					$config['last_link'] = 'Last »';
					$config['cur_tag_open'] = '<button class="btn btn-default btn-defaultextra btn-page-current">';
                    $config['cur_tag_close'] = '</button>';
					$config['uri_segment'] = $pg_conf[5];
					$config['anchor_class'] = $pg_conf[6];
					$this->pagination->initialize($config);
			        $result[$pg_conf[7]]=$this->home_model->get_contents_t(array($pg_conf[3],$config['per_page'],$this->uri->segment($config['uri_segment'],0),$pg_conf[2],$pg_conf[10],$pg_conf[12],$pg_conf[13],$pg_conf[14]));
					$result[$pg_conf[8]]=$this->pagination->create_links();
					return $result;	
			
    }
    private function get_history(){
    	$wheree=array('a.status'=>0);
		$like_str="";
		$wheree_str="";
		$wheree_cstr="";			
	    $re=$this->home_model->get_contents(array("products",9,0,$wheree,$wheree_str,$wheree_cstr,"rating",$like_str));
		return $re;
    }
	function track_id(){
		/*
		$orders=$this->input->post('track_id');
		$orders = trim($orders);
		$rurl=$this->input->post('rurl');
		if(!empty($orders)){
			$orders_a=explode(',',$orders);	
			$order_ids=array();
			foreach($orders_a as $order_id){
				
				$order_ids=array_merge($order_ids,explode("\r\n",$order_id));
			}
			$result['order_details']=$this->home_model->get_express_order('products',$order_ids);
			if(!empty($result['order_details'])){
				$ids=array();
				foreach($result['order_details'] as $row){
					$ids[]=$row["id"];
				}
				$result['order_description']=$this->home_model->get_order_detail($ids);

				if(empty($result['order_description'])) {
					redirect('tracking');
				}

				$result['active']="tracking_details";
				$this->load->view('includes/header',$result);
				$this->load->view('tracking_details',$result);
				$this->load->view('includes/footer');
					
				
			}else{
				$this->session->set_flashdata('error','<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>This is not a valid track id.</p>');
				$this->session->set_flashdata('value',$this->input->post("track_id"));
				redirect($rurl);
			}
		}else{
			$this->session->set_flashdata('error','<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>This is not a valid track id.</p>');
			$this->session->set_flashdata('value',$this->input->post("track_id"));
			redirect($rurl);
		}*/
	}
	
	function send_join_message(){
		$this->load->library('form_validation');
		// $this->form_validation->set_error_delimiters('<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>','</p>');
		$this->form_validation->set_rules('firstname','Name','trim|xss_clean|required|max_length[250]');
		$this->form_validation->set_rules('lastname','Name','trim|xss_clean|required|max_length[250]');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|max_length[150]|valid_email');
		$this->form_validation->set_rules('number','Phone','trim|xss_clean|is_numeric|max_length[15]');
		$this->form_validation->set_rules('business_name','Name','trim|xss_clean|required|max_length[250]');
		$this->form_validation->set_rules('business_type','Name','trim|xss_clean|required|max_length[250]');
		$this->form_validation->set_rules('address','Message','trim|xss_clean|max_length[250]');

		if($this->form_validation->run()==TRUE){
			$data=$this->input->post();					
		    $email_config =$this->config->item('email_config'); 
	        $this->load->library('email', $email_config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($this->input->post('email'),$this->input->post('firstname') .' '.$this->input->post('lastname'));
	        $this->email->to("expresscok@gmail.com");
		    $this->email->reply_to($this->input->post('email'),$this->input->post('name'));
	        $this->email->subject("Business Opportunity Enquiry on Express International.");

	        $email_message ="<html>
		                      <head>
		                            
		                      </head>
		                      <body>
		                         <div style='width:93%;border:1px solid #ddf;padding: 18px;box-shadow: 0px 8px 7px 1px #ddf;'>
		                              <div style='width:100%;display:block;padding-left:10px;padding-bottom: 22px;'>
		                                <b>Hai,</b>
		                              </div>
		                               <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Name</b>
		                                    ".$this->input->post('firstname')." ".$this->input->post('name')."
		                              </div>
									  <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Phone</b>
		                                    ".$this->input->post('number')."
		                              </div>
		                               <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Email</b>
		                                    ".$this->input->post('email')."
		                              </div>
		                               <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Business Name</b>
		                                    ".$this->input->post('business_name')."
		                              </div>
		                              <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Business Type</b>
		                                    ".$this->input->post('business_type')."
		                              </div>
		                              <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Address</b>
		                                    ".$this->input->post('address')."
		                              </div>
		                              
		                         </div>           
		                     </body>
		                    </html>";
						 //print_r($email_message);  exit(0);		
						   $this->email->message($email_message);
							//echo $this->email->print_debugger();
							if($this->email->send()){
								
								$this->session->set_flashdata('success','<p class="error-success"><span class="glyphicon glyphicon-check rmve-on-clk"></span>Your message has been successfully submitted.</p>');
								redirect('join#msg_hld');
									
							}
							else{
								  
								 
								  
								  $this->session->set_flashdata('error','<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>Message sending failed. Please try again.</p>');	
								  $this->session->set_flashdata('value',$this->input->post());
								  redirect('join#msg_hld');
							}

		} else {
			$this->session->set_flashdata('error',validation_errors());
			$this->session->set_flashdata('value',$this->input->post());			
			redirect('join#msg_hld');
		}
						

		exit;

	}
	
    function send_message(){
									//	echo "hii";	exit(0);
		    	    $this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>','</p>');	
		            $this->form_validation->set_rules('name','Name','trim|xss_clean|required|max_length[250]');
					$this->form_validation->set_rules('email','Email','trim|xss_clean|required|max_length[150]|valid_email');
					$this->form_validation->set_rules('file','Phone','trim|xss_clean|is_numeric|max_length[15]');
					$this->form_validation->set_rules('content','Message','trim|xss_clean|required|max_length[250]');
					//echo "hii";	exit(0);
					if($this->form_validation->run()==TRUE){
					
						$data=$this->input->post();
						
						   $email_config =$this->config->item('email_config'); 
					       $this->load->library('email', $email_config);
						   $this->email->set_newline("\r\n");
						   //$msg='<img src="cid:logo.png" border="0">';
						  
					       $this->email->from($this->input->post('email'),$this->input->post('name'));
					       $this->email->to("expresscok@gmail.com");
						   $this->email->reply_to($this->input->post('email'),$this->input->post('name'));
					       $this->email->subject("Online Enquiry on Express International.");
						   $email_message ="<html>
						                      <head>
						                            
						                      </head>
						                      <body>
						                         <div style='width:93%;border:1px solid #ddf;padding: 18px;box-shadow: 0px 8px 7px 1px #ddf;'>
						                              <div style='width:100%;display:block;padding-left:10px;padding-bottom: 22px;'>
						                                <b>Hai,</b>
						                              </div>
						                               <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Name</b>
						                                    ".$this->input->post('name')."
						                              </div>
													  <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>phone</b>
						                                    ".$this->input->post('file')."
						                              </div>
						                              <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'><b>Content</b>
						                                    ".$this->input->post('content')."
						                              </div>
						                              <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'>
						                                    <b><u>Contact Details</u></b><br> Phone : ".$this->input->post('file')."<br> Email : ".$this->input->post('email')."
						                              </div>
						                         </div>           
						                     </body>
						                    </html>";
						 //print_r($email_message);  exit(0);		
						   $this->email->message($email_message);
							//echo $this->email->print_debugger();
							if($this->email->send()){
								
								$this->session->set_flashdata('success','<p class="error-success"><span class="glyphicon glyphicon-check rmve-on-clk"></span>Your message has been successfully submitted.</p>');
								redirect('contact#msg_hld');
									
							}
							else{
								  
								 
								  
								  $this->session->set_flashdata('error','<p class="error-message"><span class="glyphicon glyphicon-remove rmve-on-clk"></span>Message sending failed. Please try again.</p>');	
								  $this->session->set_flashdata('value',$this->input->post());
								  redirect('contact#msg_hld');
							}
						    
						
						
					}else{
						
						$this->session->set_flashdata('error',validation_errors());
						$this->session->set_flashdata('value',$this->input->post());
						
						redirect('contact#msg_hld');
						
						
					}	
		          
	}
	
    function create_json($file_name,$data){
		
		  $fp = fopen($file_name, 'w');
		  fwrite($fp, json_encode($data));
		  fclose($fp);	
		  
	}
	
	function about(){
		
					$result['active']="about";
					$result['tittle']="EXPRESS INTERNATIONAL COURIER AND CARGO 7403005001";
					
                    $this->load->view('includes/header',$result);
					$this->load->view('about',$result);
					$this->load->view('includes/footer');
	}
	function warehousing(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('warehousing',$result);
					$this->load->view('includes/footer');
	}
	function international(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('international',$result);
					$this->load->view('includes/footer');
	}
	function parcel(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('parcel',$result);
					$this->load->view('includes/footer');
	}
	function food(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('food',$result);
					$this->load->view('includes/footer');
	}
	function tools(){
		
					$result['active']="tools";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('calculator',$result);
					$this->load->view('includes/footer');
	}
	function cargo(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('cargo',$result);
					$this->load->view('includes/footer');
	}
	function baggage(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('baggage',$result);
					$this->load->view('includes/footer');
	}
	function medicine(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('medicine',$result);
					$this->load->view('includes/footer');
	}
	function airsea(){
		
					$result['active']="services";
					$result['tittle']="DHL EXPRESS COURIER 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('airsea',$result);
					$this->load->view('includes/footer');
	}

	function tracking($id=null){
	if(!empty($id)){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://shipway.in/api/getOrderShipmentDetails',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => '',
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
            "username":"JOSEPH",
            "password":"3e7e37ba6b4918724360639e8e94e14f",
             "order_id":"'.$id.'"
            
             }',
             ));
             
            $response = curl_exec($curl);
            curl_close($curl);
            $data['result'] = json_decode($response);
            
        }else{
             $data['result']  = '';
        }
        
		$data['active']="tracking";
        $this->load->view('includes/header',$data);
	//	$this->load->view('tracking',$data);
		$this->load->view('order',$data);
		$this->load->view('includes/footer');
		
		
	}

	

	function trackingnew(){		
					// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://express.iship.co.in/iSocketService.svc/TrackDetails/E00024");

//curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser
$json = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
					
					$result['json'] = $json;
					

					

					$result['active']="tracking";
                    $this->load->view('includes/header',$result);

                    

					$this->load->view('trackingnew',$result);
					$this->load->view('includes/footer');
	}
	
	function pricing(){		
					$result['active']="pricing";
                    $this->load->view('includes/header',$result);
					$this->load->view('pricing',$result);
					$this->load->view('includes/footer');
	}
	function documents(){		
					$result['active']="documents";
                    $this->load->view('includes/header',$result);
					$this->load->view('documents',$result);
					$this->load->view('includes/footer');
	}
	
	function contact(){
					$result['active']="contact";
					$result['tittle']="INTERNATIONAL COURIER SERVICE KERALA PH : 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('contact',$result);
					$this->load->view('includes/footer');
	}

	function join(){
					$result['active']="contact";
					$result['tittle']="INTERNATIONAL COURIER SERVICE KERALA PH : 7403005001";
                    $this->load->view('includes/header',$result);
					$this->load->view('join',$result);
					$this->load->view('includes/footer');
	}
	
	function franchise () {
	    $result['active']="franchise";
	    $result['tittle'] = "EXPRESS INTERNATIONAL COURIER & CARGO FRANCHISE";
        $this->load->view('includes/header',$result);
		$this->load->view('franchise');
		$this->load->view('includes/footer');
	}
	
	
	function frntend_404(){
		echo "404";exit(0);
	}
}