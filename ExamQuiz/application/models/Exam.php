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
	
	//Update exam data 
	public function examUpdate($newData, $id){
		$this->db->where('id',$id);			//search where id = $id
		$this->db->update('exam',$newData);
	}

	//Delete exam data
	public function examDelete($id){
		$this->db->where('id',$id);
		$this->db->delete('exam');
		//$this->db->where('exam', ...);
		//$this->db->delete('question')
	}
}

?>