
<h1>Add exam</h1>
	<div class= "col-lg-12">
	<form method="post" id="achievementf1" action="<?php echo base_url();?>index.php/admin/examFormInput">
		<fieldset>
		<legend>Settings</legend>
			<div class= "col-lg-12">
				<label for="question">Name of the exam:</label>
				<input type="text" class="form-control" id="examName" name="examName" requiered>
				<br>
				<br>
				<label for="examTime">Exam time (in minutes):</label><br>
				<input type="number" class="form-control" id="examTime" min="1" max="300" name="examTime">
				<br><br>
				<label for="examTime">Requiered score (percentage):</label><br>
				<input type="number" class="form-control" max="100" min="0" id="requieredScore" name="requieredScore">
				<br><br>
				<input type="submit" name="submit" class="btn btn-success" value="save exam" href="<?php echo base_url();?>index.php/admin/examOverview">
				<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-danger">Return without saving</a>

			</div>
		</fieldset>
	</form>
	</div>
