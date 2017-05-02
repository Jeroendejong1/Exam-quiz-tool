
<form class="col-lg-3" method="post" action="<?php echo base_url();?>index.php/Admin/examOverview">
<fieldset>
<legend>Administrator login</legend>
<input type ="email" placeholder="Email" class="form-control">
<br>
<input type ="password" placeholder="Password" class="form-control">
<br>
<input type="submit" class="btn btn-primary" value="Login">
<a class="btn btn-primary" href= "<?php echo base_url();?>index.php/Start/index">Return</a>
</fieldset>
</form>