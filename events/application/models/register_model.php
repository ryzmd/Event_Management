<?php
class register_model extends CI_Model{
   function add_user($name,$username,$password,$address,$phone,$email,$age,$gender){
   		$usertype='others';
   		$query=false;
   		$query1=false;
   		$query2=false;
   		$this->db->from('user');
        $this->db->where('username',$username );
   		$query = $this->db->get()->result();

        if(count($query)==0)
        {
        	$query1=$this->db->query("insert into events.user (username,usertype,password) values ('$username','$usertype','$password')");
   			if($query1==true){
				$query2=$this->db->query("insert into user_details (username,Name,Age,Gender,Address,Email,phone) values ('$username','$name','$age','$gender','$address','$email','$phone')");   		
			}
			return $query2;
        }
        else
        {
        	return 'Username already exists';
        }
   		
   }
 

}


















?>