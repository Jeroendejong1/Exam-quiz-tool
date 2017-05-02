
<h1>Overview Exams</h1>
<div class="col-lg-12">
	<table class="table table-bordered">
	<th>Exam Name</th><th>Duration</th><th>Actions</th>
	<?php
		foreach($examData as $row){
		echo "<tr><td>" . $row->name ."</td>";
		echo "<td>" . $row->duration ."</td>";
		echo "
		<td>
			<a href=" .base_url(). "index.php/Admin/deleteExam/". $row->id ."  class='btn btn-default btn-sm'>
			<span class='glyphicon glyphicon-trash'></span> Delete</a>
			
			<a href=" .base_url(). "index.php/Admin/updateExam/". $row->id ." class='btn btn-default btn-sm'>
			<span class='glyphicon glyphicon-edit'></span> Edit</a>
			
			<a href=" .base_url(). "index.php/Admin/viewExam/". $row->id ." class='btn btn-default btn-sm'>
			<span class='glyphicon glyphicon-eye-open'></span> View	</a>		
		</td>
		</tr>";
	}
	?>
	<tr><td colspan="4"><a href="<?php echo base_url();?>index.php/Admin/addExam" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-plus"></span> Add Exam</a></td></tr>
	</table>
</div>
<br>
<br>
