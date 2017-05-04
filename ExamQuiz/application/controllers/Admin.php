<?php

//comments:
//make sure base_url is always loaded by adding url to helper-array in autoload-file.

class Admin extends CI_controller {
//-----------------------------------login methods-------------------------	

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Administrator');
		$this->load->library(array('form_validation','session'));		//check
		$this->load->helper(array('url','html','form'));				//check
	}

	public function index(){
		$this->login();
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function successpage(){
		$this->load->view('header');
		$this->load->view('examOverview');
		$this->load->view('footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	function signin(){
		$email= trim($this->input->post('email'));
		$password= trim($this->input->post('password'));

		$query = $this->Administrator->processLogin($email,$password);
	
	
		$this->form_validation->set_rules('email', 'email', 'required|callback_validateUser[' . $query->num_rows() . ']');
		$this->form_validation->set_rules('password', 'password', 'required');
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Enter %s');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
		else{
			if($query){
				$query = $query->result();
				$user = array(
				 'id' => $query[0]->id,
				 'email' => $query[0]->email,
				);
				$this->session->set_userdata($user);
				redirect('admin/examOverview');
			}
		}
	}

	//Custom Validation Method
	public function validateUser($email,$recordCount){
		if ($recordCount != 0){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validateUser', 'Invalid %s or Password');
			return FALSE;
		}
	}

	
//------------------------------------exam methods----------------------------------------------------------------	
	
	//placed 'database' in autoload libraries 
	//addExam creates exam and places it into DB
	public function addExam(){
		// show questiondata-table (TODO: --of all questions belonging to this exam)
		$this->load->model('Question');
		$data['questionData'] = $this->getQuestionData();
		
		$this->load->view('adminHeader');
		$this->load->view('addExam',$data);
		$this->load->view('footer');
	}
	
	//examFormImport saves form input in $data, and sends it to Exam-model, which sends it to the DB
	public function examFormInput(){
		$data = array(										//place form-data in array
			'name' => $this->input->post('examName'),
			'duration' => $this->input->post('examTime'),
			'requieredScore' => $this->input->post('requieredScore')
		);
		
		$this->load->model('Exam');							//load model
		$this->Exam->insertIntoExam($data);					//send $data to insertIntoExam-method

		$this->examOverview();								//go to examOverview
	}
	
	
	//examOverview gets exam data from model 'Exam'(indirectly from DB), and places each exam inside table in examOverview-view.
	public function examOverview(){
		$this->load->model('Exam');
		$data['examData'] = $this->getExamData();	
		
		$this->load->view('adminHeader');
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
		$this->load->view('adminHeader');
		$this->load->view('updateExam',$data);
		$this->load->view('footer');
	}

	public function examFormChange(){
		//TODO: fix id
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
			$id = $this->uri->segment(3);
			$this->load->view('deleteConfirm', $id);
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

	private function getQuestionData(){
		
		$this->load->model('Question');
		$result = $this->Question->getQuestionData();
		return $result;
	}

	public function addQuestion(){
		$this->load->view('adminHeader');
		$this->load->view('addQuestion');
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
			'correctans1' => $this->input->post('myInputs1'),
			'correctans2' => $this->input->post('myInputs2'),
			'correctans3' => $this->input->post('myInputs3'),
			'points' => $this->input->post('points'),
			'question' => $this->input->post('question'),
			'type' => $this->input->post('questionType'),
			'wrongAns1' => $this->input->post('myInputs4'),
			'wrongAns2' => $this->input->post('myInputs5'),
			'wrongAns3' => $this->input->post('myInputs[]'),
			'wrongAns4' => $this->input->post('myInputs[]'),
			'wrongAns5' => $this->input->post('myInputs[]'),
		);
		
		$this->load->model('Question');							//load model
		$this->Question->insertIntoQuestion($data);				//send $data to insertIntoQuestion-method


	}
	
	public function questionFormChange(){
		$newData = array(										//place form-data in array
			'casus' => $this->input->post('casusText'),
			'correctans1' => $this->input->post('myInputs1'),
			'correctans2' => $this->input->post('myInputs2'),
			'correctans3' => $this->input->post('myInputs3'),
			'points' => $this->input->post('points'),
			'question' => $this->input->post('question'),
			'type' => $this->input->post('questionType'),
			'wrongAns1' => $this->input->post('myInputs4'),
			'wrongAns2' => $this->input->post('myInputs5'),
			'wrongAns3' => $this->input->post('myInputs[]'),
			'wrongAns4' => $this->input->post('myInputs[]'),
			'wrongAns5' => $this->input->post('myInputs[]'),
		);
		
		$this->load->model('Question');						//load model
		$this->Question->questionUpdate($newData, $id);				//send $newData to questionUpdate-method


	}
	
	//load question with specific id, and delete it (in progress)
	function deleteQuestion(){ 
		$id = $this->uri->segment(3);
		
		$this->load->view('adminHeader');
		$this->load->view('deleteConfirmQuestion', $id);
		$this->load->view('footer');
		
		if(isset ($_POST['submit'])){
			$this->load->model('question');
			$this->question->questionDelete($id);
		}
		$this->examOverview();				//find out how to go back to previous page (addExam or updateExam)
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