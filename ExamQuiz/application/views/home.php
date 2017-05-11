
	<nav>
		<a href='<?php echo base_url();?>index.php/Login/index' style="float: right;">Administrator login</a>
	</nav>
	<div class="text-center col-lg-4"></div>
	<div class="text-center col-lg-4">
		<h1>Select exam</h1>
			<form method="post">		
			<br>
			<div class="col-lg-9">
			<select class="form-control custon-select" name="exam">
				
				<?php
					foreach($examData as $row){
						echo "<option value='".$row->examID."'>" . $row->name ."</option>";
					}
				?>
			</select>
			</div>
			<input type="submit" name="submit" value="Go" class="btn btn-primary">
			
			</form>
		<br>
	</div>

