<?php

class Login extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Administrator');
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	// checks data from login page
	function signin(){
		// get form input
		$email= trim($this->input->post('email'));
		$password= trim($this->input->post('password'));

		$query = $this->Administrator->processLogin($email,$password);
	
		// set form validation rules
		$this->form_validation->set_rules('email', 'email', 'required|callback_validateUser[' . $query->num_rows() . ']');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		// set error message
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Enter %s');
	
		// if input is incorrect, load login page 
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
		// go to examoverview if input is correct
		else{
			if($query){
				$query = $query->result();
				$admin = array(
					'id' => $query[0]->personID,
					'email' => $query[0]->email,
				);
				$this->session->set_userdata($admin);
					redirect('/Admin/examOverview');		
			}
		}
	}

	// Custom Validation Method
	public function validateUser($email,$recordCount){
		if ($recordCount != 0){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validateUser', 'Invalid %s or Password');
			return FALSE;
		}
	}
		
	// log out and destroy session
	function logout(){
		$this->session->sess_destroy();
		redirect('/Start/home');
	}
	
}
?>