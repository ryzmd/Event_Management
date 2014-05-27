<?php

class participant extends CI_Controller{

	function event_history()
	{
		$u_name=$this->session->userdata('username');
		$this->load->model('event_history');
		$data['data']=$this->event_history->events_history($u_name);
		//echo "<pre>";
		//print htmlspecialchars(print_r($data));
		//echo"thu<br>";
		//if(isset($data["data"][0]))
		//{
		//	print_r($data["data"][0]);
		//}
		$this->load->view('events_history',$data);
		//print_r($events);

	}
	function view_profile()
	{
		$u_name=$this->session->userdata('username');
		$this->load->model('user_details');
		$data['data']=$this->user_details->get_user_data($u_name);
		$this->load->view('profile_participant',$data);
	}
	

	function search_results()
	{
		//$table='user';
		//$search_option='k';
		$table=$this->input->post('table');
		$search_option=$this->input->post('search_option');
		$this->load->model('event_history');
		$data['data']=$this->event_history->search_results($table, $search_option);
		//print_r($data);
		//echo 1;
		header('Content-Type: application/json');
		echo json_encode($data);

		//echo $table.'='.$search_option;
	}
	function friends()
	{
		$u_name=$this->session->userdata('username');
		$this->load->model('event_history');
		$data['data']=$this->event_history->friends($u_name);
		
			$this->load->view('friends',$data);
		//print_r($data);
		
	}
	function add_friend()
	{
		$u_name=$this->session->userdata('username');
		$user2=$this->input->post('user2');
		$this->load->model('event_history');
		$this->event_history->add_friend($u_name,$user2);
		$data['data']=$this->event_history->friends($u_name);
		
			$this->load->view('friends',$data);
			echo 1;
		//print_r($data);
		
	}



	function ajax_search_users()
	{
		$this->load->model('events_model');
		$user=$this->input->post('user');
		//echo $event;
		$data=$this->events_model->ajax_get_user_data($user);

		header('Content-Type: application/json');
		echo json_encode($data);

	}

	function ajax_search_events()
	{
		$this->load->model('events_model');
		$event=$this->input->post('event');
		//echo $event;
		$data=$this->events_model->ajax_get_events_data($event);

		header('Content-Type: application/json');
		echo json_encode($data);
		//echo 1;
	}

	function check_already_friends()
	{
		$user1=$this->input->post('user1');
		$user2=$this->input->post('user2');
		$this->load->model('event_history');
		$data=$this->event_history->check_friends($user1,$user2);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function friend_request()
	{
		$user1=$this->session->userdata('username');
		$user2=$this->input->post('user2');
		$this->load->model('event_history');
		/*$data['data']=*/ $this->event_history->friend_request($user1, $user2);
		
		return true;
			//$this->load->view('friends',$data);
		//print_r($data);
	
	}

	function event_view()
	{
		$this->load->model('events_model');
		$data['data']=$this->events_model->get_events_data();
		$this->load->view('event_register',$data);
	}

	function find_participants()
	{
		$this->load->model('events_model');
		$event_id=$this->input->post('event_id');
		$data=$this->events_model->get_participants($event_id);
		header('Content-Type: application/json');
		echo json_encode($data);

		//$this->load->view('participants_list',$data);
	}


}