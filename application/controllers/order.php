<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
function __construct() {
	parent::__construct();
        $this->load->helper('url');
	}
	
	public function index($id=null)
	{
			        
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
        $data['id'] = $id;
        
		$data['active']="tracking";
        $this->load->view('includes/header',$data);
		$this->load->view('order',$data);
		$this->load->view('includes/footer');
	}
}