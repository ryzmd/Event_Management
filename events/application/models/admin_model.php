<?php

class admin_model extends CI_Model 
{
	function add_team($username,$name,$phone,$details,$team_name)
	{
		$data['username']=$username;
    if($name!='' && $team_name != '' && $phone != '' && $details != '')
    {
      $details_array['name']=$name;
       
      $phone_multi=explode(',',$phone);
       
      $details_array['team_name']=$team_name;
      $details_array['details']=$details;
    }

		$data['password']='test';
		$data['usertype']='team';

		if ( $this->db->insert('user',$data)) 
		{
        //for($i=0;$i<sizeof($phone_multi);$i++) 
        //{
           // $phone_array['username']=$username;
            //$phone_array['phone']=$phone_multi[$i];
           // $this->db->insert('phone',$phone_array);
        //}
        
      		return true;
   	} 
   		else 
   		{
   		 	return false;
   		 }
	}

	function availablity($username)
	{
		$this->db->from('user');
        $this->db->where('username',$username );
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