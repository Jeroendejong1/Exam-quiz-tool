<?php
class Administrator extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function processLogin($email=NULL,$password){
		$this->db->select("personID,email");
		$whereCondition = $array = array('email' =>$email,'password'=>$password);
		$this->db->where($whereCondition);
		$this->db->from('person');
		$query = $this->db->get();
		return $query;
	}

}

?>