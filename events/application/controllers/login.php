<?php
/*
 We have User authentication and logout functions 
*/
class login extends CI_Controller 
{
        /*
                index functions see if a session exists already if exists then it redirects to home page or 
                else to login page
        */

        function index()
        {
                if($this->session->userdata('isLoggedIn'))
                {
                        $usertype=$this->session->userdata('usertype');
                        if($usertype=='admin')
                        {
                                redirect(base_url('main/home_admin'));
                        
                        }
                        if($usertype=='team')
                        {
                                redirect(base_url('main/home_team'));
                        
                        }
                        if($usertype=='others')
                        {
                                redirect(base_url('main/home'));
                        
                        }
                }
                else
                {
                        $this->load->view('test');
                }
        }

        /*
                When user click submit button this function is called.We will load model and pass on the data 
                from user to model to function validate_user in model according to the usertype we will redirect
                to the respective pages if the validate_user function returns true or else show login page with 
                an error
        */

	function login_check()
	{
		$this->load->model('login_check');
		$username = $this->input->post('username');
                 $pass  = $this->input->post('password');
                $usertype= $this->input->post('usertype');

                 if($username && $pass && $this->login_check->validate_user($username,$pass,$usertype))
                 {
                    echo $usertype;
        	       if($usertype=='admin')
        	       {
        		      redirect(base_url('main/home_admin'));
        		
        	       }
        	       if($usertype=='team')
        	       {
        		     redirect(base_url('main/home_team'));
        		
        	       }
        	       if($usertype=='others')
        	       {
        		       redirect(base_url('main/home'));
        		
        	       } 
                }
                else
                {
        	       $this->show_login();
                }
	}


        /*
                If the user authentication is false then login function calls this function  and passed error
                to login page to show error
        */
        function show_login()
        {
                $data['error'] = false;
                $this->load->view('test',$data);
        }

        /*
                Logout function is to destroy session and we will redirect to login page
        */
	function logout()
	{
		 $this->session->sess_destroy();
                 $this->index();
		// $this->load->view('test');
	}
    function register()
    {
        $this->load->view("view_register");
    }

}