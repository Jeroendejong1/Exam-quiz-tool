<?php

//sources:
//https://code.tutsplus.com/tutorials/an-introduction-to-views-templating-in-codeigniter--net-25648

//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Start extends CI_controller {
	
	public function index(){					//by visiting index.php/start/index
		$data = array(
			'title'	=>	'Select exam'			//give variable $title the value "Select exam"
		);
		$this->load->view('header', $data);		//load the header and include the variables inside $data array
		$this->load->view('home', $data); 		//load home.php in views-folder + $data array
		$this->load->view('footer');			//load the footer	
	}

	public function instructions(){
		$this->load->view('header');
		$this->load->view('examInstructions');
		$this->load->view('footer');	
	}
	
	public function question(){	
		$data = array(
			'question' => 'testtext' //hier koppeling maken met model
		);
		$this->load->view('header');
		$this->load->view('question', $data);
		$this->load->view('footer');
	}
	
	public function result(){	
		$this->load->view('header');
		$this->load->view('result');
		$this->load->view('footer');
	}
}

?>