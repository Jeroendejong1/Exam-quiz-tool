<?php

class Category{
	public $id = "";
	public $name = "";
	
	public function __construct($person_Name, $person_id) {
		$this->name = $personName;
		$this->id = $personId;
	}
	
	public function setName($newName){
		$this->name = $newName;
	}
	function getName(){
		return $this->name;
	}

	public function set_id($newId){
		$this->id = $newId;
	}
	function getId(){
		return $this->id;
	}
}

?>