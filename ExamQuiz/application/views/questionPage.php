<?php
$id = $_SESSION['examId'];

$questions = array();
echo '<form method="POST">';
foreach ($questionData as $row){
	if($row->examID == $id){
		$questions[] = $row;
		if($row->type == "openEnded"){
			echo "
			<hr>
			<b>Question:</b><br>
			".$row->question."<br>
			<b>Casus:</b><br>
			".$row->casus."<br>
			
			<input type='text' name='".$row->questionID."'><br>
			";
		}
		if($row->type == "multipleChoice"){
			$answers = array();
			if ($row == 'correctans1'||'correctans2'||'correctans3'||'wrongans1'||
						'wrongans2'||'wrongans3'||'wrongans4'||'wrongans5'){
						$answers[] = $row;	
						}
			echo "
			<hr>
			<b>Question:</b><br>
			".$row->question."<br>
			<b>Casus:</b><br>
			".$row->casus."<br>
			<b>Answers:</b><br>
			";
			foreach ($answers as $key => $answer){
				echo "<input type='radio'>".$answer;
			};

		}
		if($row->type == "checkBox"){
			echo "
			<hr>
			Question:<br>
			".$row->question."<br>
			Casus:<br>
			".$row->casus."<br>
			
			";
		}
	
		$question = $row->question;
		$casus = $row->casus;
	}
}

?>

</form>
Time left: <span id="demo"></span>
<a class="btn btn-danger" href="<?php echo base_url();?>index.php/Start/home">Stop exam</a>