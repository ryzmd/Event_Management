<?php
class events extends CI_Controller
{

	public function __construct()
	{
		/*
			Checking if already a session exists,if exists then 
		*/
		parent::__construct();
		
	}
	function view_events()
	{
		$this->load->model('events_model');
		$data['data']=$this->events_model->get_events_data();
		$this->load->view('events_view',$data);
	}


	function add_events()
	{
		$this->load->model('events_model');
		$event_name=$this->input->post('name');
		$event_disc=$this->input->post('descripition');
		$type_id=$this->input->post('type');
		$start_time=$this->input->post('starttime');
		$location=$this->input->post('location');
		$duration=$this->input->post('duration');
		$date=$this->input->post('date');
		$managed_by=$this->input->post('team');
		$round=$this->input->post('round');
		//$desc=$this->input->post('name');
		$status=$this->events_model->add_event($event_name,$event_disc,$type_id, $start_time, $duration, $location,$date, $managed_by,$round);
		echo json_encode($status);
	}

	
}
