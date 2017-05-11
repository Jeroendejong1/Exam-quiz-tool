<?php
class Question extends CI_Model{
	
	//INSERT INTO statement
	public function insertIntoQuestion($data){
		$this->db->insert('question',$data);
	}
	
	//SELECT FROM statement
	public function getQuestion(){
	//	$this->db->where('ExamID',$examId);
		$query = $this->db->get('question');
		return $query->result();
	}
	
	//SELECT FROM without examid
	public function getQuestion2(){
		$query = $this->db->get('question');
		return $query->result();
	}
	
	//UPDATE WHERE statement
	public function questionUpdate($data, $id){
		$this->db->where('questionID',$id);
		$this->db->update('question',$data);
	}	
	
	//DELETE WHERE statement
	public function questionDelete($questionId){
		$this->db->where('questionID',$id);
		$this->db->delete('question');
	}
	
	

}
?>