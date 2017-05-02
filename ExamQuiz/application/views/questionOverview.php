
<h1>Questions of exam <?php ?></h1>
<div class="col-lg-12">
	<table class="table table-bordered">
	<th>Question</th><th>Category</th><th>Level</th><th>Actions</th>
	<?php
		foreach($questionData as $row){
		echo "<tr><td>" . $row->question ."</td>";
		echo "<td></td>";
		echo "<td>".$row->points."</td>";
		echo 	"<td>
				<button type='button' class='btn btn-default btn-sm'>
				<span class='glyphicon glyphicon-trash'></span> Delete
				</button>
				<button type='button' class='btn btn-default btn-sm'>
				<span class='glyphicon glyphicon-eye-open'></span> View
				</button>
				<button type='button' class='btn btn-default btn-sm'>
				<span class='glyphicon glyphicon-edit'></span> Edit
				</button>				
				</td></tr>";
	}
	?>
	<tr><td colspan="6"><a href="<?php echo base_url();?>index.php/admin/addQuestion" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-plus"></span> Add Question</a></td></tr>
	</table>
</div>

<a class="btn btn-primary" href="<?php echo base_url();?>index.php/admin/examOverview">Home</a>
