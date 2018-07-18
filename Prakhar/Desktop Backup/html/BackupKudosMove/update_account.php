<div class="panel_Custom">
	<form id="login-nav" action="<?php echo base_url(); ?>index.php/Booking/updated" method="POST">
		<h2>Change Password</h2>

		<?php if($this->session->flashdata('Error')){ ?>
	      	<div class="error_cls"><h5><?php echo $this->session->flashdata('Error') ?></h5></div>
		<?php } ?>

		<div class="form-group col-md-6 col-sm-6">
		 	<label  for="exampleInputphone2">Old Password</label>
			<input type="text" name="oldpw" placeholder="OLD PASSWORD" class="form-control" required>
		</div>
		<div class="form-group col-md-6 col-sm-6">
			<label  for="exampleInputphone2">New Password</label>
			<input type="password" name="newpw" id="newPassword" placeholder="NEW PASSWORD" class="form-control" required>
		</div>
		
		<div class="form-group col-md-6 col-sm-6">
			<span id="errorMsg"></span>
			<label  for="exampleInputphone2">Confirm Password</label>
			<input type="password" name="conew" id="conPassword" placeholder="CONFIRM PASSWORD" onChange="checkPasswordMatch()" class="form-control" required>
		</div>
		<div class="form-group col-md-6 col-sm-6">
			<input type="submit" id="sign" name="updatee" value="Update" class="submit_profile margen_top">
		</div>
	</form>
</div>