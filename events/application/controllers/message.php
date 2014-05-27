<?php
class message extends CI_Controller
{	
	
	function message_put()
	{
		
		$sent_user=$this->session->userdata('username');
		$recv_user=$this->input->POST('user2');
		$body=$this->input->POST('msg');
		$this->load->model('event_history');
		$data=$this->event_history->message_put($sent_user,$recv_user, $body);
		header('Content-Type: application/json');
		echo json_encode($data);

		
		//$this->event_model->message_put($sent_user,$recv_user, $body);
		//return true;
	}
	
}?>