<?php $questionId = $this->uri->segment(3);

	foreach ($questionData as $row){
		if($row->questionID == $questionId){
			$casus = $row->casus;
			$correctans1 = $row->correctans1;
			$correctans2 = $row->correctans2;
			$correctans3 = $row->correctans3;
			$points = $row->points;
			$question = $row->question;
			$type = $row->type;
			$wrongAns1 = $row->wrongans1;
			$wrongAns2 = $row->wrongans2;
			$wrongAns3 = $row->wrongans3;
			$wrongAns4 = $row->wrongans4;
			$wrongAns5 = $row->wrongans5;
			$subject = $row->subject;
		}
	}
	
?>

	<form method="post" action="<?php echo base_url();?>index.php/admin/questionFormUpdate">
	<div class="col-lg-6">
		<fieldset>
		<legend>General settings</legend>
			<div class= "col-lg-12">
			
			<input type="hidden" name="type" value="<?= $type ?>">
			<input type="hidden" name="id" value="<?= $questionId ?>">
			
			<label for="casusText">Add casus-text (optional):</label>
			<textarea class="form-control" id="casusText" value="<?=$casus ?>" name="casusText"></textarea>
			<br>
			<label for="question">Add question-text:</label>
			<input type="text" class="form-control" id="question" name="question" value="<?=$question ?>" requiered>
			<br>
			<label for="question">Points for this question: </label>
			<input type="number" class="form-control" id="points" name="points" value="<?=$points ?>" max="6" min="1" placeholder="1" requiered>
			</div>
		</fieldset>
		<br>
		<br>
		<fieldset>
		<legend>Add to subject</legend>
			<div class= "col-lg-12">
				<input type="text" required name="subject" class="form-control" id="select-subject" value="<?=$subject ?>">
			</div>
		</fieldset>
	</div>
	<div class="col-lg-6">
		<fieldset>
		<legend>Add correct answer(s)</legend>
		<div class= "col-lg-12">
		<label for="correct1">Correct answer 1:</label>
		<input type="text" class="form-control" id="correct1" value="<?=$correctans1 ?>" name="correct1" placeholder="Required" required><br>
		<label for="correct1">Correct answer 2:</label>
		<input type="text" class="form-control" id="correct2" value="<?=$correctans2 ?>" name="correct2" placeholder="<?=$options['c2'] ?>" <?=$options['c2'] ?>><br>
		<label for="correct1">Correct Answer 3:</label>
		<input type="text" class="form-control" id="correct3" value="<?=$correctans3 ?>" name="correct3" placeholder="<?=$options['c3'] ?>" <?=$options['c3'] ?>><br>
	<div>
	</fieldset>
	<br>
	<br>
	<fieldset>
	<legend>Add wrong answer(s)</legend>
	<div class= "col-lg-12">
		<label for="wrong1">Wrong answer 1:</label>
		<input type="text" class="form-control" id="wrong1" value="<?=$wrongAns1 ?>" name="wrong1" placeholder="<?=$options['w1'] ?>" <?=$options['w1'] ?>><br>
		<label for="wrong2">Wrong answer 2:</label>
		<input type="text" class="form-control" id="wrong2" value="<?=$wrongAns2 ?>" name="wrong2" placeholder="<?=$options['w2'] ?>" <?=$options['w2'] ?>><br>
		<label for="wrong1">Wrong answer 3:</label>
		<input type="text" class="form-control" id="wrong3" value="<?=$wrongAns3 ?>" name="wrong3" placeholder="<?=$options['w3'] ?>" <?=$options['w3'] ?>><br>
		<label for="wrong2">Wrong answer 4:</label>
		<input type="text" class="form-control" id="wrong4" value="<?=$wrongAns4 ?>" name="wrong4" placeholder="<?=$options['w4'] ?>" <?=$options['w4'] ?>><br>
		<label for="wrong1">Wrong answer 5:</label>
		<input type="text" class="form-control" id="wrong5" value="<?=$wrongAns5 ?>" name="wrong5" placeholder="<?=$options['w5'] ?>" <?=$options['w5'] ?>><br>
	<br>
	<br>
		<input type="submit" class="btn btn-success" name="Submit" value="Save question">
		<a href="<?php echo base_url();?>index.php/Admin/addExam" class="btn btn-danger">Return without saving</a>		
		</fieldset>
		</div>
	</div>
	</form>