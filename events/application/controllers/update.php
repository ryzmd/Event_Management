<?php
class update extends CI_Controller
{
	function post_post()
	{
		$this->load->view('post_post');
	}
	function insert_post()
	{
		$post=$this->input->post('post');
		$username=$this->session->userdata('username');
		$this->load->model('update_model');
		$this->update_model->post($post,$username);
		echo $post;
	}

	function post_view()
	{
		$this->load->view('post_view');
	}

	function get_post()
	{
		$this->load->model('update_model');
		$data=$this->update_model->get_post();
		//print_r($data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}

?>