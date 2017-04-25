<?php

//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Admin extends CI_controller {
	
	public function addQuestion(){
		$this->load->view('header');
		$this->load->view('addQuestion');
		$this->load->view('footer');	
	}
	
	public function addExam(){
		$this->load->view('header');
		$this->load->view('addExam');
		$this->load->view('footer');	
	}
	
	//set 'database' in autoload libraries 
	public function addExam2(){
		$this->load->model('Exam');
		$this->Exam->insertIntoExam();
		$this->load->view('header');
		$this->load->view('addExam');
		$this->load->view('footer');
	}
	
	public function updateExam(){
		$data['examData'] = $this->getExamData();
		$this->updateExamData();	
		$this->load->view('header');
		$this->load->view('updateExam',$data);
		$this->load->view('footer');
	}
	
	public function examOverview(){
		$this->load->model('Exam');
		$data['examData'] = $this->getExamData();
		$this->load->view('header');
		$this->load->view('examOverview',$data);
		$this->load->view('footer');
	}
	
	private function getExamData(){
		$this->load->model('Exam');
		$result = $this->Exam->getExamData();
		return $result;
	}
	
	private function updateExamData(){
		$data['name'] = 'testnaam';
		$data['duration'] = 30;
		foreach($this->getExamData() as $row){
			$id = $row->id;
		}
		$this->load->model('Exam');
		$this->Exam->examUpdate($data,$id);
	}
	
	public function questionOverview(){
		$this->load->model('Question');
		$data['questionData'] = $this->getQuestionData();
		$this->load->view('header');
		$this->load->view('questionOverview',$data);
		$this->load->view('footer');
	}
		
	
	private function getQuestionData(){
		$this->load->model('Question');
		$result = $this->Question->getQuestionData();
		return $result;
	}


}

?>