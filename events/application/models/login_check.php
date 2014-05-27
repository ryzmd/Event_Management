<?php


class login_check extends CI_Model 
{
	var $details;
	function validate_user($username,$password,$usertype)
	{
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('usertype',$usertype);
		$login=$this->db->get()->result();

		if(is_array($login) && count($login) == 1)
		{
			
			 $this->details = $login[0];

			$this->set_session();
			return true;
		}
	}

	function set_session()
	{
		// setting session when the login credintials given by the user or true
		// set_userdata is function CI
		$this->session->set_userdata( array(
				'username'=>$this->details->username,
				'isLoggedIn'=>true,
				'usertype'=>$this->details->usertype));
	}
}