<?php

//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Admin extends CI_controller {

	// function __construct(){
	// parent::__construct();
	// // to use admin pages, the administrator should be logged in, otherwise redirected to login-screen
	// $this->load->library('session');
		// if(! $this->session->userdata('admin')){
			// redirect('login');
		// }
	// }


//------------------------------------exam methods----------------------------------------------------------------	
	
	//examOverview gets exam data from model 'Exam'(indirectly from DB), and places each exam inside table in examOverview-view.
	public function examOverview(){
		$this->load->model('Exam');
		$data['examData'] = $this->getExamData();	
		
		$this->load->view('adminHeader');
		$this->load->view('examOverview',$data);
		$this->load->view('footer');
	}
	
	//placed 'database' in autoload libraries 
	//addExam creates exam and places it into DB
	public function addExam(){
		$this->load->view('adminHeader');
		$this->load->view('addExam');
		$this->load->view('footer');
	}
	
	//examFormImport saves form input in $data, and sends it to Exam-model, which sends it to the DB
	public function examFormInput(){
		$data = array(
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime'),
			'requieredScore' => $this->input->post('requieredScore')
		);
		
		$this->load->model('Exam');
		$this->Exam->insertIntoExam($data);

		$this->examOverview();
	}
	
	//get data from model 'Exam', which gets the data from DB
	private function getExamData(){
		$this->load->model('Exam');
		$result = $this->Exam->getExamData();
		return $result;
	}

	//updateExam loads examdata inside form, and makes it possible to change it (in progress)
	public function updateExam(){
		//get data for placeholders in form
		$this->load->model('exam');
		$data['examData'] = $this->getExamData();
				
		//load updateExam page
		$this->load->view('adminHeader');
		$this->load->view('updateExam',$data);
		$this->load->view('footer');
	}

	//update form
	public function examFormUpdate(){
		$data = array(
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime'),
			'requieredScore' => $this->input->post('requieredScore')
		);
		$this->load->model('Exam');
		$this->Exam->examUpdate($data,$id);

		$this->examOverview();
	}
	
	public function examFormChange(){
		
		$newData = array(										//place form-data in array
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime'),
			'requieredScore' => $this->input->post('requieredScore')
		);
		
		$this->load->model('Exam');							//load model
		$this->Exam->examUpdate($newData, $id);				//send $newData to examUpdate-method

		$this->examOverview();								//go to examOverview
	}
	
	//load exam with specific id, and delete it (in progress)
	function deleteExam(){
		
		$this->load->view('adminHeader');
		
		//if pressed on delete button in examOverview, get the id from POST
		if(isset ($_POST['submit'])){		
			$id=$_POST['id'];
			$this->load->model('exam');
			$this->exam->examDelete($id);
			$this->examOverview();			//vervangen door redirect
		}
		//if the page is reached via url, get id from url
		else{
			
			$data =array( 'id' => $this->uri->segment(3));
			$this->load->view('deleteConfirm', $data);
		}
		$this->load->view('footer');

	}
	
	//view data of exam with specific id (read only) (in progress) 
	function viewExam(){
		
		$this->load->model('exam');
		$data['examData'] = $this->getExamData();	
		
		$this->load->view('adminHeader');
		$this->load->view('viewExam', $data);
		$this->load->view('footer');	
	}

	
	
	
//-------------------------------------------Question methods --------------------------------------------------------------------

	public function questionOverview(){
		
		$this->load->model('Question');
		$data =array( 
			'id' => $this->uri->segment(3),
			'questionData' => $this->getQuestionData()
			);
		$this->load->view('adminHeader');
		$this->load->view('questionOverview',$data);
		$this->load->view('footer');
		
	}
	


	private function getQuestionData(){
		$this->load->model('Question');
		$result = $this->Question->getQuestionData($id);
		return $result;
	}

	public function addQuestion(){
		$questionType = $this->uri->segment(3);
		
		if($questionType=="openEnded"){
			$options = array(
				'c2'=> "optional",
				'c3'=> "optional",
				'w1'=> "disabled",
				'w2'=> "disabled",
				'w3'=> "disabled",
				'w4'=> "disabled",
				'w5'=> "disabled",
				'w6'=> "disabled"
			);
		}
		elseif($questionType=="multipleChoice"){
			$options = array(
				'c2'=>"disabled",
				'c3'=>"disabled",
				'w1'=>"required",
				'w2'=>"optional",
				'w3'=>"optional",
				'w4'=>"optional",
				'w5'=>"optional",
				'w6'=>"optional"
			);
		}
		elseif($questionType=="checkbox"){
			$options =array(
				'c2'=>"optional",
				'c3'=>"optional",
				'w1'=>"required",
				'w2'=>"optional",
				'w3'=>"optional",
				'w4'=>"optional",
				'w5'=>"optional",
				'w6'=>"optional"
			);
		}
		
		$this->load->view('adminHeader');
		$this->load->view('addQuestion',$options);
		$this->load->view('footer');	
	}

	

	//updateExam loads examdata inside form, and makes it possible to change it (in progress)
	public function updateQuestion(){
		//get data for question table
		$this->load->model('Question');
		$data['questionData'] = $this->getQuestionData();		
			
		//load updateQuestion page
		$this->load->view('adminHeader');
		$this->load->view('updateQuestion',$data);
		$this->load->view('footer');
	}
	
	
	
	//questioinFormImport saves form input in $data, and sends it to Question-model, which sends it to the DB (in progress)
	public function questionFormInput(){
		$data = array(										//place form-data in array
			'casus' => $this->input->post('casusText'),
			'correctans1' => $this->input->post('correct1'),
			'correctans2' => $this->input->post('correct2'),
			'correctans3' => $this->input->post('correct3'),
			'points' => $this->input->post('points'),
			'question' => $this->input->post('question'),
			'type' => $this->input->post('questionType'),
			'wrongans1' => $this->input->post('wrong1'),
			'wrongans2' => $this->input->post('wrong2'),
			'wrongans3' => $this->input->post('wrong3'),
			'wrongans4' => $this->input->post('wrong4'),
			'wrongans5' => $this->input->post('wrong5'),
			'examID' => $this->input->post('exam')
		);
		
		$this->load->model('Question');							//load model
		$this->Question->insertIntoQuestion($data);				//send $data to insertIntoQuestion-method


	}
	
	public function questionFormChange(){
		$questionData = array(										//place form-data in array
			'casus' => $this->input->post('casusText'),
			'correctans1' => $this->input->post('correct1'),
			'correctans2' => $this->input->post('correct2'),
			'correctans3' => $this->input->post('correct3'),
			'points' => $this->input->post('points'),
			'question' => $this->input->post('question'),
			'type' => $this->input->post('questionType'),
			'wrongans1' => $this->input->post('wrong1'),
			'wrongans2' => $this->input->post('wrong2'),
			'wrongans3' => $this->input->post('wrong3'),
			'wrongans4' => $this->input->post('wrong4'),
			'wrongans5' => $this->input->post('wrong5'),
			'examID' => $this->input->post('exam')

		);
		
		$this->load->model('Question');						//load model
		$this->Question->questionUpdate($questionData);				//send $newData to questionUpdate-method


	}
	
	//load question with specific id, and delete it (in progress)
	function deleteQuestion(){
		
		$this->load->view('adminHeader');
		
		//if pressed on delete button in examOverview, get the id from POST
		if(isset ($_POST['submit'])){		
			$id=$_POST['id'];
			$this->load->model('question');
			$this->question->questionDelete($id);
			$this->addExam();			//vervangen door redirect
		}
		//if the page is reached via url, get id from url
		else{
			$id = $this->uri->segment(3);
			$this->load->view('deleteConfirmQuestion', $id);
		}
		$this->load->view('footer');

	}
	
	
	//view data of question with specific id (read only) (in progress) 
	function viewQuestion(){
		$this->load->model('question');
		$data['questionData'] = $this->getQuestionData();	
		
		$this->load->view('adminHeader');
		$this->load->view('viewQuestion', $data);
		$this->load->view('footer');	
	}
	
}

?>