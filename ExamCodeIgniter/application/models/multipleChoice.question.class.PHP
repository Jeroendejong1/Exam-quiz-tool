<?php

class MultipleChoice extends Question{
	public $questionType = "MultipleChoice";
	public $wrongAnswers = array ("Appel","Kastanjeboom","Paddestoel");
	public $allAnswers = array("Appel","Kastanjeboom","Paddestoel");
	public function showQuestion($question,$allAnswers){
		$question = "What?";
		$allAnswers = array("Appel","Kastanjeboom","Paddestoel");
		echo "
			<form method='post'>
			";
		echo $question."<br>";
			//shuffle($allAnswers);
			foreach($allAnswers as $key => $value){
				echo "<input type='radio' name='answer' value='".$value."'>".$value."<br>";
			}
		echo "</post>";
	}
}

?>