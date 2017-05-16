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
		<ol>
		<li><?= $correctans1; ?></li>
		<li><?= $correctans2; ?></li>
		<li><?= $correctans3; ?></li>
		</ol>
		</td>
	</tr>
	<tr>
		<th>Wrong answer(s):</th>
	</tr>
	<tr>
		<td>
		<ol>
		<li><?= $wrongans1; ?></li>
		<li><?= $wrongans2; ?></li>
		<li><?= $wrongans3; ?></li>
		<li><?= $wrongans4; ?></li>
		<li><?= $wrongans5; ?></li>
		</ol>
		</td>
	</tr>


</table>

<a href="<?php echo base_url();?>index.php/Admin/examOverview" class="btn btn-primary">Return to overview</a>
