<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model 
{

	public function save_contents($tbl,$data,$file=null,$mtbl=null)
	{
	  	  	
		  if(!empty($file)&&!empty($mtbl)){
		  	$this->db->insert($mtbl[0], $file);
			$data[$mtbl[1]]=$this->db->insert_id();  
		  }	
	  	  $this->db->insert($tbl, $data);
	  	  return TRUE;	    
				
	}
	function save_or_update_contents($tbl,$data,$where){
		$this->db->where($where);
		$query = $this -> db ->get($tbl);
		if($query->num_rows()>0){
			$this->db->where($where);	
   		    $query = $this -> db -> update($tbl,$data);
		}else{
			$this->db->insert($tbl,$data);
	  	    
		}
		
		return TRUE;	
	}
	function insert_data_add($tbl,$data)
	{
		$this->db->insert($tbl,$data);
		
	}
	function save_file($data){
		$this->db->insert('posts', $data);
		return $this->db->insert_id(); 
	}
	public function get_rows_count($config)
	{
   			
   		
		if(isset($config[1])&&!empty($config[1])){
			$this->db->where($config[1]);
		}	
   		$query = $this -> db ->get($config[0]);
		return $query->result_array();
		
		  			
	}
	function get_rows_count_users(){
		
		$this->db->where('privilage !=',md5('superadmin'));	
		$this->db->where('privilage !=',md5('developer'));	
   		$query = $this -> db ->get('users');
		return $query->result_array();
		
		
	}
	
	function get_de_contents($tbl,$id,$defualt="DESC",$field="id"){
		$this->db->where($id);	
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get($tbl);
   		return $query->result_array();
		
	}
	function get_order_details($tbl,$id,$defualt="DESC",$field="a.id"){
	    $this->db->select("a.*,b.name as order_name");
		$this->db->from($tbl.' a');	
		$this->db->join('products b','a.order_id=b.id','left');	
		$this->db->where($id);	
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();
		
	}
	function get_name_contents($tbl,$id,$defualt="DESC",$field="id"){
		$this->db->distinct();		
		$this->db->select("name");	
		$this->db->where($id);	
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get($tbl);
   		return $query->result_array();
		
	}
	function get_f_contents($tbl,$id,$defualt="DESC",$field="a.id"){
	    $this->db->select("a.*,b.file as m_file");
		$this->db->from($tbl.' a');	
		$this->db->join('posts b','a.file=b.id','left');	
		$this->db->where($id);	
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();
		
	}
	function get_field($tbl,$field,$where=null,$config=null){
		
		$fields=implode(',',$field);
		if(!empty($config)&&$config[0]=="distinct"){
			$this->db->distinct();
		}
		$this->db->select($fields);
		$this->db->from($tbl);
		if(!empty($where)){
			$this->db->where($where);
		}
		$re=$this->db->get();
		return $re->result_array();
	}
	function get_sug_contents($where,$limit,$offset){
		$this -> db -> select('a.*,b.id as book_id,b.name as book_name,c.name as auther_name,c.id as auther_id');
		$this -> db -> from('posts a');
		$this -> db -> join('posts c','a.meta_id=c.id','left');
		$this -> db -> join('dque_products b','a.meta_file=b.id','left');
		$this->db->where($where);
		$this -> db -> limit($limit,$offset);
		$query = $this -> db -> get();
	   	if($query -> num_rows()>0)
	   	{
	    	return $query->result_array();
		}else
	   	{
	     	return NULL;
	   	}
	}  
	function get_contents($config)
 	{
            if(isset($config[6])&&!empty($config[6])){
			   $this -> db -> select('a.*,b.'.$config[4][1].' as m_'.$config[4][1].',c.'.$config[5][1].' as meta_m_'.$config[5][1].',d.'.$config[6][1].' as '.$config[6][1]);
		    }elseif(isset($config[5])&&!empty($config[5])){
			   $this -> db -> select('a.*,b.'.$config[4][1].' as m_'.$config[4][1].',c.'.$config[5][1].' as meta_m_'.$config[5][1]);
		    }elseif(isset($config[4])&&!empty($config[4])){
			   $this -> db -> select('a.*,b.'.$config[4][1].' as m_'.$config[4][1]);
		    }else{
		       $this -> db -> select('*');	
		    }		
	   		$this -> db -> from($config[0].' a');
			if(isset($config[4])&&!empty($config[4])){
			   $this -> db -> join($config[4][0].' b','a.'.$config[4][2].'=b.'.$config[4][3],'left');
		    }
			if(isset($config[5])&&!empty($config[5])){
			   $this -> db -> join($config[5][0].' c','a.'.$config[5][2].'=c.'.$config[5][3],'left');
		    }
			if(isset($config[6])&&!empty($config[6])){
			   $this -> db -> join($config[6][0].' d','a.'.$config[6][2].'=d.'.$config[6][3],'left');
		    }
			if(isset($config[3])&&!empty($config[3])){
			   $this->db->where($config[3]);
		    }
			if(isset($config[1])&&!empty($config[1]))	
	   		$this -> db -> limit($config[1],$config[2]);
			
	   		$this -> db -> order_by('a.id','DESC');
	   		
	   		$query = $this -> db -> get();
	   		if($query -> num_rows()>0)
	   		{
	    		 	
	    		 return $query->result_array();
				
	    		 
	    		 
	   		}
	   		else
	   		{
	     		return NULL;
	   		}
	
	}
	function get_users($config)
 	{
 		
		
			 
	  		$this -> db -> select('*');
	   		$this -> db -> from($config[0]);
			$this->db->where('privilage !=',md5('superadmin'));	
			$this->db->where('privilage !=',md5('developer'));	
	   		$this -> db -> limit($config[1],$config[2]);
	   		$this -> db -> order_by('id','DESC');
	   		$query = $this -> db -> get();
	   		if($query -> num_rows()>0)
	   		{
	    		 return $query->result_array();
				
	    		 
	    		 
	   		}
	   		else
	   		{
	     		return NULL;
	   		}
	
	}
	function get_de_contents_t($tbl,$id,$defualt="DESC",$field="id"){
		$this->db->where($id);	
		$this -> db -> order_by('cast('.$field.' as unsigned)',$defualt);
   		$query = $this -> db -> get($tbl);
   		return $query->result_array();
		
	}
	function get_contents_t($tbl,$segment,$where,$order)
 	{
 		
		 
  		$this -> db -> select('a.*,b.name as meta_name');
   		$this -> db -> from($tbl[0].' a');
		$this -> db -> join($tbl[1].' b','a.meta_id=b.id','left');
		$this->db->where($where);	
   		$this -> db -> limit($segment[0],$segment[1]);
   		$this -> db -> order_by('cast(a.'.$order[1].' as unsigned)',$order[0]);
   		$query = $this -> db -> get();
   		if($query -> num_rows()>0)
   		{
    		
			
			 return $query->result_array();
			 
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function get_contents_tti($tbl,$segment,$where,$order)
 	{
 		
		 
  		$this -> db -> select('a.*,b.file as m_file');
   		$this -> db -> from($tbl[0].' a');
		$this -> db -> join($tbl[1].' b','a.file=b.id','left');
		$this->db->where($where);	
   		$this -> db -> limit($segment[0],$segment[1]);
   		$this -> db -> order_by('cast(a.'.$order[1].' as unsigned)',$order[0]);
   		$query = $this -> db -> get();
   		if($query -> num_rows()>0)
   		{
    		
			
			 return $query->result_array();
			 
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function get_where_in($tbl,$field,$id,$ids){
		$this->db->select($field);	
		$this->db->where_in($id,$ids);
		$query = $this -> db -> get($tbl);
   		if($query -> num_rows()>0)
   		{
    	    return $query->result_array();
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function get_contents_by_id_g($config){
		
		    if(isset($config[2])&&!empty($config[2])){
			   $this -> db -> select('a.*,b.'.$config[2][1].' as m_'.$config[2][1]);
		    }else{
		       $this -> db -> select('*');	
		    }		
	   		$this -> db -> from($config[0].' a');
			if(isset($config[2])&&!empty($config[2])){
			   $this -> db -> join($config[2][0].' b','a.'.$config[2][2].'=b.'.$config[2][3],'left');
		    }
   		$this->db->where($config[1]);	
   		$query = $this -> db -> get();
   		if($query -> num_rows()>0)
   		{
    	  return $query->result_array();
		 
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function get_contents_by_id($config){
		$this -> db -> select('*');
   		$this -> db -> from($config[0]);
		if($config[0]=="users"){
			$this->db->where('privilage !=',md5('superadmin'));	
			$this->db->where('privilage !=',md5('developer'));	
		}else{
			$this->db->where('mode',$config[1]);
		}
			
		
   		$this->db->where('id',$config[2]);	
   		$query = $this -> db -> get();
   		if($query -> num_rows()>0)
   		{
    	  return $query->result_array();
		 
   		}
   		else
   		{
     		return NULL;
   		}
	}
	function get_user_by_id($id){
		
		$this->db->where('id',$id);
		$this->db->where('status',0);	
   		$query = $this -> db -> get('users');
   		if($query -> num_rows()>0)
   		{
    	  return $query->result_array();
		 
   		}
   		else
   		{
     		return NULL;
   		}
		
	}
	function update_contents($tbl,$data,$id){
		
			
		$this->db->where($id);	
   		$query = $this -> db -> update($tbl,$data);
   		return $query;
		
	}
	function update_user($data,$id){
		$this->db->where('id',$id);	
   		$r=$this -> db -> update('users',$data);
		
		if($r){
			$query = $this->db->get_where('users',array('id'=>$id));
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return NULL;
			}
			
		}
		return NULL;
   		
	}
	function delete_content($fld,$id){
		$this->db->where('id',$id);		
   		$query = $this -> db ->get($fld);
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				if(isset($row['file'])&&file_exists("./".$row['file'])){
					@unlink("./".$row['file']);
				}
				if(isset($row['meta_file'])&&file_exists("./".$row['meta_file'])){
					@unlink("./".$row['meta_file']);
				}
                if(isset($row['mode'])&&$row['mode']=="category"&&isset($row['meta_mode'])&&$row['meta_mode']==$fld){
                	$this->db->where('category',$id);		
   		            $query = $this -> db ->update($fld,array('category'=>0));
					
					
                }
				if($fld=="location"){
					if(isset($row['mode'])&&$row['mode']=="country"){
						$this->db->where(array('country'=>$row['id']));		
   		                $this -> db ->delete($fld);
					}
					if(isset($row['mode'])&&$row['mode']=="state"){
						$this->db->where(array('state'=>$row['id']));		
   		                $this -> db ->delete($fld);
					}
                }
				if($fld=="bodhitreebooks"){
					
					                 $file_ar=array();
									 if(!empty($row['meta_files'])){
									 	$file_ar=json_decode($row['meta_files'],TRUE);
									 }
									 if(!empty($file_ar)){
									 	for ($i=0; $i < count($file_ar) ; $i++) {
										 	 
											 if(file_exists('./'.$file_ar[$i])){
										 		@unlink('./'.$file_ar[$i] );
										 	  }	
											 
										}
									 	
									 }
					
				}	
			}
		}
		$this->db->where(array('post_meta'=>$fld,'meta_id'=>$id));	
		$return=$this->db->delete('seo_settings');
		
		$this->db->where('id',$id);	
		$return=$this->db->delete($fld);	
		return $return;
	}
	function change_status($fld,$id,$st){
		$this->db->where($id);
		$q=$this->db->update($fld,$st);
		return $q;
	}
	function insert_bulk($tbl,$data){
		
		$this->db->insert_batch($tbl, $data);
		
	}
	function get_find_in_set_contents($fld1,$id,$ref,$fld2){
		
		$re=$this->db->query("select a.id as post_id,a.content as slider_order,b.*,c.file as m_file from ".$fld1." a left join ".$fld2." b on find_in_set(b.id,REPLACE(a.".$ref.", '##', ',')) left join posts c on b.file=c.id where a.id=".$id." order by null" );
		
		return $re->result_array();
	}
	function delete_users($id){
		$this->db->where('id',$id);		
   		$query = $this -> db ->get('users');
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				if(file_exists("./".$row['file'])){
					@unlink("./".$row['file']);
				}
               
			}
		}
		
		$this->db->where('id',$id);	
		$return=$this->db->delete('users');	
		return $return;
	}
	
	function bulk_action_delete($fld,$ids){
		$ar_id=explode(",",$ids);
		$this->db->where_in('id',$ar_id);		
   		$query = $this -> db ->get($fld);
		
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				if(file_exists("./".$row['file'])){
					@unlink("./".$row['file']);
				}
				if(isset($row['meta_file'])&&$row['meta_file']!=""){
					
					
				}
				if(isset($row['mode'])&&$row['mode']=="category"&&isset($row['meta_mode'])&&$row['meta_mode']==$fld){
                	$this->db->where('category',$id);		
   		            $query = $this -> db ->update($fld,array('category'=>0));
					
					
                }
				if($fld=="cameella"){
					
					                 $file_ar=array();
									 if(!empty($row['meta_files'])){
									 	$file_ar=json_decode($row['meta_files'],TRUE);
									 }
									 if(!empty($file_ar)){
									 	for ($i=0; $i < count($file_ar) ; $i++) {
										 	 
											 if(file_exists('./'.$file_ar[$i])){
										 		@unlink('./'.$file_ar[$i] );
										 	  }	
											 
										}
									 	
									 }
					
				}	
				
			}
			
			
		}
		
		$this->db->where(array('post_meta'=>$fld));
		$this->db->where_in('meta_id',$ar_id);	
		$return=$this->db->delete('seo_settings');
		
		$this->db->where_in('id',$ar_id);	
		$return=$this->db->delete($fld);	
		return $return;
		
	}
	function user_bulk_action_delete($ids){
		
		$ar_id=explode(",",$ids);
		
		$this->db->where_in('id',$ar_id);		
   		$query = $this -> db ->get('users');
		
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				if(file_exists("./".$row['file'])){
					@unlink("./".$row['file']);
				}
			}
		}
		
		$this->db->where_in('id',$ar_id);	
		$return=$this->db->delete('users');	
		return $return;
		
	}
	
	function remove_image($tbl,$id,$remove=false,$col="file"){
		$this->db->where('id',$id);		
   		$query = $this -> db ->get($tbl);
		if($query->num_rows()>0&&$remove==true){
			foreach($query->result_array() as $row){
				if(file_exists("./".$row[$col])){
					@unlink("./".$row[$col]);
				}
			}
		}
		
		$this->db->where('id',$id);
		$this->db->update($tbl,array($col=>""));
		return true;
	}
	function update_file($tbl,$data_file,$where,$remove){
		
		if($remove==true){
			$this->db->where($where);		
	   		$query = $this -> db ->get($tbl);
			if($query->num_rows()>0){
				
				foreach($query->result_array() as $row){
					if(file_exists("./".$row['file'])){
						@unlink("./".$row['file']);
					}
				}
		    }
		}
		
		$this->db->where($where);
		$this->db->update($tbl,$data_file);
		return true;
	}
	function save_user($data){
		$query = $this -> db -> insert('users',$data);
   		return $query;
		
	}
	function check_field($tble,$field,$str,$id){
		
		$this->db->where('id !=',$id);	
		$this->db->where($field,$str);		
   		$query = $this -> db ->get($tble);
		if($query->num_rows()==1){
			return FALSE;
		}else{
			return TRUE;
		}
		
	}
	function get_media_file($id){
		
		$this->db->where('id',$id);	
   		$query = $this -> db ->get('posts');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}
	}
	function check_uniqueness($tbl,$where){
		$this->db->where($where);	
   		$query = $this -> db ->get($tbl);
		if($query->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	function save_get_id($tbl,$data){
		$query = $this -> db -> insert($tbl,$data);
   		return $this->db->insert_id();
		
	}
	function get_products_where_in($tbl,$where){
		 if(!empty($where)){
		    $this -> db -> select('a.*,b.file as m_file,b.meta_file as thumb,c.content as category_content,d.author as d_author,e.name as author_nme,(select AVG(custom_int) custom_int from comments WHERE post_id =a.id) as rating');	 		
	   		$this -> db -> from($tbl.' a');
			$this -> db -> join('posts b','a.file=b.id','left');
			$this -> db -> join('posts c','a.category=c.id','left');
			$this -> db -> join('watches d','a.id=d.b_id','left');
			//$this -> db -> join('posts e','d.author=e.id','left');
		    $this->db->where_in('a.id',$where);
			$re=$this->db->get();
			if($re->num_rows()>0){
				return $re->result_array();
			}else{
				return null;
			}
		}else{
			return null;
		}	
	}
	function get_order_contents(){
		    $this -> db -> select('a.*,p.name as product_name,g.name as package_name,b.meta_file as product_file,c.file as package_file');	 		
	   		$this -> db -> from('order a');
			$this -> db -> join('dque_products p','a.pid=p.id','left');
			$this -> db -> join('package g','a.pid=g.id','left');
			$this -> db -> join('posts b','p.file=b.id','left');
			$this -> db -> join('posts c','g.file=c.id','left');
			$re=$this->db->get();
			if($re->num_rows()>0){
				return $re->result_array();
			}else{
				return null;
			}
	}

}
?>
