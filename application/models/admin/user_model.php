<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{

	function login()
 	{
  			
			
  		$this -> db -> select('id,name,email,privilage,file');
   		$this -> db -> from('users');
   		$this -> db -> where('email', $this->input->post('username'));
   		$this -> db -> where('password',md5($this->input->post('pass')));
		$this -> db -> where('status',0);
   		$query = $this -> db -> get();
   		if($query -> num_rows() == 1)
   		{
    		 $q=$query->result_array();
			 foreach($q as $row){
			 	
			 	$this->session->unset_userdata('session_data');
				$data=array('id'=>$row['id'],'username'=>$row['email'],'name'=>$row['name'],'file'=>$row['file'],'privilage'=>$row['privilage'],'sess_created'=>TRUE);
				$this->session->set_userdata('session_data',$data);
				
			 }	
    		 
    		 return true;
   		}
   		else
   		{
     		return false;
   		}
		
		
		
		
// 	}
// 	function check_user(){
// 		$this -> db -> select('id,name,email');
   		$this -> db -> from('users');
   		$this -> db -> where('email', $this->input->post('username'));
   		$query = $this -> db -> get();
   		if($query -> num_rows() == 1)
   		{
    		 return $query->result_array();
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function check_user_by_id(){
		$this -> db -> select('id,name,email');
   		$this -> db -> from('users');
		$this -> db -> where('id', $this->input->post('id'));
   		$this -> db -> where('email', $this->input->post('username'));
   		$query = $this -> db -> get();
   		if($query -> num_rows() == 1)
   		{
    		 return TRUE;
   		}
   		else
   		{
     		return FALSE;
   		}
	}
	function reset_password($data){
		
		
		
   		$this -> db -> where('email', $this->input->post('username'));
   		$query = $this -> db ->update('users',$data);
   		return $query;
		
		
	}
	function edit_user($dat,$privilege){
			
		$result=$this->db->query('select * from users where email="'.$this->input->post('username').'" and id<>'.$this->input->post('id'));
		if($result->num_rows()>0){
			return "exist";
		}else{
			$this -> db -> where('id', $this->input->post('id'));
	   		$this -> db -> where('privilege', $privilege);
	   		$query = $this -> db ->update('users',$dat);
			if($query){
				return "k";
			}else{
				return "notok";
			}
		}	
		
   		
		
		
	}
    function update_user($id,$privilege,$value){
    	$this -> db -> where('id', $id);
   		$this -> db -> where('privilege', $privilege);
   		$query = $this -> db ->update('users',array('status'=>$value));
   		return $query;
    }
	function delete_user($id,$privilege){
		$this -> db -> where('id', $id);
   		$this -> db -> where('privilege', $privilege);
   		$query = $this -> db ->delete('users');
   		return $query;
		
		
	}

}
?>
