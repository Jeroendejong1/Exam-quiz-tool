
<body onload="AllInputsFilled();">

<?php
foreach ($examData as $row){
	if($row->id == $this->uri->segment(3)){
		$name = $row->name;
		$duration = $row->duration;
	}
}
?>

<h1>Update exam</h1>

	<div class= "col-lg-4">
		<form method="post" id="achievementf1" action="<?php echo base_url();?>index.php/admin/examFormChange">
			<fieldset>
			<legend>Exam settings</legend>
			<div class="col-lg-12">
			<label for="examName">Name of the exam:</label>
			<input type="text" class="form-control" placeholder="<?= $name; ?>" id="examName" name="examName" requiered>
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
			<label for="examTime">Set exam time (in minutes):</label><br>
			<input type="number" placeholder="<?= $duration; ?>" class="form-control" id="examTime" name="examTime">
			<br>
			<br>
			<label for="examTime">Requiered score (percentage):</label><br>
			<input type="number" class="form-control" max="100" min="0" id="requieredScore" name="requeieredScore">
			<br>
			<br>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Back to overview</a>
			</fieldset>
		</form>
	</div>
	<div class="col-lg-8">
		<fieldset><legend>Questions</legend>
		<table class="table table-bordered">
			<th>Question</th><th>Subject</th><th>Level</th><th>Actions</th>
			<?php
				foreach($questionData as $row){
				echo "<tr><td>" . $row->question ."</td>";
				echo "<td></td>";
				echo "<td>".$row->points."</td>";
				echo 	"<td>
						<button type='button' class='btn btn-default btn-sm'>
						<span class='glyphicon glyphicon-trash'></span>
						</button>
						<button type='button' class='btn btn-default btn-sm'>
						<span class='glyphicon glyphicon-eye-open'></span>
						</button>
						<button type='button' class='btn btn-default btn-sm'>
						<span class='glyphicon glyphicon-edit'></span>
						</button>				
						</td></tr>";
				}
			?>
			<tr><td colspan="6">

				<a href="<?php echo base_url();?>index.php/admin/addQuestion" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-plus"></span> Add question</a>
				<a href="" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-upload"></span> Add question file</a>
				</td></tr>
		</table>
		</fieldset>
	</div>



<script>var name= "Subject ";</script>
<script src="../../js/addInput.js"></script>
