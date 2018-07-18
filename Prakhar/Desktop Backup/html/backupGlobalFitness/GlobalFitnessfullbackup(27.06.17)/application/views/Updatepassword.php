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
      <h4>Change Password  </h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->
  <?php echo form_open('updatepassword/changepassword'); ?>
  <div class="row">
    <div class="col-md-6 col-sm-6">
        <?php 
          if(isset($error)){
            echo "<span class='spanerror'>".$error."</span>";
          } 
        ?>
        <div class="form-group">
        <label for="usr" class="name_lab"> Old Password :</label>
      
          <input class="form-control"  id="id" name="id" value="<?php  echo $this->session->userdata('userId'); ?>" type="hidden"/>
          <input class="form-control width30per"  id="oldpassword" name="oldpassword" type="password"/>
          <div class='error'><?php echo form_error('oldpassword'); ?></div>
          <div class='error'><?php echo form_error('check_database'); ?></div>
        </div>

        <div class="form-group">
        <label for="usr" class="name_lab"> New Password : </label>
           <input class="form-control width30per" id="newpassword" name="newpassword" type="password"/><div class='error'><?php echo form_error('newpassword'); ?></div>
        </div>
        <div class="form-group">
        <label for="usr" class="name_lab">Confirm New Password:</label>
            <input class="form-control width30per" id="cnewpassword" name="cnewpassword" type="password"/><div class='error'><?php echo form_error('cnewpassword'); ?></div>
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