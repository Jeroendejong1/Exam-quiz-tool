
	<nav>
		<a href='<?php echo base_url();?>index.php/Login/index' style="float: right;">Administrator login</a>
	</nav>
	<div class="text-center col-lg-4"></div>
	<div class="text-center col-lg-4">
		<form method="post">		
			<br>
			<div class="panel panel-default">
				<div class='panel-heading'>Select an exam</div>
					<div class='panel-body'>
						<select class="form-control" name="exam">
							<?php
								foreach($examData as $row){
									echo "<option value='".$row->examID."'>" . $row->name ."</option>";
								}
							?>
						</select>
						<br>
						<input type="submit" name="submit" value="Start" class="btn btn-block btn-primary">
					</div>
				</div>
			</div>
			
			</form>
		<br>
	</div>

