<?php
$examID = $_SESSION['examId'];
?>

<form method="post">
<a href="<?= base_url() ?>/index.php/Start/examQuestions" class="btn btn-primary">Question overview</a>
<input class="btn btn-danger" type="submit" name="submitForm" value="Stop">

<br>
<?php
$row = $questionData[$currentIndex];

		//$casus = $row->casus;
		$correctans1 = $row->correctans1;
		$correctans2 = $row->correctans2;
		$correctans3 = $row->correctans3;
		$points = $row->points;
		$question = $row->question;
		$type = $row->type;
		$wrongAns1 = $row->wrongans1;
		$wrongAns2 = $row->wrongans2;
		$wrongAns3 = $row->wrongans3;
		$wrongAns4 = $row->wrongans4;
		$wrongAns5 = $row->wrongans5;
		$subject = $row->subject;
$answers = array($row->correctans1, $row->correctans2, $row->correctans3, $row->wrongans1,
			$row->wrongans2, $row->wrongans3, $row->wrongans4, $row->wrongans5);
echo"	<b>Question ".($currentIndex+1)." of $questionCount:</b><br>

			<p> Casus:</p>
			<pre>". $casus = $row->casus;  highlight_string($row->casus); echo "</pre>

		<h4>".$row->question."<br></h4>
		<hr>"
	;

if($row->type == "openEnded"){
	echo "
	<b>Give your answer:</b><br><br>
	<input type='text' class='form-control' placeholder='Your answer' name='input'><br>
	";
}
elseif($row->type == "multipleChoice"){
	shuffle($answers);
	echo "<b>Select your answer:</b><br>";
	foreach ($answers as $key => $answer){
		if($answer != ""){
			echo "<div class='radio'><label><input name='input' type='radio' value='".$answer."'> ". $answer."</label><br>";
		}
	}
}
elseif($row->type == "checkbox"){
	shuffle($answers);
	echo "<b>Select your answer(s):</b><br>";
	foreach ($answers as $key => $answer){
		if($answer != ""){
			echo "<label class='checkbox-inline'> <input type='checkbox' name='input' value='".$answer."'>". $answer."</label><br>";
		}
	}
}

?>



	<hr>
	<input class="btn btn-default" type="<?= $hidePrev ?>" name="submitForm" value="Previous">
	Tijd over: <span id="demo"></span>
	<input type="checkbox" name="reviewQuestion" value="checked"> Check this question later
	<input class="btn btn-default" type="submit" name="submitForm" value="<?= $changeValue ?>">
</form>

