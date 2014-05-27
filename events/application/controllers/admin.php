<?php
class admin extends CI_Controller
{	
	public function __construct()
	{
		/*
			Checking if already a session exists,if exists then 
		*/
		parent::__construct();
		if(!$this->session->userdata('isLoggedIn'))
		{
			redirect('/login/show_login');
		}
	}
	/*
		This loads view of adding a team member
	*/
	function view_add_team()
	{
		$this->load->view('admin_add_team');
	}


	/*
		This loads view of adding a participants
	*/
	function view_add_event()
	{
		$this->load->view('admin_add_event');
	}

	/*
		function to insert a value of team member into db
		pass the data to model admin_model
		in admin_model the function name is add_team
	*/
	function add_team()
	{
		$this->load->model('admin_model');
		$name=$this->input->post('name');
		$username=$this->input->post('username');
		$phone=$this->input->post('phone');
		$details=$this->input->post('details');
		$team_name=$this->input->post('team_name');
		//echo $phone;
		$status=$this->admin_model->add_team($username,$name,$phone,$details,$team_name); 
		echo $status;
	}

	function check_team_available()
	{
		$this->load->model('admin_model');
		$username=$this->input->post('username');
		$status=$this->admin_model->availablity($username);
		echo $status;
	}
}
