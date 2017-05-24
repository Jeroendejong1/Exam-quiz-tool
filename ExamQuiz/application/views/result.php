	<div class="row">
		<h1> Quiz Results </h1>
		<hr>
		<div class="col-lg-12"><h2 class="text-center"><strong><?= $passed ?></strong></h2></div>
			<div class= "col-lg-12">		
				<div class="panel panel-primary">
					<div class="panel-heading"><h4>Total result</h4></div>
					<div class="panel-body">
					<div class='progress'>
						<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40'
						  aria-valuemin='0' aria-valuemax='100' style='width:<?= $result ?>%'>
							<?=$result ?>%
						</div>
					</div>
				</div>
			</div>
			<div class= "col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><h4>Results per subject</h4></div>
					<div class="panel-body">
						<?php
							foreach($subjects as $subject){
								echo"
									$subject <div class='progress'>
									   <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40'
									  aria-valuemin='0' aria-valuemax='100' style='width:40%'>
										40%
									  </div>
									</div>
								";
							}
						?>
					</div>
				</div>
			</div>
	</div>
	<hr>
	<a class="btn btn-primary" href="index.php">Save as pdf</a>
	<a class="btn btn-primary" href="index.php">Check wrong answers</a>
	<a class="btn btn-primary" href="<?php echo base_url();?>index.php" style="float:right;">Back to Home</a>