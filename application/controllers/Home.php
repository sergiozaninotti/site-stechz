<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index()
	{	

		$data = array(
			"title" => "Stechz Studio - Criação de Sites Incríveis",
			"nav" => "website/template/nav",
			"contato" => "website/contato"
		);

		$this->template->pages('website/home',$data,true);
	}
	
}