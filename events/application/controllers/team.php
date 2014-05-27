<?php
class team extends CI_Controller
{
	public function __construct()
	{
		
		//	Checking if already a session exists,if exists then 
		
		parent::__construct();
		if(!$this->session->userdata('isLoggedIn'))
		{
			redirect('/login/show_login');
		}
	}
    function view_events_team(){
    	$this->load->model('events_model');
		$data['data']=$this->events_model->get_events_data();
    	$this->load->view('update_group_view.php',$data);
    }
    function event_members(){
    	$this->load->model('team_model');
    	$event_id=$this->input->post('event_id');
    	$data=$this->team_model->events_members_data($event_id);
    	header('Content-Type: application/json');
    	echo json_encode($data);

    }
    function view_team_profile(){
    	$u_name=$this->session->userdata('username');
		$this->load->model('user_details');
		////////////////////////////////*change this*////////////////////////////////
		$data['data']=$this->user_details->get_user_data($u_name);
		$this->load->view('profile_team',$data);

    }
    function update_group_round(){
    	$this->load->model('team_model');
    	$event_id=$this->input->post('event_id');
    	$group_id=$this->input->post('group_id');
    	$round=$this->input->post('round');
    	$result=$this->team_model->update_group_round($event_id,$group_id,$round);
    	if($result==true){
    		echo 'done';
    	}
    	else{
    		echo 'true';
    	}
	}
	function get_team_name()
	{
		$this->load->model('team_model');
		$tmembers_id=$this->input->post('username');
		//if($tmembers_id=''){
		//echo $tmembers_id;
		//}
		$team_name=$this->team_model->get_teams_name($tmembers_id);
		header('Content-Type: application/json');
		echo json_encode($team_name);
	}

}
?>