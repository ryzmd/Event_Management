<?php

class event_history extends CI_Model 
{
	function events_history($u_name)
	{
		$this->db->select("A.round, B.event_name");
		$this->db->from("solo_participation as A, events_details as B");
		$this->db->where("A.username = '$u_name' AND A.event_id= B.event_id");
		$solo=$this->db->get()->result_array();

		$this->db->select("K.Name, N.event_name, M.round");
		$this->db->from("events_details AS N, groups AS K, group_members AS L, group_participation AS M");
		$this->db->where("M.group_id = L.group_id AND L.username =  '$u_name' AND K.group_id = M.group_id AND M.event_id = N.event_id");
		$group=$this->db->get()->result_array();

		$data= array(
			'solo'=>$solo,
			'group'=>$group);
		//$data=$datas->result_array();
		return $data;
	}

	function search_results($table, $search_option)
	{
		if($table=="user")
		{
			$this->db->select("username");
			$this->db->from("user_details");
			$this->db->where("username like '%".$search_option."%'");
			$data=$this->db->get()->result_array();
			return $data;
		}
		if($table=="event")
		{
			$this->db->select("event_name,event_id");
			$this->db->from("events_details");
			$this->db->where("event_name like '%".$search_option."%'");
			$data=$this->db->get()->result_array();
			return $data;
		}
	}
	function friends($u_name)
	{
		$this->db->select("user1");
		$this->db->from("friends as A");
		$this->db->where("user2 = '$u_name'  AND status = 2");
		$f1=$this->db->get()->result_array();

		$this->db->select("user2");
		$this->db->from("friends as A");
		$this->db->where("user1 = '$u_name' AND status = 2");
		$f2=$this->db->get()->result_array();

		$this->db->select("user1");
		$this->db->from("friends");
		$this->db->where("user2 = '$u_name' AND status=1");
		$f3=$this->db->get()->result_array();

		$data = array('f1' => $f1,'f2' => $f2, 'f3' => $f3);
		//$data=$datas->result_array();
		return $data;
	}
	function add_friend($u_name,$user2)
	{
		$data = array(
        	       'user1' => $user2,
            	   'user2' => $u_name,
               		'status' => 2
            );

		$this->db->where("user2 = '$u_name' AND user1= '$user2'");
		$this->db->update('friends', $data); 
	}
	

	function check_friends($user1,$user2)
	{
		
		$this->db->from('friends');
		//$this->db->where("(user1 = '$user1' AND user2= '$user2') OR (user1 = '$user2' AND user2= '$user1')");
		$this->db->where("(user1 = '$user1' AND user2= '$user2' AND status=1)");
		//you've already sent a request
		$status=$this->db->get()->result_array();
		if($status==NULL)
		{
			
			$this->db->from('friends');
			//$this->db->where("(user1 = '$user1' AND user2= '$user2') OR (user1 = '$user2' AND user2= '$user1')");
			$this->db->where("(user2 = '$user1' AND user1= '$user2' AND status=1)");
			//you've already sent a request
			$status=$this->db->get()->result_array();
			if($status==NULL)
			{
				$this->db->from('friends');
				//$this->db->where("(user1 = '$user1' AND user2= '$user2') OR (user1 = '$user2' AND user2= '$user1')");
				$this->db->where("((user2 = '$user1' AND user1= '$user2') OR (user1 = '$user1' AND user2= '$user2') )AND status=2");
				//you've already sent a request
				$status=$this->db->get()->result_array();
				if($status==NULL)
				{
					//not friends. send request
					return 3;
				}
				else
				{
					//already firends
					return 4;
				}

			}
			else
			{
				//you have a request from user2, accept or not.
				return 2;
			}

		}
		else
		{
			//you've already sent a request
			return 1;

		}

		//return $status;

				/*$t="08:08:08";
		$d="2014-02-14";
		$data = array (
				'sent_user' => $user1,
				'recv_user' => $user2,
				'body' => "ashjfdjhasdfkjhfdsjhgsdfkgjsfahg",
				'date' => $date,
				'time' => $time
			);
		return ($this->db->insert('message',$data));*/
	}


	function friend_request($user1,$user2)
	{
		$data = array(
        	       'user1' => $user1,
            	   'user2' => $user2,
               		'status' => 1
            );

		$this->db->insert('friends', $data); 
	
	}

}
?>