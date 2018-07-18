<section>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
     <div class="cart_sign_in_heading">
      <h4>Hello...Please Sign In</h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->

  <div class="row cart_sign_in_penal">
    <div class="col-md-6 col-sm-6">
    	<div class="small_heading_sign_in">Existing Customers</div>
    	  <div class="cart_form_box">
			<div class="form-group">
			  <input type="text" placeholder="Username / Email" class="form-control" id="usr">
			</div>
			<div class="form-group">
			  <input type="password" placeholder="Password" class="form-control" id="pwd">
			</div>
			<div class="cart_submit_button"><a href="">Need Help Signing In?</a> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Sign In</button></div>
		</div>
    </div><!--end colm-->
    <div class="col-md-6 col-sm-6">
    	<div class="small_heading_sign_in">Guest Checkout</div>
    	<p class="inner_pages_paragraph">Quickly process your order, you will have a chance to create and account upon order confirmation.</p>
    	<div class="ExpressCheckout_button"><a href="">Express Checkout</a></div>
    </div><!--end colm-->
  </div><!--end row-->

<div class="row cart_sign_in_penal">
    <div class="col-md-6 col-sm-6">
        <div class="cancle_button"><button type="button" class="btn btn-default">Cancel</button></div>
    </div>
</div>


<!-- sign_in_cart_popup_modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header_sign_in_pop">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Account <a href="">
        <img src="<?php echo base_url('public/assets/images/pop_up_admin_icon.png'); ?>" alt=""/></a> </h4>
      </div>
      <div class="modal-body">
        <div class="cart_form_box">
			<div class="form-group">
			  <input type="text" placeholder="Username / Email" class="form-control" id="usr">
			</div>
			<div class="form-group">
			  <input type="password" placeholder="Password" class="form-control" id="pwd">
			</div>
			<div class="cart_submit_button"><button type="button" class="btn btn-default pop_up" data-toggle="modal" data-target="#myModal">Sign In</button></div>
			<div class="new_sign_up">New User? <a href="">  Sign Up</a></div>
		</div>
      </div>
<!--       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- sign_in_cart_popup_modal -->

  </div><!--end of container-->
</section>
