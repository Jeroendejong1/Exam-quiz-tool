<?php 
$id = $this->uri->segment(3);

 ?>

<form method="post" action="<?php echo base_url();?>index.php/admin/examOverview">
	<p> Delete this questions? </p>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input class="btn btn-success" type="submit" value="Yes" name="submit">
	<a href ="<?php echo base_url();?>index.php/admin/examOverview" class="btn btn-danger">No</a>
</form>

