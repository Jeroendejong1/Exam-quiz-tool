<?php


//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Start extends CI_controller {
	
	function __construct(){
	parent::__construct();
	$this->load->library('session');
	}
	
	public function home(){
		$title = 'Select exam';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		$this->load->view('header', $title);
		$this->load->view('home',$data);
		$this->load->view('footer');
		
		$_SESSION['examId'] = $this->input->post('exam');
		
		if(isset($_POST['submit'])){
			redirect('Start/instructions');
		}
	}

	public function instructions(){
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		$this->load->view('header');
		$this->load->view('examInstructions', $data);
		$this->load->view('footer');	
	}
	
	public function questionPage(){
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getQuestion();
		
		$this->load->view('header');
		$this->load->view('questionPage', $data);
		$this->load->view('footer');
	}
	
	
	public function question(){	
		$data = array(
			'question' => 'testtext'
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