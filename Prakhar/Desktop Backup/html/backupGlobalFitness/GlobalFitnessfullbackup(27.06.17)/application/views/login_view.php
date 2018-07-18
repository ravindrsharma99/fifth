
<body class="login-body">
  <div class="loginbg">
    <div class="container">
      <div class="form-signin">
      <?php echo form_open('admin/login'); ?>    
        <!--<div class="text-center logo2"><img src="<?php echo base_url('public/assets/images/logo.png') ?>"  alt=""></div>-->
        <h2 class="form-signin-heading"> sign in now</h2>         
        <div class="login-wrap">
        <div class="form-group">
        <img src="<?php echo base_url(); ?>/public/assets/images/dashboard_logo.png" class="img-responsive center-block" alt="Logo">
        </div>
          <div class="form-group ">               
            <input type="text" class="form-control"  value="" id="email" name="email" placeholder="Email ID" autofocus>
            <div class='error'><?php echo form_error('email'); ?></div>
          </div>
          <div class="form-group ">               
            <input type="password" class="form-control" value=""  id="password" name="password" placeholder="Password">
            <div class="error"><?php echo form_error('password'); ?></div>
          </div>
          <div class="alert alert-block  fade in" style="display:none"></div>
          <button class="btn btn-lg btn-login btn-block" id="btnlogin" type="submit">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
