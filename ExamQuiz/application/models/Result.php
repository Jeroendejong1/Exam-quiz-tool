<?php

class Result{
	public $id = "";
	public $date = "";
	
	public function __construct($id, $date) {
		$this->id = $id;
		$this->date = $date;
	}

	public function set_id($newId){
		$this->id = $newId;
	}
	function getId(){
		return $this->id;
	}
	
	public function setDate($newDate){
		$this->name = $newDate;
	}
	function get_Date(){
		return $this->date;
	}
}
?>