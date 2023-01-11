<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index()
	{	
        
        $data = array(
			"title" => "Desenvolvimento de Sites - Stechz Stúdio",
			"nav" => "website/template/nav",
            "contato" => "website/contato"
		);

		$this->template->pages('website/dev-sites',$data,true);
    }
	
}