<?php

class User extends Person {
}

class Administrator extends Person {
	public $password;
	
	public function set_password($new_password){
		$this->password = $new_password;
	}
	function get_password(){
		return $this->password;
	}
}

?>