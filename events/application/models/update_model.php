<?php

class update_model extends CI_Model 
{
	function post($post,$username)
	{
		$t=time();
		$d=date("Y-m-d",$t);
		$t2=date("H:i:s",$t);
		
		$data = array(
        	       'post' => $post,
            	   'username' => $username,
            	   'post_date' => $d,
            	   'post_time' => $t2
               		
            );

		$this->db->insert('post', $data); 
	
	}

	function get_post()
	{
		$this->db->from("post");
		$this->db->order_by("post_id","desc");
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;

		//$this->db->query("select * from post");
	}
}

?>