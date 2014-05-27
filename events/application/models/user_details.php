<?php

class user_details extends CI_Model 
{
	function get_user_data($u_name)
	{
		$this->db->from("user_details");
		$this->db->where("username = '$u_name' ");
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;
	}
}
