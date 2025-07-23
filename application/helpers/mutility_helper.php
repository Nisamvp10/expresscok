<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function resource($parm="")
	{
			if($parm!=""){
				 return base_url()."resource/".$parm."/";
			}else{
				return base_url()."resource/";
			}
		
	}
	function base_url_slashless(){
		
		return rtrim(base_url(),"/");
	}
    function auto_version($file)
	{
		
		
	  if(strpos($file, '/') !== 0 || !file_exists(FCPATH.$file))
	    return base_url_slashless().$file;
	
	  $mtime = filemtime(FCPATH . $file);
	  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1",base_url_slashless().$file);
	  
	}

    function filter_vulnerablity($string){
    	
    	 $string= preg_replace('/<script[^>]*>[\s\S]*?/i', '', $string);
    	 $string= preg_replace('/[\s"\'`;\/0-9\=\x0B\x09\x0C\x3B\x2C\x28]+on\w+[\s\x0B\x09\x0C\x3B\x2C\x28]*=/i', '', $string);
		 $string= preg_replace('/(?:=|U\s*R\s*L\s*\()\s*[^>]*\s*S\s*C\s*R\s*I\s*P\s*T\s*:/i', '', $string);
		 $string= preg_replace('/%[\d\w]{2}/i','', $string);
		 $string= preg_replace('/&#[^&]{2}/i','', $string);
		 $string= preg_replace('/&#x[^&]{3}/i','', $string);
		 $string= preg_replace('/&colon;/i','', $string);
		 $string= preg_replace('/[\s\S]src[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]data:text\/html[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]xlink:href[\s\S]/i','', $string);
		 $string= preg_replace('/[\s\S]base64[\s\S]/i','', $string);
		 $string= preg_replace('/[\s\S]xmlns[\s\S]/i','', $string);
		 $string= preg_replace('/[\s\S]xhtml[\s\S]/i','', $string);
         $string= preg_replace('/[\s\S]href[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]style[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]formaction[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]@import[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]!ENTITY.*?SYSTEM[\s\S]/i', '', $string);
		 $string= preg_replace('/[\s\S]pattern(?=.*?=)[\s\S]/i', '', $string);
         $string= preg_replace('/<style[^>]*>[\s\S]*?/i', '', $string);
		 $string= preg_replace('/<applet[^>]*>[\s\S]*?/i', '', $string);
		 $string= preg_replace('/<meta[^>]*>[\s\S]*?/i', '', $string);
		 $string= preg_replace('/<form[^>]*>[\s\S]*?/i', '', $string);
		 $string= preg_replace('/<isindex[^>]*>[\s\S]*?/i', '', $string);
		 $string= preg_replace('/<object[^>]*>?[\s\S]*?/i', '', $string);
         $string= preg_replace('/<embed[^>]*>?[\s\S]*?/i', '', $string);
		 $string= preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
		 
		 
         return $string;
    }
