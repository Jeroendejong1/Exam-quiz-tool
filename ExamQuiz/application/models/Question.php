<?php
class Question extends CI_Model{
	
	//INSERT INTO statement
	public function insertIntoQuestion($data){
		$this->db->insert('question',$data);
	}
	
	//SELECT FROM statement for update question
	public function getQuestion($questionId){
		$this->db->where('QuestionID',$questionId);
		$query = $this->db->get('question');
		return $query->result();
	}
	
	//SELECT FROM without examid for question overview
	public function getAllQuestions(){
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
		$this->db->where('questionID',$questionId);
		$this->db->delete('question');
	}
	
	

}
?>