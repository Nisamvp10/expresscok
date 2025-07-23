<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    function sitemap()
    {
    	header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap');
    }
}
