<?php

class Exam extends CI_Model{
	
	
	//produces INSERT INTO statement
	public function insertIntoExam($data){
		$this->db->insert('exam',$data);
	}
	
	//produces SELECT FROM statement
	public function getExamData(){
		$query = $this->db->get('exam');
		return $query->result();
	}
	
	public function getExamDataById($examId){
		$this->db->where('examID',$examId);
		$query = $this->db->get('exam');
		return $query->result();
	}
	
	//Update exam data 
	public function examUpdate($data,$id){
		$this->db->where('examID',$id);
		$this->db->update('exam',$data);
	}

	//Delete exam data
	public function examDelete($id){
		$this->db->where('examID',$id);
		$this->db->delete('exam');
		$this->db->where('examID', $id);
		$this->db->delete('question');
	}
}

?>