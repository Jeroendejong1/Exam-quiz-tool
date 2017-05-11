<?php

$id = $_SESSION['examId'];

foreach($examData as $row){
	if($row->examID == $id){
		$name = $row->name;
		$requiredScore = $row->requiredScore;
		$time = $row->duration;
	}
}



?>


<h1>Instructions</h1>

<p>
	You have selected the "<strong><?= $name?></strong>" exam quiz.
</p>

<p>
	This exam quiz has <strong>...</strong> questions. Each question is worth 1 or more points.
	If you get at least <strong><?=$requiredScore ?>%</strong> of the points, you have passed the quiz.
	The time limit for this exam is <strong><?= $time ?> minutes</strong>. The counter starts when you click on the "Start Exam"-button. You can see in the remaining time in the bottom-left corner.
</p>

<p>
	You can click the checkbox below the question if you want to review it later on. By clicking on the overview-button, you can see all the questions,
	and which of them you have checked.
</p>

<form action="<?php echo base_url();?>index.php/Start/questionPage">
<a href="<?php echo base_url();?>index.php/Start/home" class="btn btn-default">Return to overview</a>
<input type="submit" value="Start Exam" class="btn btn-success">

</form>
</div>
</body>
</html>