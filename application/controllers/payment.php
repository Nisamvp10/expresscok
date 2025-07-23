<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 require_once(APPPATH."views/razorpay-php/Razorpay.php");
 use Razorpay\Api\Api;
 use Razorpay\Api\Errors\SignatureVerificationError;
class Payment extends CI_Controller {

	function __construct() {
		  parent::__construct();
      $this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->helper('date');
			$this->load->helper('common');
			$this->load->library('session');
			$this->load->model('home_model');
			header('Access-Control-Allow-Origin: *');
      ini_set('display_errors', 1);
   }
	public function index(){
	    $result['active']="tools";
		$result['tittle']="DHL EXPRESS COURIER 7403005001";
        $this->load->view('includes/header',$result);
		$this->load->view('checkout',$result);

	}

	function register(){
	    $this->load->view('raz/registration_form');
	}

	function razpay(){
	         if(login_check()){
             $userId = $this->session->userdata('login_id');
             $owner = $this->input->post('owner_id');
             $total = $this->db->query('SELECT SUM(amount) as amount FROM wallet WHERE client_id = '.$userId.' AND status = 2')->result();
	         $key_id = 'rzp_test_ny4WSFwXc8dcSo';//'rzp_test_s0klL62NHcFQdy';
	         $secret = 'nrzR3y3ltnJz527BnIyR9vL9';//'0ASDKj1ua5g8zlgMEwdljUhH';
	         
	    	 $api = new Api($key_id, $secret);
                 $_SESSION['payable_amount'] = $total[0]->amount;;
    $razorpayOrder = $api->order->create(array(
                    'receipt'         => rand(),
                    'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
                    'currency'        => 'INR',
                    'payment_capture' => 1 // auto capture

                ));
        	    $amount = $razorpayOrder ['amount'];
                $razorpayOrderId = $razorpayOrder['id'];
                // $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        	   // $razorpayOrder = $api->order->create($orderData);
        	   $this->session->set_userdata('amount', $_SESSION['payable_amount']);
        	   $this->session->set_userdata('billing_address',$owner );



	       $datas = $this->home_model->userdata('clients','*',array('status'=>1,'clients_id'=>$userId));
           $address = $this->home_model->userdata('client_address','*',array('status'=>1,'client_address_id'=>19));
    
           $data = $this->prepareData($amount,$razorpayOrderId,$datas,$address,$razorpayOrder);
          $this->load->view('raz/test_raz',array('data'=>$data));


	      //  echo $this->db->last_query();
	       // exit();


	  //
    /**
     * You can calculate payment amount as per your logic
     * Always set the amount from backend for security reasons
     */
    // $_SESSION['payable_amount'] = 10;
    // $razorpayOrder = $api->order->create(array(
    //   'receipt'         => rand(),
    //   'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
    //   'currency'        => 'INR',
    //   'payment_capture' => 1 // auto capture
    // ));
    // $amount = $razorpayOrder['amount'];
    // $razorpayOrderId = $razorpayOrder['id'];
    // $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    // $data = $this->prepareData($amount,$razorpayOrderId);
   // $this->load->view('raz/rezorpay',['order'=>$razorpayOrder,'userdata'=>$datas,'address'=>$address]);
   
   
	         }
	         else{
	             redirect('payment');
	         }
	}
	
	
	
	  public function prepareData($amount,$razorpayOrderId,$customer,$address,$order)
  {
      
    $data = array(
      "key" => RAZOR_KEY_ID,
      "amount" =>$amount,
      "name" => "DHL KOCHI",
      "description" => "Learn To Code",
     "image"=> "https://www.expresscok.com/resource/frontend/images/logo.png",
      "prefill" => array(
        "name"  => $customer->name,//$this->input->post('name'),
        "email"  => $customer->email,//$this->input->post('email'),
        "contact" => $address->contact_number,//$this->input->post('contact'),
      ),
      "notes"  => array(
        "address"  => $address->address.'-'.$address->postal_code.'-'.$address->city.'-'.$address->country,
        "merchant_order_id" => rand(),
      ),
      "theme"  => array(
        "color"  => "#3399cc"
      ),
      "order_id" => $razorpayOrderId,
    );
    return $data;
  }



public	function paymentsuccess(){
    
    $success = true;
       $error = "payment_failed";
  if(!empty($_POST['razorpay_payment_id'])){
       $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
       try {

        $attributes = array(
         'razorpay_order_id' => $_POST['orderId'],
          'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
      } catch(SignatureVerificationError $e) {

        $success = false;
        $error = 'Razorpay_Error : ' . $e->getMessage();
      }

  }
  if ($success === true) {
        
     $userid =$this->session->userdata('login_id');
     
     $data= array(
         'user_id' =>  $userid,
         'order_id' =>  $_POST['orderId'],
         'billing_address' => $this->session->userdata('billing_address'),
         'amount' =>    $this->session->userdata('amount'),
         'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature'],
          'status'             => 1,
          'created_at'         => date('y-m-d H:i:s'),
         );
     $query = $this->home_model->insertData('transaction',$data);
     if($query){
        //$this->setRegistrationData();
         $this->home_model->entry_update('wallet',array('client_id'=>$userid,'status'=>2),array('status'=>1));
         
          $email_config = Array(
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'wordwrap' => TRUE,
          'newline'  => "\r\n"
          );

$user_mail = "nisamvp10@gmail.com";
         $this->load->library('email', $email_config);
       $msg='<img src="cid:logo.png" border="0">';
       //$this->email->attach("./resource/frontend/img/logo.png","inline");
         $this->email->from("care@expresscok.com","Express cok");
         $this->email->to('nisamvp10@gmail.com'); //$this->input->post('username')
       $this->email->reply_to("care@expresscok.com","Expresscok");
         $this->email->subject("Transaction Success");
       $email_message ="<html>
                          <head>

                          </head>
                          <body>
                             <div style='width:93%;border:1px solid #ddf;padding: 18px;box-shadow: 0px 8px 7px 1px #ddf;'>
                                  <div style='width:100%;display:block;padding-left:10px;padding-bottom: 22px;'>
                                    <b>Dear customer,</b>
                                  </div>
                                <div style='width:100%;display:block;padding-left:18px;padding-bottom: 12px;padding-top: 9px;background:#dadada;color: #000;'>
                                  Your Online payment  Rs. ".$this->session->userdata('amount')." is successful.
                                </div>
                                <p width:100%;padding:10px;0>Order Id:".$_POST['orderId']."</p>

                                  <div style='width:100%;display:block;padding-left:18px;padding-bottom: 35px;'>
                                        You recently requested to reset your bodhitreebooks admin password. To complete your request, please click the 'Reset Password' button below and confirm the submission by follow.
                                  </div>
                                  <div style='width:100%;display:block;text-align:center;padding-bottom: 22px;cursor: pointer;'>

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
          //$this->session->set_flashdata('email',$this->input->post('username'));
            redirect("payment/success");
             
      }
      else{
          $this->session->set_flashdata('error','mail_error');
        //  $this->session->set_flashdata('email',$this->input->post('username'));
          //  redirect("admin/forgot-password");
          echo 'try later';
      }


     }
    // redirect(base_url().'register/success');
   }
   else {
     //redirect(base_url().'register/paymentFailed');
   }


	}

function success(){
          $result['active']="tools";
		$result['tittle']="DHL EXPRESS COURIER 7403005001";
       $this->load->view('includes/header',$result);
       $this->load->view('raz/payment_success');

     }
     
     function failed(){
          $result['active']="tools";
		$result['tittle']="DHL EXPRESS COURIER 7403005001";
       $this->load->view('includes/header',$result);
       $this->load->view('raz/transaction_failed');

     }
     
  public function setRegistrationData()
  {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $contact = $this->input->post('contact');
    $amount = $_SESSION['payable_amount'];
    $registrationData = array(
      'order_id' => $_SESSION['razorpay_order_id'],
      'name' => $name,
      'email' => $email,
      'contact' => $contact,
      'amount' =>    $this->session->userdata('amount'),
    );
    
    print_r($registrationData);
    // save this to database
  }


	public function create_account(){

        $data['success'] = array('success'=>false,'messages'=>array(),'project_uq'=>false,'step_verify'=>0);

		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'User Name', 'required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == TRUE){
		    $email_id =  $this->input->post('email');
		    $duplicate = $this->home_model->check_mail_exist($email_id);


		    if($duplicate == 'true'){
		        $userdata = array(
		        'name' => $this->input->post('name'),
		        'email' => $this->input->post('email'),
		        'password' => md5($this->input->post('name')),
		        'status'   => 1,
		        'created_at' => date('y-m-d H:i:s')
		        );
		        $query = $this->home_model->save_contents('clients',$userdata);
		        if($query){
		            $data['success'] = true;
		            $data['messages'] = 'Registration Completed! Try to login';
	                $data['status'] = 200;
		        }else{
		            $data['messages'] = 'Please try later';
	                $data['status'] = 400;
		        }
		    }else{
		          $data['messages'] = 'The email address is already taken. Please choose another one';
	               $data['status'] = 400;
		    }



		}else{
		    $data['error'] = validation_errors();
		}

	    echo json_encode($data);
	}

	public function login(){

	    $valid['success'] = array('success'=>false,'messages'=>array());
	    $this->form_validation->set_rules('email','Username','required');
		$this->form_validation->set_rules('password','Password','required');



		if($this->form_validation->run() == true){


		    $loginData = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				);

				$resultLogin = $this->home_model->client_login('clients','*',$loginData);
				if($resultLogin){
				   if($resultLogin->status ==1 ){
				       $this->session->set_userdata(array(
			            'user_name'    =>  $resultLogin->email,
			            'name'         =>  $resultLogin->name,
			            'login_id'     =>  $resultLogin->clients_id,
			            'login_status' =>  $resultLogin->status,
			            'logged_in'    =>  TRUE
			          ));
			          $valid['success'] = true;
			          $valid['status'] = 200;
			          $valid['messages'] = 'Hi ,'.$this->session->userdata('name');
			          $valid['sub_message'] = "welcome to DHL world fastest courier service";

				   }else{
				       $valid['success'] = false;
			          $valid['status'] = 400;
				       $valid['messages'] = 'Account under verufy please mtry later';
				   }
				}else{
				    $valid['success'] = false;
			          $valid['status'] = 400;
				    $valid['messages'] = 'User Name or Password incorrect...!';
				}
		}else{
		    $valid['success'] = false;
			          $valid['status'] = 400;
		    $valid['messages'] = 'User Name or Password incorrect...!';
		}
		echo json_encode($valid);
	}

public function wallet(){
    	    $data['success'] = array('success'=>false,'messages'=>array());
     login_check();
         $this->form_validation->set_rules('money','Amount','required');
         if($this->form_validation->run() == true){
                $money = $this->input->post('money');
                $add_to_wallet = array(
                    'amount' => $money,
                    'client_id' => $this->session->userdata('login_id'),
                    'status'    => 2,
                    'created_at' => date('y-m-d H:i:s'),
                    );

                    $query = $this->home_model->addto_wallet('wallet',$add_to_wallet);
                     if($query){
		            $data['success'] = true;
		            $data['messages'] = 'Successfully add to DHL wallet';
	                $data['status'] = 200;
		        }

         }else{
              $data['success'] = false;
		 $data['messages'] = 'Please fillout required filed';
	     $data['status'] = 400;
         }
     // }else{
     //     $data['success'] = false;
		 // $data['messages'] = 'Please Try to login';
	   //   $data['status'] = 400;
     // }
     	     echo json_encode($data);

	}

	public function billing_address(){
	    login_check();

	     $result['active']="tools";
		   $result['tittle']="DHL EXPRESS COURIER 7403005001";
        $this->load->view('includes/header',$result);
        $this->load->view('billing',$result);

    }

    function myaddress(){
          if(login_check()){

	          $useraddress = array(
					'client_id' => $this->session->userdata('login_id'),
					'status' => 1,
				);
				$data['address'] = $this->home_model->getData('client_address','*',$useraddress);
				$result['res'] = $this->load->view('address_table',$data);
				echo $result['res'];// json_encode($result);
          }
    }
	function address_save(){
	    	$valid['success'] = array('success'=>false,'messages'=>array());
	     if(login_check()){

    	    $this->form_validation->set_rules('address','Address','required');
    		$this->form_validation->set_rules('country','Country','required');
    		$this->form_validation->set_rules('postalcode','postalcode','required');
    		$this->form_validation->set_rules('city','city','required');
    		$this->form_validation->set_rules('ph','Contact Number','required');

    	if($this->form_validation->run() == true){

    	        $address = array(
    	                'client_id' => $this->session->userdata('login_id'),
    	                'address'   => $this->input->post('address'),
    	                'country'   => $this->input->post('country'),
    	                'city'      => $this->input->post('city'),
    	                'postal_code' => $this->input->post('postalcode'),
    	                'contact_number' => $this->input->post('ph'),
    	                'status'        => 1,
    	                'created_at'   => date('y-m-d H:i:s'),
    	            );
    	       $query = $this->home_model->save_contents('client_address',$address);
		        if($query){
		            $valid['success'] = true;
        	         $valid['status']  = 200;
        	         $vaild['messages'] = "validation success";
		        }

    		 $valid['success'] = true;
	         $valid['status']  = 200;
	         $vaild['messages'] = "validation success";
    		}else{
    		 $valid['success'] = false;
	         $valid['status']  = 400;
	         $vaild['messages'] = "please Fillout all required fields";
    		}
	     }else{
	         $valid['success'] = false;
	         $valid['status']  = 400;
	         $vaild['messages'] = "please login first";
	     }

	     echo json_encode($valid);
	}

	public function pay(){
	     if(login_check()){
	        $addressId = $this->input->post('address_id');
	        $c_id = $this->session->userdata('login_id');
	        $result['grandtotal'] = $this->db->query('SELECT SUM(amount) as amount FROM wallet WHERE client_id = '.$c_id.' AND status = 2')->result();
	        //echo $this->db->last_query();
            $result['active']="tools";
		    $result['tittle']="DHL EXPRESS COURIER 7403005001";
		    $result['owner_id'] = $addressId;
            $this->load->view('includes/header',$result);
	        $this->load->view('payment_select',$result);
	     }else{
	         redirect('payment');
	     }
	}

	function summary(){
	    if(login_check()){
	     $add_to_wallet = array(
                    'status' => 2,
                    'client_id' => $this->session->userdata('login_id'),
                    );
         $result['result'] = $this->home_model->getData('wallet','*',$add_to_wallet);
         $result['summary']=$this->load->view('summary_table',$result);
         echo $result['summary'];

	}
	}


	function removeitems(){
	    //echo  $this->input->post('id');
	    $valid['success'] = array('success'=>false,'messages'=>array());
	    if(login_check()){
	         $id = $this->input->post('id');
	            $query = $this->home_model->entry_update('wallet', array('wallet_id' =>$id ),array('status'=>3));
	            if($query){
	                	$valid['success'] = true;
				$valid['status'] = 200;
				$valid['messages'] = $this->db->last_query();//"Property successfully updated";
	            }else{
	                	$valid['success'] = false;
				$valid['status'] = $id;
				$valid['messages'] = $this->db->last_query();//"Property successfully updated";
	            }

	    }else{
	        $valid['status'] = 400;
	        $valid['success'] = false;
	        $valid['messages'] = "Please login to try";
	    }

	    echo json_encode($valid);
	}

	public function CheckMail()
	{
    print_r( $this->input->post());
	    echo $email_id = $this->input->post('email');
	   //$email_id= trim($this->input->post('email',TRUE));
	   $data=$this->home_model->check_mail_exist($email_id);
	   $data['qury'] =  $this->db->last_query();
	   $data['token'] = $this->security->get_csrf_hash();

	    //$json['valid'] = false;

     echo json_encode($data);

	}


}
