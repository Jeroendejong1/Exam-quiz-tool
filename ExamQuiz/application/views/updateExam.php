
<body onload="AllInputsFilled();">
<?php $id = $this->uri->segment(3);

foreach ($examData as $row){
	if($row->examID == $this->uri->segment(3)){
		$name = $row->name;
		$duration = $row->duration;
		$requieredScore = $row->requieredScore;
	}
}
?>

<h1>Update exam</h1>

	<form method="post" id="achievementf1" action="<?php echo base_url();?>index.php/admin/examFormUpdate">
		<fieldset>
		<legend>Settings</legend>
			<div class= "col-lg-6">
				<input type="hidden" name="<?= $id ?>">
				
				<label for="question">Name of the exam:</label>
				<input type="text" class="form-control" value="<?= $name; ?>" id="examName" name="examName" requiered>
				<br>
				<div id="dynamicInput">
					<label for="subject1">Subject 1: </label>
					<input type="text" class="form-control" id="subject1" name="myInputs[]" requiered><br>
					<label for="subject1">Subject 2: </label>
					<input type="text" class="form-control" id="subject1" name="myInputs[]" requiered><br>
				</div>
				<input type="button" class="btn btn-default" value="Add another subject" onClick="addInput('dynamicInput');">
				<br><br>
				<label for="examTime">Exam time (in minutes):</label><br>
				<input type="number" value="<?= $duration; ?>" class="form-control" id="examTime" name="examTime">
				<br><br>
				<label for="examTime">Requiered score (percentage):</label><br>
				<input type="number" value="<?= $requieredScore; ?>" class="form-control" max="100" min="0" id="requieredScore" name="requieredScore">
				<br><br>
				<input type="submit" name="submit" class="btn btn-success" value="Update exam" href="<?php echo base_url();?>index.php/admin/examOverview">
				<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-danger">Return without saving</a>

			</div>
		</fieldset>
	</form>



<script>var name= "Subject ";</script>
<script src="../../js/addInput.js"></script>
