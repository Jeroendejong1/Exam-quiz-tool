
<form method="post" action="<?= base_url();?>index.php/admin/deleteExam">
	<p> Delete this exam with all it's questions? </p>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input class="btn btn-success" type="submit" value="Yes" name="submit">
	<a href ="<?php echo base_url();?>index.php/admin/examOverview" class="btn btn-danger">No</a>
</form>

