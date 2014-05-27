<?php

class team_model extends CI_Model
{
	function events_members_data($event_id)
	{
		$this->db->from('group_participation as A, groups as B, competition_type as C');
		$this->db->where("A.event_id = '$event_id' AND A.group_id = B.group_id AND A.event_id = C.event_id");
			//$query=$this->db->query("select * from group_participation where event_id='$event_id'");
		$data=$this->db->get()->result_array();
		return $data;
	}
	function update_group_round($event_id,$group_id,$round){
		$query=$this->db->query("update group_participation set round= '$round' where (group_id= '$group_id' AND event_id= '$event_id');");	
		return $query;
	}
	function get_teams_name($tmembers_id)
	{
		$this->db->select('team');
		$this->db->from('team_members');
		$this->db->where("tmembers_id = '$tmembers_id' ");
		$teams_data=$this->db->get()->result_array();
		

		return $teams_data;
	}
}  



?>