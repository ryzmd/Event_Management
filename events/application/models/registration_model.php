<?php

class registration_model extends CI_Model 
{

	function availablity($grpname)
	{
		$this->db->from('groups');
        $this->db->where('Name',$grpname );
        $result = $this->db->get()->result();

        if(count($result)==0)
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}

	function check_user($username,$event_id)
	{
		$this->db->from('user');
       	$this->db->where("username = '$username' AND usertype = 'others' ");
       	$result = $this->db->get()->result();
       	if(count($result)==0)
       	{
       		return false;
       	}
       	else
       	{
       		$this->db->from('group_participation as A, group_members as B');
       		$this->db->where("A.event_id = '$event_id' AND A.group_id = B.group_id AND B.username = '$username' ");
       		$result = $this->db->get()->result();
       		if(count($result)==0)
       		{
       			return true;
       		}
       		else
       		{
       			return false;
       		}
       	}

	}
	function register_group($group_name,$event_id,$members)
	{
		$data = array(
	        	       'leader' => $this->session->userdata('username'),
	            	   'Name' => $group_name
	            );

			$this->db->insert('groups', $data);


			$group_members = explode("#",$members);
			$group_members[0] = $this->session->userdata('username');

			$this->db->select("group_id");
			$this->db->from("groups");
			$this->db->where("Name = '$group_name' ");
			$result = $this->db->get()->result_array();

			for($i=0;$i<count($group_members);$i++)
			{
				$data1 = array(
						'group_id' => $result[0]['group_id'],
						'username' => $group_members[$i]
					);
				$this->db->insert('group_members', $data1);
			}

			$data2 = array(
	        	       'event_id' => $event_id,
	            	   'group_id' => $result[0]['group_id'],
	            	   'round' => '1'
	            );

			$this->db->insert('group_participation', $data2);

			return true;

	}

}
?>