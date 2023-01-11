<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siteinfo_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
        $this->load->database();
    }

    public function get_info($active){
        $this->db
        ->select('*')
        ->from('cabecalho')
        ->where('active',$active);

        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result;
        }else{
            return NULL;
        }
    }

}