<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
		  parent::__construct();
      $this->load->helper('url');
			$this->load->library('form_validation');
		//	$this->load->model('login_model');
			$this->load->helper('date');
			$this->load->model('home_model');
			header('Access-Control-Allow-Origin: *');
			ini_set('display_errors', 1);


   }

	public function index()
	{
		//$this->load->view('login');
	}
	public function login(){

		$this->form_validation->set_rules('email','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == true){

				$loginData = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				);
				$data['success'] = true;
				 $data['messages'] = 'log';
				$data['status'] = 400;
				 echo json_encode($data);
				 exit();
				$resultLogin = $this->home_model->client_login('clients','*',$loginData);
				if(!empty($resultLogin)){
					if($resultLogin->status ==1 ){
						if ($resultLogin->status ==1) {
								$type ="Client";
						}
						if ($resultLogin->status ==2) {
								$type="Admin";
						}
						if ($resultLogin->status ==3) {
								$type="Super Admin";
						}
						if ($resultLogin->status == 4) {
								$type="Staff";
						}
						if ($resultLogin->status == 5) {
								$type="Partners";
						}

						$this->session->set_userdata(array(
			            'user_name'    =>  $resultLogin->email,
			            'name'         =>  $resultLogin->name,
			            'login_id'     =>  $resultLogin->clients_id,
			            'login_status' =>  $resultLogin->status,
			            'type'         =>  $type,
			            'logged_in'    =>  TRUE
			          ));
			          //last_activity();
			          //redirect('payment/wallet');
								$return  = true;
								$message ='Logged in';
								$status  = 200;


					}else {
						$this->session->set_flashdata('fmsg','You Are Not Allowed to Access...!');
						redirect('payment');
					}
				}else {
					$this->session->set_flashdata('fronterrormsg','user Name or Password incorrect...!');
	        redirect('payment');
				}

		}else{
			$this->session->set_flashdata('fronterrormsg','User Name or Password incorrect...!');
	        //redirect('payment');
					$return  = false;
					$message ='User Name or Password incorrect...!';
					$status  = 400;
		}

		$data['success'] = $return;
		 $data['messages'] = $message;
		$data['status'] = $status;
		 echo json_encode($data);
	}
}
