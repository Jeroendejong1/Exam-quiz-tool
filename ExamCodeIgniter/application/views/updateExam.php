
<body onload="AllInputsFilled();">
<h1>Update exam</h1>
<div class= "col-lg-8">
	<form method="post" id="achievementf1" action="">
		<fieldset>
		<legend>Settings</legend>
			<div class= "col-lg-9">
				<label for="question">Name of the exam:</label>
				<input type="text" class="form-control" placeholder="<?php echo $row->examName ;?>" id="question" name="question" requiered>
				<br>
				<div id="dynamicInput">
				
				<?php 
				// foreach(...){
					// echo "
					// <label for="subject1">Subject 1: </label>
					// <input type="text" class="form-control" id="subject1" name="myInputs[]" placeholder=" . . " requiered><br>
					// ";
				// }
				?>
				</div>
				<input type="button" class="btn btn-default" value="Add another subject" onClick="addInput('dynamicInput');">
				<br>
				<br>
				<label for="questionFile">Add question-file:</label>
				<input type="file" id="questionFile" name="questionFile">
				<br>
				<br>
				<label for="examTime">Set exam time (in minutes):</label><br>
				<input type="number" placeholder="<?php echo $examDuration ;?>" class="form-control" id="examTime" name="examTime">
				<br>
				<br>
				
				<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Back to overview</a>
			</div>
		</fieldset>
	</form>
</div>


<script>var name= "Subject ";</script>
<script src="../../js/addInput.js"></script>
