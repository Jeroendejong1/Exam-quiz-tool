<?php


//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Start extends CI_controller {
	
	function __construct(){
	parent::__construct();
	$this->load->library('session');
	}
	
	public function index(){
		$data['title'] = 'Select exam';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		$this->load->view('header', $data);
		$this->load->view('home',$data);
		$this->load->view('footer');
		
		$_SESSION['examId'] = $this->input->post('exam');
		
		if(isset($_POST['submit'])){
			redirect('Start/instructions');
		}
	}

	public function instructions(){
		$data['title'] = 'Instructions';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		
		
		$data['questionCount'] = count($data['examData']);		//fix
		
		$this->load->view('header',$data);
		$this->load->view('examInstructions', $data);
		$this->load->view('footer');	
	}
	
	public function questionPage(){
		$data['title'] = 'Quiz';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamData();
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getAllQuestions();
		
		$this->load->view('header');
		$this->load->view('questionPage', $data);
		$this->load->view('footer');
	}
	
	private function getQuestionData2(){
		$this->load->model('Question');
		$result = $this->Question->getAllQuestions();
		return $result;
	}
	
	public function question(){	
		$id = $_SESSION['examId'];
		$data['questionData'] = $this->getAllQuestionData();
		foreach ($data['questionData'] as $row){
			if($row->examID == $id){
				$questions[] = $row;
			
				$data['answers'] = array($row->correctans1, $row->correctans2, $row->correctans3, $row->wrongans1,
									$row->wrongans2, $row->wrongans3, $row->wrongans4, $row->wrongans5);
			}
		}	

		$data = array(
			'question' => 'testtext',
			'title' => 'Quiz'
		);
		$this->load->view('header', $data);
		$this->load->view('question', $data);
		$this->load->view('footer');
	}
	
	public function result(){
		$data['title'] = 'Result';
		$this->load->view('header',$data);
		$this->load->view('result');
		$this->load->view('footer');
	}
}

?>