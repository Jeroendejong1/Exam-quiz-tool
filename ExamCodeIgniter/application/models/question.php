<?php
//TODO check for better function instead of shuffle


class Question extends CI_Model{
	
	
	public function getQuestionData(){
		$query = $this->db->get('question');
		return $query->result();
		
		//$examName = $this->db->query('SELECT name FROM exam WHERE id = $id');
	}
	
	
	
	
	
	
	
/*	// variables will be pulled from DB, for testing purposes they are now defined here. 
	public $questionId = 1;
	public $questionLevel = 1;
	public $questionCasus = "";
	public $questionText = "Welke is een dier?";
	public $correctAnswer = "Hond";
	
	public function __construct($questionId, $questionLevel, $questionCasus, $questionText, $correctAnswer) {
		$this->questionId = $questionId;
		$this->questionLevel = $questionLevel;
		$this->questionCasus = $questionCasus;
		$this->questionText = $questionText;
		$this->correctAnswer = $correctAnswer;
	}

	public function setQuestionId($newId){
		$this->questionId = $questionId;
	}
	function getQuestionId(){
		return $this->questionId;
	}

	public function setQuestionLevel($newLevel){
		$this->questionLevel = $questionLevel;
	}
	function getQuestionLevel(){
		return $this->questionLevel;
	}
	
	public function setQuestionCasus($newCasus){
		$this->questionCasus = $questionCasus;
	}
	function getQuestionCasus(){
		return $this->questionCasus;
	}
	
	public function setQuestionText($newText){
		$this->questionText = $questionText;
	}
	function getQuestionText(){
		return $this->questionText;
	}
	
	public function setCorrectAnswer($correctAnswer){
		$this->correctAnswer = $correctAnswer;
	}
	function correctAnswer(){
		return $this->correctAnswer;
	}

	public function evaluateAnswer(){
		if(isset($_POST['answers'])){$choice=$_POST['answer'];}else {$choice="";}
		if($choice == $correctAnswer){
			$questionResult = "right";
		}
		else{
			$questionResult = "wrong";
		}
	}
	*/
}
?>