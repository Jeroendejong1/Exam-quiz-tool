

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h3>Administrator login</h3>
				<form method="post" action="<?php echo base_url();?>index.php/Login/signin">                                             
					<div class="form-group">                       
						<label for="email">Email</label> <input requiered type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
						<span><?php echo form_error('email'); ?></span>                  
					</div>
  
					<div class="form-group">
					   <label for="password">Password</label> <input requiered type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>"> 
						<span class="invalidInput"><?php echo form_error('password'); ?></span>
					</div>
					<button class="btn btn-success" type="submit">Login</button>
					<a class="btn btn-danger" href= "<?php echo base_url();?>index.php/Start/home">Return</a>
				</form>
			</div>
        </div>
    </div>               
</div>
 