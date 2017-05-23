
<h1>Question overview</h1>
<div class="col-lg-12">
	<table class="table table-bordered">
	<th>No</th><th>Question</th><th>checked</th>
	<?php
	foreach($questionData as $row){
		echo "<tr><td></td>";
		echo "<td>$row->question</td>";
		echo "<td><span class='glyphicon glyphicon-check'></span></td>";
		echo "
		</tr>";
	}
	?>
	<tr><td colspan="4"><a href="<?php echo base_url();?>index.php/Admin/addExam" class="btn btn-primary" style="float:right;"> Finish exam</a></td></tr>
	</table>
</div>

<br>
<br>