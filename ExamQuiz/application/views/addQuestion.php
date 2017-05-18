<?php
	
	$questionType =$this->uri->segment(3);
	$examId =$this->uri->segment(4);

?>
<form method="post" id="achievementf1" action="<?php echo base_url();?>index.php/Admin/questionFormInput">
<input type="hidden" name="exam" value="<?= $examId; ?>">
<input type="hidden" name="type" value="<?= $questionType; ?>">
<div class="col-lg-6">
	<fieldset>
	<legend>General settings</legend>
		<div class= "col-lg-12">
			<label for="casusText">Add casus-text (optional):</label>
			<textarea class="form-control" id="casusText" name="casusText"></textarea>
			<br>
			<label for="question">Add question-text:</label>
			<input type="text" class="form-control" id="question" name="question" required>
			<br>
			<label for="question">Points for this question: </label>
			<input type="number" class="form-control" id="points" name="points" max="6" min="1" required>
		</div>
	</fieldset>
	<br>
	<br>
	<fieldset>
	<legend>Assign to subject</legend>
	<div class= "col-lg-12">
		<input checked type="radio" value="existing" name="assignSubject" > Existing subject
		<select class="form-control" name="existingSubject">
			<?php 
			foreach($subjects as $subject){
				echo "<option value='$subject'>$subject</option>";
			}
			?>
		</select>
		<br>
		<input type="radio" value="new" name="assignSubject"> New subject
		<input type="text"  name="newSubject" class="form-control" id="select-subject">
	</div>
	</fieldset>
</div>
<div class="col-lg-6">
	<fieldset>
	<legend>Add correct answer(s)</legend>
	<div class= "col-lg-12">
		<label for="correct1">Correct answer 1:</label>
		<input type="text" class="form-control" id="correct1" name="correct1" placeholder="Required" required><br>
		<label for="correct1">Correct answer 2:</label>
		<input type="text" class="form-control" id="correct2" name="correct2" placeholder="<?=$c2 ?>" <?=$c2 ?>><br>
		<label for="correct1">Correct Answer 3:</label>
		<input type="text" class="form-control" id="correct3" name="correct3" placeholder="<?=$c3 ?>" <?=$c3 ?>><br>
	<div>
	</fieldset>
	<br>
	<br>
	<fieldset>
	<legend>Add wrong answer(s)</legend>
	<div class= "col-lg-12">
		<label for="wrong1">Wrong answer 1:</label>
		<input type="text" class="form-control" id="wrong1" name="wrong1" placeholder="<?=$w1 ?>" <?=$w1 ?>><br>
		<label for="wrong2">Wrong answer 2:</label>
		<input type="text" class="form-control" id="wrong2" name="wrong2" placeholder="<?=$w2 ?>" <?=$w2 ?>><br>
		<label for="wrong1">Wrong answer 3:</label>
		<input type="text" class="form-control" id="wrong3" name="wrong3" placeholder="<?=$w3 ?>" <?=$w3 ?>><br>
		<label for="wrong2">Wrong answer 4:</label>
		<input type="text" class="form-control" id="wrong4" name="wrong4" placeholder="<?=$w4 ?>" <?=$w4 ?>><br>
		<label for="wrong1">Wrong answer 5:</label>
		<input type="text" class="form-control" id="wrong5" name="wrong5" placeholder="<?=$w5 ?>" <?=$w5 ?>><br>
	<br>
	<br>
	<input type="submit" class="btn btn-success" name="Submit" value="Save question">
	<a href="<?php echo base_url();?>index.php/Admin/addExam" class="btn btn-danger">Return without saving</a>		
	</fieldset>
	</form>
	</div>
</div>