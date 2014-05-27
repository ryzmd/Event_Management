<?php
class main extends CI_Controller
{
	public function __construct()
	{
		/*
			Checking if already a session exists,if exists then 
		*/
		parent::__construct();
		if(!$this->session->userdata('isLoggedIn'))
		{
			redirect('base_url("login/show_login")');
		}
	}
	function home_admin()
	{
		$this->load->view('home_admin');
	}
	function home_team()
	{
		$this->load->view('home_team');
	}
	function home()
	{
		$this->load->view('home');
	}
	function search_admin()
	{
			$this->load->view('search_admin');
	}

	function search_team()
	{
		$this->load->view('search_team');
	}
}
?>