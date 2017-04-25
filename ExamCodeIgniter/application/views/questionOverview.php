
<h1>Questions of exam <?php ?></h1>
<div class="col-lg-8">
	<table class="table table-bordered table-hover">
	<th>Question</th><th>Category</th><th>Level</th><th>View</th><th>Edit</th><th>Delete</th>
	<?php
		foreach($questionData as $row){
		echo "<tr><td>" . $row->question ."</td>";
		echo "<td></td>";
		echo "<td>".$row->points."</td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td></tr>";
	}
	?>
	<tr><td colspan="6"><a href="<?php echo base_url();?>index.php/admin/addQuestion" class="btn btn-primary">Add Question</a></td></tr>
	</table>
</div>
<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Home</a>
