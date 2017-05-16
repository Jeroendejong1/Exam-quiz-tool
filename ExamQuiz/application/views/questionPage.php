<?php
$examID = $_SESSION['examId'];
?>

<form method="POST">

<?php
$row = $questionData[$currentIndex];

		$casus = $row->casus;
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
echo"	<hr>
		<b>Question:</b><br>
		".$row->question."<br><br>
		<div class='panel panel-default'>
			<div class='panel-heading'>Casus:</div>
			<div class='panel-body'>".$row->casus."</div>
		</div>
		<hr>"
	;

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
<input class="btn btn-default" type="submit" name="btnPrev" value="Previous">
<input class="btn btn-danger" type="submit" name="btnStop" value="Stop">
<input class="btn btn-default" type="submit" name="btnNext" value="Next">

</form>

