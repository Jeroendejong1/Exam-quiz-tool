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
		
		if(isset($_POST['start'])){
			$_SESSION['userInput'] = array();
			$this->session->mark_as_temp('examtime',$duration*60);
		}
		
		$this->load->view('header',$data);
		$this->load->view('examInstructions', $data);
		$this->load->view('footer');
	}
	
	public function questionPage(){
		$this->load->model('Exam');
		$data['examData'] = $this->Exam->getExamDataById($_SESSION['examId']);
		
		$this->load->model('Question');
		$data['questionData'] = $this->Question->getAllQuestionsByExam($_SESSION['examId']);
		
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
		
		// evaluate given answers
		$totalScore =0;
		if(isset($_POST['submitForm'])){
			echo "gelukt";
			$totalScore =$totalScore +1;
			if($question->type == "openEnded"){
				// if($_POST['input'] == $question->correctans1 || $_POST['input'] == $question->correctans2 || $_POST['input'] == $question->correctans3){
					// $totalScore += $question->points;
				// }
			}
			elseif($question->type == "multipleChoice"){
				// if($_POST['input'] == $question->correctans1){
					// $totalScore += $question->points;
				// }
			}
			elseif($question->type == "checkbox"){
				// if($_POST['input'] == $question->correctans1 && $_POST['input'] == $question->correctans2 && $_POST['input'] == $question->correctans3){
					// $totalScore += $question->points;
				// }
			}
		}
		
		echo $totalScore;
	
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
			redirect("Start/index");
		}
		if($submitForm == 'Next'){
			if ($data['currentIndex'] < $data['questionCount']-1){
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
		$this->load->view('header',$data);
		$this->load->view('result');
		$this->load->view('footer');
	}
}

?>