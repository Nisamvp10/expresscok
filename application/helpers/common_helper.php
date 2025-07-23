<?php
// function login_check(){
//
//     $CI =& get_instance();
//     $is_logged_in = $CI->session->userdata('login_id');
//        if(!isset($is_logged_in) || $is_logged_in != true)
//        {
//         //echo 'You don\'t have permission to access this page. <a href="'.base_url('payment').'">Login</a>';
//         redirect('payment');
//         die();
//       }else{
//       }
// }



function login_check(){
  $CI =& get_instance();

   if( $CI->session->userdata('logged_in') ==true && !empty($CI->session->userdata('login_id'))){
    return true;
  }else {
    redirect('payment');
  }
}


function proceed_button(){
    $CI =& get_instance();
  if($CI->session->userdata('login_status') ==1){ ?>
   <button type="submit"  class="login-trigger2"  >Proceed to pay</button>
   <?php
  }else{ ?>
       <button class="login-trigger"  data-target="#login" data-toggle="modal">Proceed to pay</button>
 <?php
  }
}
