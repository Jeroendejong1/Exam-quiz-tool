<?php
$id = $_SESSION['examId'];
$questions = array();

 
$currentIndex = $this->uri->segment(3);
$next = $currentIndex +1;
$previous = $currentIndex-1;




echo '<form method="POST">';
foreach ($questionData as $row){
	if($row->examID == $id){
		$questions[] = $row;
		
		foreach($questions as $key => $value){
			$questionNo = $key;
		}
		
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
	}
}

?>

</form>
	<a class="btn btn-default" href="<?= base_url();?>index.php/Start/questionPage/<?= $previous ?>">Previous</a>
	Tijd over: <span id="demo"></span>
	<a class="btn btn-default" href="<?= base_url();?>index.php/Start/questionPage/<?= $next ?>" style="float:right">Next</a>
<a class="btn btn-danger" href="<?php echo base_url();?>index.php/Start/home">Stop exam</a>