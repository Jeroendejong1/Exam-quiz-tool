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
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getAllQuestionsByExam($_SESSION['examId']);
		
		$data['questionCount'] = count($data['questionData']);
		
		$_SESSION['allQuestions'] = $data['questionData'];
		$_SESSION['allUserAnswers'] = array();
		
		$this->load->view('header',$data);
		$this->load->view('examInstructions', $data);
		$this->load->view('footer');
	}
	
	public function questionPage(){
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$this->load->model('Question');
	
		$data['questionData'] = $_SESSION['allQuestions'];
		
		$data['questionCount'] = count($data['questionData']);
		
		//get maximum number of points of the exam
		$maxScore = 0;
		foreach($data['questionData'] as $questions => $question){
			foreach($question as $key => $value){
				if ($key == 'points'){
					$maxScore += $value;
				}
			}
		}
			
		$data['currentIndex'] = $this->uri->segment(3);
		$next = $data['currentIndex'] +1;
		$previous = $data['currentIndex'] -1;
		
		$data['changeValue'] = "Next";
		$data['hidePrev'] = "submit";
		
		$data['title'] = 'Quiz';	

		
		// check which submit button is pressed
		$submitForm = $this->input->post('submitForm');
		if($submitForm == 'Previous'){
			if	($data['currentIndex'] != 0){
				redirect("Start/questionPage/$previous");
			}
			else{
				$data['hidePrev'] = "hidden";
			}
		}
		if($submitForm == 'Stop'){
		//	redirect("Start/index");
		}
		if($submitForm == 'Next'){
			if ($data['currentIndex'] < $data['questionCount']-1){
				$_SESSION['allUserAnswers'][] = $this->input->post('input') ;
				redirect("Start/questionPage/$next");
			}
			else{
				redirect("Start/result");
			}
		}
		
		$this->load->view('header',$data);
		$this->load->view('questionPage', $data);
		$this->load->view('footer');
	}
	
	public function examQuestions(){
		$data['title'] = 'Overview';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getAllQuestionsByExam($_SESSION['examId']);
		
		
		$this->load->view('header',$data);
		$this->load->view('examQuestions');
		$this->load->view('footer');
	}
	
	public function result(){
		$data['title'] = 'Result';
		
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$data['questionData'] = $_SESSION['allQuestions'];
		

		//get maximum score for this exam
		$maxScore = 0;
		foreach($data['questionData'] as $array){
				foreach ($array as $key => $value){
				if($key == 'points'){
					$maxScore += $value;
				}
			}
		}
		
		$data['userScore']=0;
		$count = count($_SESSION['allQuestions']);
		$i = 0;
		for($i = 0; $i < $count; $i++) {
			if($_SESSION['allQuestions'][$i]->correctans1 == $_SESSION['allUserAnswers'][$i]||
			$_SESSION['allQuestions'][$i]->correctans2 == $_SESSION['allUserAnswers'][$i]||
			$_SESSION['allQuestions'][$i]->correctans3 == $_SESSION['allUserAnswers'][$i]) {
				$data['userScore']+=$_SESSION['allQuestions'][$i]->points;
			}
		}
		
		//calculate result
		$data['result'] = $data['userScore']/$maxScore*100;
				
		
		//check if user is passed
		if($result >= $data['examData']->requiredScore)
			$data['passed'] = "passed";
		else $data['passed'] = "Not passed";
		
		$subjects = array();
		foreach($data['questionData'] as $questions => $question){
			foreach($question as $key => $value){
				if ($key == 'subject'){
					array_push($subjects,$value);
				}
			}
		}

		$data['subjects'] = array_unique($subjects);
		
		$this->load->view('header',$data);
		$this->load->view('result');
		$this->load->view('footer');
		
		// $_SESSION['allQuestions']="";
		// $_SESSION['allUserAnswers']="";
	}   
}

?>