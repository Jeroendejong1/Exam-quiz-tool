<?php

class checkQuestion extends Question{
	public $wrongAnswers = array ("Appel","Kastanjeboom","Paddestoel");
	public $correctAnswers = array ("Hond", "Kat");
	public $allAnswers = array ("Appel","Kastanjeboom","Paddestoel",$correctAnswers);
	public function showQuestion(){
		echo "
			<form method='post'>
			";
		echo $question."<br>";
			shuffle($allAnswers);
			foreach ($allAnswers as $key => $value){
				echo "<input type='checkbox' name='answer' value='".$value."'>".$value."<br>";
			}
		echo "
		<br>
		<input type='submit' value= 'submit'>
		</post>
		";
	}
}

?>