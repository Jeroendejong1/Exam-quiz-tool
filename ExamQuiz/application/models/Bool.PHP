<?php

class BoolQuestion extends Question{
	public $wrongAnswer = "appel";
	public $allAnswers = array ($wrongAnswer,$correctAnswer);
	public function showQuestion(){
		echo "
			<form method='post'>
			";
		echo $question."<br>";
			shuffle($allAnswers);
			foreach ($allAnswers as $key => $value){
				echo "<input type='radio' name='answer' value='".$value."'>".$value."<br>";
			}
		echo "
		<br>
		<input type='submit' value= 'submit'>
		</post>
		";
	}
}

?>