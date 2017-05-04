<?php

class Person extends CI_Model{
	public $firstName;
	public $lastName;
	public $email;

	//gives the object a value when it is made
	public function __construct($person_firstName, $person_lastName, $person_email) {
		$this->firstName = $person_firstName;
		$this->lastName = $person_lastName;
		$this->email = $person_email;
	}

	public function set_firstName($new_firstName){
		$this->firstName = $new_firstName;
	}
	function get_firstName(){
		return $this->firstName;
	}

	public function set_lastName($new_secondName){
		$this->lastName = $new_secondName;
	}
	function get_lastName(){
		return $this->lastName;
	}

	public function set_email($new_email){
		$this->email = $new_email;
	}
	function get_email(){
		return $this->email;
	}

}
?>