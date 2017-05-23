

<a class="btn btn-default" href="question_page.php">Overview questions</a>
<a class="btn btn-danger" href="<?php echo base_url();?>index.php/Start/index" onclick = "confirm()">Stop exam</a>
<div class="question">
	<form method="POST">
		<hr>
			<b>Question:</b><br>
			<?=$row->question?><br><br>
			<div class='panel panel-primary'>
				<div class='panel-heading'>Casus:</div>
				<div class='panel-body'><?= $row->casus ?></div>
			</div>
		<hr>
		<?php
		if($row->type == "openEnded"){
			echo "
			<b>Give your answer:</b><br><br>
			<input type='text' class='form-control' placeholder='Your answer' name='".$row->questionID."'><br>
			";
		}
		elseif($row->type == "multipleChoice"){
			echo "<b>Select your answer:</b><br>";
			foreach ($answers as $key => $answer){
				if($answer != ""){
					echo 	"<div class='radio'><label><input name='options".$row->questionID."' type='radio'> ". $answer."</label><br>";
				}
			}
		}
		elseif($row->type == "checkbox"){
			echo "<b>Select your answer(s):</b><br>";
			foreach ($answers as $key => $answer){
				if($answer != ""){
					echo "<label class='checkbox-inline'> <input type='checkbox'>". $answer."</label><br>";
				}
			}
		}
		?>
	</form>
	<a class="btn btn-default" href="<?= base_url();?>index.php/Start/question/<?= $previous ?>">Previous</a>
	Tijd over: <span id="demo"></span>
	<a class="btn btn-default" href="<?= base_url();?>index.php/Start/question/<?= $next ?>" style="float:right">Next</a>
</div>
