<?php
class Providers_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
public function get_providers()
{
    //$this->load->library('database');
    $this->db->select("fp.provider_first_name, 
            fp.provider_last_name,
            fp.group_name");
    $this->db->from("fct_providers as fp");
    $this->db->where('fp.fk_group_id', 7);
    $query = $this->db->get();
    $result = $query->result();  
    return $data= $query->result();
    //print_r($data);
    }
}

