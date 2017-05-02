<?php

//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Admin extends CI_controller {
	
	//load login page (in progress)
	public function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

//exam methods	
	
	//placed 'database' in autoload libraries 
	//addExam creates exam and places it into DB
	public function addExam(){
		// show questiondata-table (TODO: --of all questions belonging to this exam)
		$this->load->model('Question');
		$data['questionData'] = $this->getQuestionData();
		
		$this->load->view('header');
		$this->load->view('addExam',$data);
		$this->load->view('footer');
	}
	
	//examFormImport saves form input in $data, and sends it to Exam-model, which sends it to the DB
	public function examFormInput(){
		$data = array(										//place form-data in array
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime')
		);
		
		$this->load->model('Exam');							//load model
		$this->Exam->insertIntoExam($data);					//send $data to insertIntoExam-method

		$this->examOverview();								//go to examOverview
	}
	
	
	//examOverview gets exam data from model 'Exam'(indirectly from DB), and places each exam inside table in examOverview-view.
	public function examOverview(){
		$this->load->model('Exam');
		$data['examData'] = $this->getExamData();	
		
		$this->load->view('header');
		$this->load->view('examOverview',$data);
		$this->load->view('footer');
	}
	
	//get data from model 'Exam', which gets the data from DB (??)
	private function getExamData(){
		$this->load->model('Exam');
		$result = $this->Exam->getExamData();
		return $result;
	}

	//updateExam loads examdata inside form, and makes it possible to change it (in progress)
	public function updateExam(){
		//get data for question table
		$this->load->model('Question');
		$data['questionData'] = $this->getQuestionData();		
			
		//get data for placeholders in form
		$this->load->model('exam');
		$data['examData'] = $this->getExamData();
				
		//load updateExam page
		$this->load->view('header');
		$this->load->view('updateExam',$data);
		$this->load->view('footer');
	}

	public function examFormChange(){
		//TODO: fix id
		$newData = array(										//place form-data in array
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime')
		);
		
		$this->load->model('Exam');							//load model
		$this->Exam->examUpdate($newData, $id);				//send $newData to examUpdate-method

		$this->examOverview();								//go to examOverview
	}
	
	//load exam with specific id, and delete it (in progress)
	function deleteExam(){
		//give $id value of 3th uri-section, this is set as the id of the exam in examOveview.php 
		$id = $this->uri->segment(3);
		
		$this->load->model('exam');
		$this->exam->examDelete($id);
		
		$this->examOverview();
	}
	
	
	//view data of exam with specific id (read only) (in progress) 
	function viewExam(){
		
		$this->load->model('exam');
		$data['examData'] = $this->getExamData();	
		
		$this->load->view('header');
		$this->load->view('viewExam', $data);
		$this->load->view('footer');	
		
	}

	
	
	
//Question methods

	private function getQuestionData(){
		$this->load->model('Question');
		$result = $this->Question->getQuestionData();
		return $result;
	}

	public function addQuestion(){
		$this->load->view('header');
		$this->load->view('addQuestion');
		$this->load->view('footer');	
	}

	//questioinFormImport saves form input in $data, and sends it to Question-model, which sends it to the DB (in progress)
	public function questionFormInput(){
		$data = array(										//place form-data in array
			'casus' => $this->input->post('casusText'),
			'correctans1' => $this->input->post('myInputs', true),
			'correctans2' => $this->input->post('myInputs'),
			'correctans3' => $this->input->post('myInputs'),
			'points' => $this->input->post('points'),
			'question' => $this->input->post('question'),
			'type' => $this->input->post('examName'),
			'wrongAns1' => $this->input->post('myInputs'),
			'wrongAns2' => $this->input->post('myInputs'),
			'wrongAns3' => $this->input->post('myInputs'),
			'wrongAns4' => $this->input->post('myInputs'),
			'wrongAns5' => $this->input->post('myInputs'),
		);
		
		$this->load->model('Question');							//load model
		$this->Question->insertIntoQuestion($data);				//send $data to insertIntoQuestion-method

		$this->addExam();										//go to examOverview
	}
}

?>