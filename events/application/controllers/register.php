<?php
/*
 register functions
*/
class register extends CI_Controller 
{
	function check_team_available()
	{
		$this->load->model('admin_model');
		$username=$this->input->post('username');
		//echo $username;
		$status=$this->admin_model->availablity($username);
		echo $status;
	}
	 function register_done()
    {
        $this->load->model('register_model');
        $name=$this->input->post('name');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $address=$this->input->post('address');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $age=$this->input->post('age');
        $gender=$this->input->post('gender');
        if($gender=='male'){
        	$gender=1;
        }
        if($gender=='female'){
        	$gender=2;
        }
        if($gender=='others'){
        	$gender=3;
        }
        $status=$this->register_model->add_user($name,$username,$password,$address,$phone,$email,$age,$gender);
        if($status=true)
        {
        $this->load->view('test.php');
    	}
    	else
    	{
    		$this->load->view('error.php',$status);
    	}
    }
}
