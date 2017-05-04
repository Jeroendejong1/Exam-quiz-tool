<!doctype html>
<html>
<head>
<title>Vraag</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/personalStyle.css">
<meta charset="UTF-8">
<script>
function myFunction() {
    confirm("Press a button!");
}

</script>
</head>
<body>
<div class="container">
	<a class="btn btn-default" href="question_page.php">Overview questions</a>
	<a class="btn btn-danger" href="<?php echo base_url();?>index.php/Start/index" onclick = "confirm()">Stop exam</a>
	<div class="question">
		<form method="POST">
			<fieldset>
			<legend> Question 1/50 (example)</legend>
			<p> <?  ?> </p>
			<p> <?  ?> </p>
			<hr>

			<hr>
			<input type="checkbox" name="hold">Check question later
			<br><br>
			</fieldset>
		</form>
		<a class="btn btn-default" href="question_page.php">Previous</a>
		Tijd over: <span id="demo"></span>
		<a class="btn btn-default" href="question_page.php" style="float:right">Next</a>
	</div>
</div>
</body>
</html>