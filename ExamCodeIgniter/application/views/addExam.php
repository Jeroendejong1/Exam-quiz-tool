
<body onload="AllInputsFilled();">
<h1>Add exam</h1>
	<div class= "col-lg-8">
	<form method="post" id="achievementf1" action="">
		<fieldset>
		<legend>Settings</legend>
			<div class= "col-lg-9">
				<label for="question">Name of the exam:</label>
				<input type="text" class="form-control" id="question" name="question" requiered>
				<br>
				<div id="dynamicInput">
					<label for="subject1">Subject 1: </label>
					<input type="text" class="form-control" id="subject1" name="myInputs[]" requiered><br>
					<label for="subject1">Subject 2: </label>
					<input type="text" class="form-control" id="subject1" name="myInputs[]" requiered><br>
				</div>
				<input type="button" class="btn btn-default" value="Add another subject" onClick="addInput('dynamicInput');">
				<br><br>
				<label for="questionFile">Add question-file:</label>
				<input type="file" id="questionFile" name="questionFile">
				<br><br>
				<label for="examTime">Set exam time (in minutes):</label><br>
				<input type="number" class="form-control" id="examTime" name="examTime">
				<br><br>
				<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Back to overview</a>
			</div>
		</fieldset>
	</form>
	</div>

<script>var name= "Subject ";</script>
<script src="../../js/addInput.js"></script>
