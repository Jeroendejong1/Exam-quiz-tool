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

<div class="panel panel-default">
	<div class='panel-heading'>Instructions</div>
	<div class='panel-body'>
		<p>
			Exam: "<strong><?= $name?></strong>"
		</p>
		<p>	Number of questions:  <strong><?= $questionCount ?></strong></p>
		<p> Required Score: <strong><?=$requiredScore ?>%</strong></p>
		<p> Time limit: <strong><?= $time ?> minutes</strong></p>


		<form action="<?php echo base_url();?>index.php/Start/questionPage/0">
		<a href="<?php echo base_url();?>index.php/" class="btn btn-default">Return to overview</a>
		<input type="submit" name="start" value="Start Exam" class="btn btn-success">
		</form>
	</div>
</div>
</body>
</html>