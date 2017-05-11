<?php 

foreach ($questionData as $row){
	if($row->questionID == $this->uri->segment(3)){
		$question = $row->question;
		$points = $row->points;
		$type = $row->type;
		$casus = $row->casus;
		$correctans1 = $row->correctans1;
		$correctans2 = $row->correctans2;
		$correctans3 = $row->correctans3;
		$wrongans1 = $row->wrongans1;
		$wrongans2 = $row->wrongans2;
		$wrongans3 = $row->wrongans3;
		$wrongans4 = $row->wrongans4;
		$wrongans5 = $row->wrongans5;
		$subject = $row->subject;
	}
}

?>
<h1>Question information</h1>

<table class="table table-bordered">
	<tr>
		<th>Subject:</th>
	</tr>
	<tr>
		<td><?= $subject; ?></td>
	</tr>
	<tr>
		<th>Questiontext:</th>
	</tr>
	<tr>
		<td><?= $question; ?></td>
	</tr>
	<tr>
		<th>Casustext:</th>
	</tr>
	<tr>
		<td><?= $casus; ?></td>
	</tr>	
	<tr>
		<th>points:</th>
	</tr>
	<tr>
		<td><?= $points; ?></td>
	</tr>
	<tr>
		<th>Type:</th>
	</tr>
	<tr>
		<td><?= $type; ?></td>
	</tr>
	<tr>
		<th>Correct answer(s):</th>
	</tr>
	<tr>
		<td>
		<?= $correctans1; ?><br>
		<?= $correctans2; ?><br>
		<?= $correctans3; ?>
		</td>
	</tr>
	<tr>
		<th>Wrong answer(s):</th>
	</tr>
	<tr>
		<td>
		<?= $wrongans1; ?><br>
		<?= $wrongans2; ?><br>
		<?= $wrongans3; ?><br>
		<?= $wrongans4; ?><br>
		<?= $wrongans5; ?>
		</td>
	</tr>


</table>

<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-primary">Return to overview</a>
