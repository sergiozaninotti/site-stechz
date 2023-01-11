<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index()
	{	
		redirect('valeapena');
	}

	public function valeapena()
	{	

		$data = array(
			"title" => "Projeto Vale a Pena - Stechz Stúdio",
			"nav" => "website/template/nav",
			"contato" => "website/contato"
		);

		$this->template->pages('website/valeapena',$data,true);
	}

	public function credsoft()
	{	

		$data = array(
			"title" => "Projeto CredSoft - Stechz Stúdio",
			"nav" => "website/template/nav",
			"contato" => "website/contato"
		);

		$this->template->pages('website/credsoft',$data,true);
	}
	
}