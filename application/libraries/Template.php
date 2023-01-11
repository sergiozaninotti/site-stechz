<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
 
		function show($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('dashboard/template/header',$data);
 
			// Load content
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('dashboard/template/footer',$data);
 
			// Scripts
			$CI->load->view('dashboard/template/scripts',$data);
		}

		function pages($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('website/template/header',$data);
 
			// Load content
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('website/template/footer',$data);
 
			// Scripts
			$CI->load->view('website/template/scripts',$data);
		}
	
}
 