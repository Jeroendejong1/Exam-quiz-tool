<?php

class OpenEnded extends Question{
	public $questionType = "openEnded";
	public $correctAnswer = "test";
	public function showQuestion(){
		$questionText ="What is the answer?";
		echo "
			<form method='post'>"
			.$questionText."<br>
			<input type='text' class='form-control' name='answer'>
			</post>
		";
	}
}

?>