
<h1>Overview Exams</h1>
<div class="col-lg-8">
	<table class="table table-bordered table-hover">
	<th>Exam Name</th><th>Duration</th><th>Edit</th><th>Delete</th>
	<?php
		foreach($examData as $row){
		echo "<tr><td>" . $row->name ."</td>";
		echo "<td>" . $row->duration ."</td>";
		echo "<td></td>";
		echo "<td></td></tr>";
	}
	?>
	<tr><td colspan="4"><a href="<?php echo base_url();?>index.php/admin/addExam" class="btn btn-primary">Add Exam</a></td></tr>
	</table>
</div>
<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Home</a>
