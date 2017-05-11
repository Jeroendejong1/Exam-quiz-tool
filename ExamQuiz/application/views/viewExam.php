<?php 

foreach ($examData as $row){
	if($row->examID == $this->uri->segment(3)){
		$name = $row->name;
		$duration = $row->duration;
		$requiredScore=$row->requiredScore;
	}
}

?>
<h1>Exam information</h1>

<table class="table table-bordered">
	<tr>
		<th>Title:</th>
	</tr>
	<tr>
		<td><?= $name; ?></td>
	</tr>	
	<tr>
		<td></td>
	</tr>
	<tr>
		<th>Duration:</th>
	</tr>
	<tr>
		<td><?= $duration; ?> minutes </td>
	</tr>
	<tr>
		<th>Required score:</th>
	</tr>
	<tr>
		<td><?= $requiredScore; ?>% </td>
	</tr>
</table>

<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-primary">Return to overview</a>
