<?php
//TODO check for better function instead of shuffle


class Question extends CI_Model{
	
	//INSERT INTO statement
	public function insertIntoQuestion($data){
		$this->db->insert('question',$data);
	}
	
	//SELECT FROM statement
	public function getQuestionData(){
		$query = $this->db->get('question');
		return $query->result();
	}
	
	//UPDATE WHERE statement
	public function questionUpdate($newData, $id){
		$this->db->where('id',$id);			//search where id = $id
		$this->db->update('question',$newData);
	}	
	
	//DELETE WHERE statement
	public function questionDelete($id){
		$this->db->where('id',$id);
		$this->db->delete('question');
	}
	
	

}
?>