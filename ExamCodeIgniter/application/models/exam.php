<?php

class Exam extends CI_Model{
	
	
	//produces INSERT INTO statement
	public function insertIntoExam(){
		$data = array(
			'name' => 'examName',
			'duration' => 'examDuration'
		);
		$this->db->insert('exam',$data);
	}
	
	//produces SELECT FROM statement
	public function getExamData(){
		$query = $this->db->get('exam');
		return $query->result();
		
		$examName = $this->db->query('SELECT name FROM exam WHERE id = $id');
		$examDuration = $this->db->query('SELECT duration FROM exam');
	}
	
	//Update exam data 
	public function examUpdate($data, $id){
		$this->db->where('id',$id);			//search where id = $id
		$this->db->update('exam',$data);
	}
	
	

	
	
	// public $id = "";
	// public $name = "";
	// public $currentTime = time();
	// public $startTime = $_SESSION['time_started'];
	// public $allowedTime = "";
	// public $timeLeft = $startTime + $allowedTime; ///check
	
	// public function __construct($id, $name) {
		// $this->id = $id;
		// $this->name = $name;
	// }

	// public function set_id($newId){
		// $this->id = $newId;
	// }
	// function getId(){
		// return $this->id;
	// }
	
	// public function setName($newName){
		// $this->name = $newName;
	// }
	// function getName(){
		// return $this->name;
	// }
}

?>