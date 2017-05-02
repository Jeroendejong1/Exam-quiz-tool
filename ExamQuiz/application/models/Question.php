<?php
//TODO check for better function instead of shuffle


class Question extends CI_Model{
	
	//produces INSERT INTO statement
	public function insertIntoQuestion($data){
		$this->db->insert('question',$data);
	}
	
	
	public function getQuestionData(){
		$query = $this->db->get('question');
		return $query->result();
	}
	
	
	
	
	
	
	

}
?>