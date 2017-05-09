<?php 

foreach ($questionData as $row){
	if($row->questionID == $this->uri->segment(3)){
		$question = $row->question;
		$points = $row->points;
		$type = $row->type;
	}
}

?>
<h1>Question information</h1>

<table class="table table-bordered">
	<tr>
		<th>Question</th>
	</tr>
	<tr>
		<td><?= $question; ?></td>
	</tr>	
	<tr>
		<td></td>
	</tr>
	<tr>
		<th>points</th>
	</tr>
	<tr>
		<td><?= $points; ?></td>
	</tr>
	<tr>
		<th>Type</th>
	</tr>
	<tr>
		<td><?= $type; ?></td>
	</tr>
</table>

<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-primary">Return to overview</a>
