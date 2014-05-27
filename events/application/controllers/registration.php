<?php
class registration extends CI_Controller
{
	function view_registration()
	{
		$this->load->view('view_registration');
	}	

	function check_groupname()
	{
		$this->load->model('registration_model');
		$grpname=$this->input->post('name');
		$status=$this->registration_model->availablity($grpname);
		echo $status;
	}

	function check_user()
	{
		$username=$this->input->post('username');
		$event_id=$this->input->post('event_id');

		$this->load->model('registration_model');

		$status=$this->registration_model->check_user($username,$event_id);
		echo $status;
	}
	function submit()
	{
		$event_id=$this->input->post('event_id');
		$members=$this->input->post('members');
		$group_name=$this->input->post('group_name');

		/*$event_id = '1';
		$members = '#yuvi#sonia.gandhi';
		$group_name = 'AAP';*/

		$this->load->model('registration_model');

		$status=$this->registration_model->register_group($group_name,$event_id,$members);
		print_r($status);
	}
}
?>