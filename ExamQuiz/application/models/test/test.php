<?php

include "../question.class.php";
include "../openEnded.question.class.php";


function getQuestionType(){
		global $questionType;
		if($questionType == "openEnded"){
			return OpenEnded("questionId", "questionLevel", "questionCasus", "questionText", "correctAnswer")->showQuestion($question,$allAnswers);
		}
}

echo getQuestionType();


// $oe=new OpenEnded("questionId", "questionLevel", "questionCasus", "questionText", "correctAnswer");

// $oe ->showQuestion();



// include "../multipleChoice.question.class.php";


// $mc=new MultipleChoice("questionId", "questionLevel", "questionCasus", "questionText", "correctAnswer");
// $mc ->showQuestion($question,$allAnswers);

?>