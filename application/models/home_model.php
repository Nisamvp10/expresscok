<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{

     function __construct(){
    parent::__construct();
    $this->load->database();

  }
	function cr_captcha($data){

	   $re=$this->db->insert('captcha', $data);
	   return $re;
	}


  public function insertData($table,$data){
  if($table){
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }
}
	function check_captcha($word,$captcha_exp){
		$expiration = time()-$captcha_exp;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($word,$this->input->ip_address(),$expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
		    return FALSE;
		}else{
			return TRUE;
		}
	}
    function get_category_results($tbl,$id){
		$this->db->select('category');
		$this->db->from('products');
		$this->db->where($id);
		return $res= $this -> db -> get();


	}

	function userdata($table,$select,$con){
	    $this->db->select($select);
	    $this->db->from($table);
	    $this->db->where($con);
	    $query = $this->db->get();
	     $row=$query->row();
      return $row;
	}
	function get_tiles($where){

		$this->db->select("a.*,b.file as m_file,b.meta_content as alt_tag,b.content as segment");
		$this->db->from('posts a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($where);
		$this -> db -> order_by('cast(a.meta_mode as unsigned)','ASC');
		$query = $this -> db -> limit(6);
   		$query = $this -> db -> get();
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}

	}
	function get_slides_rows($where){
		$this->db->select("a.*,b.file");
		$this->db->from('posts a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($where);
		$query = $this -> db -> get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}

	}
	/*function get_suggested_authors(){
		$this->db->distinct();
		$this->db->select('a.meta_id as auth_id,b.*,c.file as m_file');
		$this->db->from('posts a');
		$this->db->join('posts b','a.meta_id=b.id','left');
		$this->db->join('posts c','b.file=c.id','left');
		$this->db->where('a.mode','suggestion');
		$this->db->where('a.status',0);
   		$query = $this -> db -> get();
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}
	}*/
    function get_suggestion($id){
    	$this->db->select('a.id as sugg_id,a.name as sug_title,a.content as sug_content,b.*,e.meta_file as thumb_file');
		$this->db->from('posts a');
		$this->db->join('products b','a.meta_file=b.id','left');
		//$this->db->join('books_details c','b.id=c.b_id','left');
		$this->db->join('posts d','b.category=d.id','left');
		$this->db->join('posts e','b.file=e.id','left');
		$this->db->where('a.mode','suggestion');
		$this->db->where('a.meta_id',$id);
		$this->db->where('a.status',0);
   		$query = $this -> db -> get();
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}


    }
	function get_slides($where){

		$query=$this->db->query("SELECT a.*,b.id as slides_id FROM posts a left join posts b on a.id=b.file WHERE a.id in(select file from posts where mode='slides' and find_in_set(id,REPLACE((select group_concat(content separator '##') from posts where mode='slider' and status=0 and id in(select meta_id from posts where ".$where.")), '##', ',') )) order by null");
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}

	}
	function get_de_contents($tbl,$id,$defualt="DESC",$field="id"){

		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get($tbl);
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}

	}
	function get_de_contents_limit($tbl,$id,$limit,$defualt="DESC",$field="id"){

		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
		$this ->db-> limit($limit);
   		$query = $this -> db -> get($tbl);
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}

	}
	function get_de_contents_subcategory($tbl,$id){

		$this->db->select("a.*,b.file as m_file,b.meta_file as thumb");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this -> db -> order_by("a.id","DESC");
   		$query = $this -> db -> get();
   		return $query->result_array();
	}



	function get_f_contents_both($tbl,$id,$both){
		$this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this->db->or_where('sub_category',$both);
		$this -> db -> order_by("a.id","DESC");
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_f_contents_both_count($tbl,$id,$both){
		$this->db->select("a.*");
		$this->db->from($tbl.' a');

		$this->db->where($id);
		$this->db->or_where('sub_category',$both);
		$this -> db -> order_by("a.id","DESC");
   		return $query = $this->db->count_all_results();

	}
	function get_f_contents_count($tbl,$id){
		$this->db->select("a.*");
		$this->db->from($tbl.' a');
		$this->db->where($id);
		$this -> db -> order_by("a.id","DESC");
   		return $query = $this->db->count_all_results();

	}

	function get_cat_content($tbl,$id,$defualt="DESC",$field="id"){
		$this->db->select('id,content');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get($tbl);
   		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return NULL;
		}
	}
	function get_sliders($id){

		$this->db->select("a.id as post_id,b.id as meta_post_id,b.content as slider_order,c.id as media_id,c.meta_content as video,d.*");
		$this->db->from('posts a');
		$this->db->join('posts b','a.meta_id=b.id','left');
		$this->db->join('posts c','find_in_set(c.id,REPLACE(b.content,"##",","))','left');
		$this->db->join('posts d','c.file=d.id','left');
		$this->db->where($id);
		$this->db->where("b.status",0);
		$this -> db -> order_by("a.id","DESC");
   		$query = $this -> db -> get();
   		if($query->num_rows()>0){
   			return $query->result_array();
		}else{
			return NULL;
		}



	}
	function get_category_sliders($id){

		$this->db->select("a.id as post_id,a.content as slider_order,c.id as media_id,c.name as slides_name,c.meta_content as video,d.*");
		$this->db->from('posts a');
		$this->db->join('posts c','find_in_set(c.id,REPLACE(a.content,"##",","))','left');
		$this->db->join('posts d','c.file=d.id','left');
		$this->db->where($id);
		$this->db->where("a.status",0);
		$this -> db -> order_by("id","DESC");
   		$query = $this -> db -> get();
   		if($query->num_rows()>0){

			return $query->result_array();
		}else{
			return NULL;
		}



	}
	public function get_rows_count($config)
	{


		if(isset($config[1])&&!empty($config[1])){
			$this->db->where($config[1]);
		}
		if(isset($config[2])&&!empty($config[2])){
			$this->db->where($config[2]);
		}
		if(isset($config[3])&&!empty($config[3])){
			$this->db->where($config[3]);
		}
		if(isset($config[4])&&!empty($config[4])){
			$this->db->where($config[4]);
		}
   		$query = $this -> db ->get($config[0]);
		return $query->result_array();


	}
	function get_contents($config)
 	{

		    $this -> db -> select('a.*,d.content as category_content,b.file as m_file,b.meta_file as thumb,(select AVG(custom_int) custom_int from comments WHERE post_id =a.id) as rating');

	   		$this -> db -> from($config[0].' a');

			$this -> db -> join('posts b','a.file=b.id','left');
		    $this -> db -> join('posts d','a.category=d.id','left');
			if(isset($config[3])&&!empty($config[3])){
			   $this->db->where($config[3]);
		    }
			if(isset($config[4])&&!empty($config[4])){
			   $this->db->where($config[4]);
		    }
			if(isset($config[5])&&!empty($config[5])){
			   $this->db->where($config[5]);
		    }
			if(isset($config[7])&&!empty($config[7])){
			   $this->db->where($config[7]);
		    }
	   		$this -> db -> limit($config[1],$config[2]);
			if(isset($config[6])&&$config[6]=="rating"){
			   $this -> db -> order_by('rating','DESC');
		    }elseif(isset($config[6])&&$config[6]=="high"){
			   $this -> db -> order_by('a.price','DESC');
		    }elseif(isset($config[6])&&$config[6]=="low"){
			   $this -> db -> order_by('a.price','ASC');
		    }else{
		    	$this -> db -> order_by('a.id','DESC');
		    }
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
    function get_contents_t($config)
 	{

		    $this -> db -> select('a.*,b.file as m_file,b.meta_file as thumb');

	   		$this -> db -> from($config[0].' a');

			$this -> db -> join('posts b','a.file=b.id','left');
			if(isset($config[3])&&!empty($config[3])){
			   $this->db->where($config[3]);
		    }
			if(isset($config[4])&&!empty($config[4])){
			   $this->db->where($config[4]);
		    }
			if(isset($config[5])&&!empty($config[5])){
			   $this->db->where($config[5]);
		    }
			if(isset($config[7])&&!empty($config[7])){
			   $this->db->where($config[7]);
		    }
	   		$this -> db -> limit($config[1],$config[2]);
			if(isset($config[6])&&$config[6]=="rating"){
			   $this -> db -> order_by('rating','DESC');
		    }elseif(isset($config[6])&&$config[6]=="high"){
			   $this -> db -> order_by('a.price','DESC');
		    }elseif(isset($config[6])&&$config[6]=="low"){
			   $this -> db -> order_by('a.price','ASC');
		    }else{
		    	$this -> db -> order_by('a.id','DESC');
		    }
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
	function delete_value($tbl,$where){

		$this -> db -> where($where);
		$re=$this->db->get('guest');
		if($re->num_rows()>0){
			$this -> db -> where($where);
			$this->db->delete($tbl);
			return TRUE;
		}else{
			return FALSE;
		}

	}
	function update_tbl($tbl,$where,$data){
		$this -> db -> where($where);
		$re=$this -> db -> update($tbl,$data);
    	return $re;
	}
	function confirm_user($email,$tm){
		$this -> db -> select('id,name,email,file');
   		$this -> db -> from('guest');
   		$this -> db -> where('email', $email);
   		$this -> db -> where('secure',$tm);
		$this -> db -> where('status',1);
   		$query = $this -> db -> get();
   		if($query -> num_rows() == 1)
   		{
	    		$query=$query->result_array();
				$this->save_contents('notification',array('uid'=>$query[0]['id'],'subject'=>'Email Verification Completed!','details'=>'Hi '.$query[0]['id'].', your email verification has been successfully completed. Thank you for registering in Bodhitreee Books. Start <a href="'.base_url().'">brows</a> now!','date'=>time(),'status'=>1));
	    		$this -> db -> where('email', $email);
		   		$this -> db -> where('secure',$tm);
				$this -> db -> where('status',1);
		   		$this -> db -> update('guest',array('secure'=>'','status'=>0));
    		    return true;
   		}
   		else
   		{
     		return false;
   		}

	}
	function login()
 	{


  		$this -> db -> select('id,name,email,file,pincode');
   		$this -> db -> from('guest');
   		$this -> db -> where('email', $this->input->post('username'));
   		$this -> db -> where('password',md5($this->input->post('password')));
		$this -> db -> where('status',0);
   		$query = $this -> db -> get();
   		if($query -> num_rows() == 1)
   		{
    		 $q=$query->result_array();
			 foreach($q as $row){

			 	$this->session->unset_userdata('user_session_data');
				$data=array('id'=>$row['id'],'username'=>$row['email'],'name'=>$row['name'],'pincode'=>$row['pincode'],'file'=>$row['file'],'sess_created'=>TRUE);
				$this->session->set_userdata('user_session_data',$data);

			 }

    		 return true;
   		}
   		else
   		{
     		return false;
   		}




	}
	function get_express_order($tbl,$ids){

		$this->db->select("*");
		$this->db->from($tbl);
		$this->db->where_in('name',$ids);
		$query = $this -> db -> get();
   		return $query->result_array();
	}
	function get_order_detail($ids){
		$this->db->select("*");
		$this->db->from('order_details');
		$this->db->where_in('order_id',$ids);
		$this->db->order_by('date',"DESC");
	    $this->db->order_by('time',"DESC");
		$query = $this -> db -> get();
   		return $query->result_array();
	}

    function get_f_contents($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_f_content_order($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.order_location as order_location b.order_description as order_description b.date as date b.time as time b.piece as piece");
		$this->db->from($tbl.' a');
		$this->db->join('order_details b','a.id=b.order_id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}

	function get_f_contents_count_blog($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,(select count(*) from posts d where a.id=d.meta_id) as cat_count");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}

	function get_products($where){
		$this -> db -> select('a.*,b.file as image');
	   	$this->db->from('products a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($where);
		$this -> db -> order_by("a.id","desc");
   		$query = $this -> db -> get();
   		return $query->result_array();
	}

	function get_category(){
		$this->db->select("*");
		$this->db->from('posts');
		$this->db->where('posts.meta_mode',"products");
		$this->db->where('posts.mode',"category");
		$query = $this -> db -> get();
   		return $query->result_array();
	}
	function get_subcategory(){
		$this->db->select("*");
		$this->db->from('posts');
		$this->db->where('posts.meta_mode',"products");
		$this->db->where('posts.mode',"subcategory");
		$query = $this -> db -> get();
   		return $query->result_array();
	}
	function get_f_contents_limit($tbl,$id,$limit){

	    $this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this -> db -> order_by("a.id","DESC");
		$this -> db -> limit($limit);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_f_content_count($tbl,$id){

    	$this->db->select("a.*,(select count(*) from products where a.id=products.category) as cat_count");
		$this->db->from($tbl.' a');
		$this->db->where($id);
		$this -> db -> order_by("a.id","DESC");
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_f_contents_limit_both($tbl,$id,$limit,$both){

		$this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this->db->or_where('category',$both);
		$this -> db -> order_by("a.id","DESC");
		$this -> db -> limit($limit);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_name_subcategory($tbl){
		$this->db->distinct();
		$this->db->select("a.sub_category");
		$this->db->from($tbl.' a');
		$query = $this -> db -> get();
   		return $query->result_array();
	}
	function get_f_contents_category($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file,c.name as category_name,c.content as category_content,(select AVG(custom_int) custom_int from comments WHERE post_id =a.id) as rating");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->join('posts c','a.category=c.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_ff_contents($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.file as m_file,c.file as mm_ffile");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->join('posts c','a.meta_file=c.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_ff_contents_limit($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.file as m_file,b.meta_file as thumb_file");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
		$this->db->limit(12);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function get_ff_contents_category($tbl,$id,$defualt="DESC",$field="a.id"){

	    $this->db->select("a.*,b.file as m_file,c.file as mm_ffile,d.name as category_name");
		$this->db->from($tbl.' a');
		$this->db->join('posts b','a.file=b.id','left');
		$this->db->join('posts c','a.meta_file=c.id','left');
		$this->db->join('posts d','a.category=d.id','left');
		$this->db->where($id);
		$this -> db -> order_by($field,$defualt);
   		$query = $this -> db -> get();
   		return $query->result_array();

	}
	function save_contents($tbl,$data){
		$this->db->insert($tbl,$data);
		return true;
	}

  function addto_wallet($tbl,$data){
     $userid = $this->session->userdata('login_id');
    $query = $this->db->query("SELECT SUM(amount) as amt FROM wallet WHERE client_id= $userid AND status = 2 ")->result();
    if (!empty($query[0]->amt))
     {
         $amount = $data['amount'];
         $sum = $query[0]->amt;
        $this->db->query("UPDATE wallet SET amount = $sum + $amount   WHERE client_id = $userid AND status = 2 ");
     }else{
         $this->db->insert($tbl,$data);
     }
     //echo $this->db->last_query();
 return true;
  		
  }
    function save_s_user($tbl,$data){
        $this->db->insert($tbl,$data);
		return $this->db->insert_id();
    }
	function save_contents_bulk($tbl,$data){
		$this->db->insert_batch($tbl,$data);
		return true;
	}
	function get_home_products(){
		$query=$this->db->query("SELECT a.id as cat_id,a.name as cat_name,c.file as m_file,b.id,b.name,b.title,b.price,b.offer FROM posts a LEFT JOIN chbazar b ON a.id=b.category left join posts c on b.file=c.id where a.mode='category' and a.meta_mode='chbazar' and a.status=0 and b.display=0 and b.status=0 order by a.id asc");
		return $query->result_array();
	}
	function get_last_30(){
		$this->db->select('*');
		$this->db->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY) AND NOW()');

		$result = $this->db->get('products');
	}
	function update_cart_contents($tbl,$data,$where){

		$this->db->where($where);
		$re=$this->db->get($tbl);
		if($re->num_rows()==1){
			$this->db->where($where);
			$this->db->update($tbl,$data);

		}else{
			$this->db->where($where);
			$this->db->delete($tbl);

			$this->db->insert($tbl,$data);
		}


		return true;
	}
	function get_where_in($tbl,$where){
		 if(!empty($where)){
		    $this -> db -> select('a.*,b.file as m_file,b.meta_file as thumb,c.content as category_content,(select AVG(custom_int) custom_int from comments WHERE post_id =a.id) as rating');
	   		$this -> db -> from($tbl.' a');
			$this -> db -> join('posts b','a.file=b.id','left');
			$this -> db -> join('posts c','a.category=c.id','left');
			//$this -> db -> join('products d','a.id=d.b_id','left');
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
	function get_order_contents($uid){
		    $this -> db -> select('a.*,p.name as product_name,p.title,p.dial_shape,p.warranty,p.dial_color,p.strap_color,p.strap_dimnension,p.dial_diamension,p.price,p.offer,p.shipping_charge,p.file, b.meta_file as product_file');
	   		$this -> db -> from('order a');
			$this -> db -> join('products p','a.pid=p.id','left');
			$this -> db -> join('posts b','p.file=b.id','left');
			$this->db->where_in('a.uid',$uid);
			$re=$this->db->get();
			if($re->num_rows()>0){
				return $re->result_array();
			}else{
				return null;
			}
	}
	function get_order_details($order_id){
		    $this -> db -> select('a.*,p.name as product_name,p.title,p.dial_shape,p.warranty,p.dial_color,p.strap_color,p.strap_dimnension,p.dial_diamension,p.price,p.offer,p.shipping_charge,p.file, b.meta_file as product_file');
	   		$this -> db -> from('order a');
			$this -> db -> join('products p','a.pid=p.id','left');
			$this -> db -> join('posts b','p.file=b.id','left');

		    $this->db->where_in('a.order_id',$order_id);
			$re=$this->db->get();
			if($re->num_rows()>0){
				return $re->result_array();
			}else{
				return null;
			}
	}


    function get_de_where_in($tbl,$where){
		 if(!empty($where)){
		    $this -> db -> select('*');
	   		$this -> db -> from($tbl);
		    $this->db->where_in('id',$where);
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
    function get_like($tbl,$like,$where=""){
    	     $query="";
    	     if(!empty($where))
    	     {
				$query='SELECT DISTINCT a.*,b.file as m_file,b.meta_file as thumb,c.meta_content as size_required FROM ('.$tbl.' a)
			            LEFT JOIN posts b ON a.file=b.id LEFT JOIN posts c ON a.category=c.id WHERE a.status = 0 AND a.category='.$where.' AND(find_in_set("'.str_replace('-',' ',$like).'",a.tags)
			            OR a.name LIKE "%'.str_replace('-',' ',$like).'%" OR a.title LIKE "%'.str_replace('-',' ',$like).'%" OR a.tags LIKE "%'.str_replace('-',' ',$like).'%" ) GROUP BY a.id';
			 }else{
			 	$query='SELECT DISTINCT a.*,b.file as m_file,b.meta_file as thumb,c.meta_content as size_required FROM ('.$tbl.' a)
			            LEFT JOIN posts b ON a.file=b.id LEFT JOIN posts c ON a.category=c.id WHERE a.status = 0 AND (find_in_set("'.str_replace('-',' ',$like).'",a.tags)
			            OR a.name LIKE "%'.str_replace('-',' ',$like).'%" OR a.title LIKE "%'.str_replace('-',' ',$like).'%" OR a.tags LIKE "%'.str_replace('-',' ',$like).'%" ) GROUP BY a.id';
			 }

			$re=$this->db->query($query);
			if($re->num_rows()>0){
				return $re->result_array();
			}else{
				return null;
			}

	}
	function delete_items($tbl,$where){
		$this->db->where($where);
		$this->db->delete($tbl);
		return TRUE;
	}

	function get_data($url) {
	  $ch = curl_init();
	  $timeout = 5;
	  $ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13';

	  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
	  //curl_setopt($ch, CURLOPT_NOBODY, true);
	  //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

    function check_mail_exist($email_id)
    {
    $this->db->select('email');
    $this->db->from('clients');
    $this->db->where('email',$email_id);
    // $this->db->where('user_type!=',2);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
    return 'false';
    }
    else
    {
    return 'true';
    }

    }

      function client_login($table,$select='*',$where = false){
    if($where){
      $this->db->select('clients_id,name,email,status');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->get()->row();
      //echo $this->db->last_query();
    }else{
     // $this->session->set_flashdata('fmsg','user Name or Password incorrect...!');
     // redirect('admin/login');
    }
  }

  public function getData($table,$select,$where){
    //$this->db->order_by($desc);
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($where);
    $query =  $this->db->get()->result();
    return $query;
    // $this->db->last_query();
  }

    public function entry_update($table,$where,$set) {
        $this->db->where($where);
        $this->db->update($table, $set);
        //return true;
        return ($this->db->affected_rows() > 0);

    }


}
?>
