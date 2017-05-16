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
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$data['questionCount'] = count($data['examData']);		//fix
		
		$this->load->view('header',$data);
		$this->load->view('examInstructions', $data);
		$this->load->view('footer');	
	}
	
	public function questionPage(){
		
		$currentIndex = $this->uri->segment(3);
		$next = $currentIndex +1;
		$previous = $currentIndex-1;
		// check post data
		if(isset($_POST['btnPrev'])) {
			$currentIndex = $this->uri->segment(3) -1;
			$next = $currentIndex +1;
			$previous = $currentIndex-1;
		}
		elseif(isset($_POST['btnStop'])) {

		}
		elseif(isset($_POST['btnNext'])) {
			$currentIndex = $this->uri->segment(3)+1;
			$next = $currentIndex +1;
			$previous = $currentIndex-1;
		}
		
		$data['currentIndex'] = $currentIndex;
		$data['next'] = $next;
		$data['previous'] = $previous;
		
		$data['title'] = 'Quiz';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getAllQuestionsByExam($_SESSION['examId']);
		
		$this->load->view('header',$data);
		$this->load->view('questionPage', $data);
		$this->load->view('footer');
	}
	
	private function getAllQuestionData(){
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