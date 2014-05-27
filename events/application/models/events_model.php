<?php

class events_model extends CI_Model 
{
	function get_events_data()
	{
		$this->db->from("events_details");
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;
	}

	function ajax_get_events_data($event)
	{
		$this->db->from("events_details");
		$this->db->where('event_id',$event);
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;
	}

	function ajax_get_user_data($user)
	{
		$this->db->from("user_details");
		$this->db->where('username',$user);
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;
	}
	function add_event($event_name,$event_disc,$type_id, $start_time, $duration, $location,$date, $managed_by,$round)
	{
		if($type_id=='Show')
		{
			$data = array(
	        	       'event_name' => $event_name,
	            	   'event_disc' => $event_disc,
	            	   'type_id' => $type_id,
	            	   'start_time' => $start_time,
	            	   'duration' => $duration,
	            	   'location' => $location,
	            	   'date' => $date,
	            	   'managed_by' => $managed_by
	            );

			$this->db->insert('events_details', $data);
		}
		if($type_id=='comp')
		{
			$data = array(
	        	       'event_name' => $event_name,
	            	   'event_disc' => $event_disc,
	            	   'type_id' => 'competition',
	            	   'start_time' => $start_time,
	            	   'duration' => $duration,
	            	   'location' => $location,
	            	   'date' => $date,
	            	   'managed_by' => $managed_by
	            );

			$this->db->insert('events_details', $data);

			$this->db->select("event_id");
			$this->db->from("events_details");
			$this->db->where("event_name = '$event_name'");
			$data1=$this->db->get()->result_array();
			$data2 = array (
				'event_id' => $data1[0]['event_id'],
				'type' => 'group',
				'rounds' => $round
				);
			$this->db->insert('competition_type', $data2);

		}
		return $data1[0]['event_id'];
	}

function get_participants($event_id)
	{
		$this->db->select("B.username");
		$this->db->from(" group_participation AS A, group_members AS B, groups AS C ");
		$this->db->where("A.event_id = '$event_id' AND A.group_id = B.group_id AND A.group_id = C.group_id ");
		$data=$this->db->get()->result_array();
		//$data=$datas->result_array();
		return $data;
	}
	

}
