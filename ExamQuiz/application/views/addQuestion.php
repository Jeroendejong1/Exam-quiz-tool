
<body onload="AllInputsFilled();">
<div class="container">
	<h1>Add question</h1>
	<div class= "col-lg-12">
	<form method="post" id="achievementf1" action="<?php echo base_url();?>index.php/Admin/questionFormInput">
		<div class="col-lg-6">
			<fieldset>
			<legend>General settings</legend>
				<div class= "col-lg-12">
				<label for="select-type">Select Question type:</label><br>
				<select class="custom-select form-control" id="select-type">
					<option value="1">Open-ended</option>
					<option value="2">Multiple choice</option>
					<option value="3">Check (more possible solutions)</option>
				</select>
				<br>
				<br>
				<label for="casusText">Add casus-text (optional):</label>
				<textarea class="form-control" id="casusText" name="casusText"></textarea>
				<br>
				<label for="casusFile">Add casus-image (optional):</label>
				<input type="file" id="casusFile" name="casusFile">
				<br>
				<label for="question">Add question-text:</label>
				<input type="text" class="form-control" id="question" name="question" requiered>
				<br>
				<label for="question">Points for this question: </label>
				<input type="number" class="form-control" id="points" name="points" max="6" min="1" placeholder="1" requiered>
				</div>
			</fieldset>
			<br>
			<br>
			<fieldset>
			<legend>Select subject and exam</legend>
			<div class= "col-lg-12">
				<select class="custom-select form-control col-lg-3" id="select-subject">
				  <option selected>Choose a subject</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
				<br>
				<br>
				<select class="custom-select form-control col-lg-3" id="select-exam">
				  <option selected>Choose an exam</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
			</fieldset>
		</div>
		<div class="col-lg-6">
			<fieldset>
			<legend>Add correct answer(s)</legend>
			<div class= "col-lg-12">
				<div id="dynamicInput1">
					<label for="correct1">Answer 1:</label>
					<input type="text" class="form-control" id="correct1" name="myInputs[]" requiered><br>
				</div>
				<input type="button" class="btn btn-default" value="Add another correct answer" onClick="addInput('dynamicInput1');">
				<br>
				<br>
			<div>
			</fieldset>
			<br>
			<br>
			<fieldset>
			<legend>Add wrong answer(s)</legend>
			<div class= "col-lg-12">
				<div id="dynamicInput2">
					<label for="wrong1">Answer 1:</label>
					<input type="text" class="form-control" id="wrong1" name="myInputs[]" requiered><br>
					<label for="wrong2">Answer 2:</label>
					<input type="text" class="form-control" id="wrong2" name="myInputs[]" requiered><br>
				</div>
				<input type="button" class="btn btn-default" value="Add another wrong answer" onClick="addInput('dynamicInput2');">
			<br>
			<br>
			<input type="submit" class="btn btn-success" name="Submit" value="Save question">
			<a href="<?php echo base_url();?>index.php/Admin/addExam" class="btn btn-danger">Return without saving</a>		
			</fieldset>
			</div>
		</div>
	</form>
	</div>
</div>

<script>var name= "Answer ";</script>
<script src="../../js/addInput.js"></script>