<style>
.error p{
  color:red;
}
</style>
<section>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
     <div class="sign">
      <h4>New Password  </h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->
 <form action="<?php echo base_url('user/newpassword?id='); echo $ids; ?>" method="post">
  <div class="row">
      <?php if($this->session->flashdata('passUpdated')): ?>
                      <div class="alert alert-success  alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                    <i class="fa fa-ok-sign"></i>
                                    <?php echo $this->session->flashdata('passUpdated'); ?>
                                  </h4>
                            </div> 
                    <?php endif; ?>
    <div class="col-md-6 col-sm-6">
        
         <div class="form-group">
      <label class="help-block">Enter New password for your account</label>
        <input class="form-control width30per" id="cnewpassword" type="password" name="password" placeholder=""/>
        <?php echo form_error('password'); ?>
        </div>      
    </div>
  </div>
  <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="form-group">        
   
         <button class="btn btn-danger" name="UpdatePassword" type="submit">Save</button>
                    
        </div>
  </div><!--end of colm-->
</div><!--end of row-->
</form>
<div class="clear"></div>
</div><!--end of container-->
</section>