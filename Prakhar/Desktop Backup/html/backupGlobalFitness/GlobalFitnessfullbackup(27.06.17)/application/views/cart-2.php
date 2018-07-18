<section>
    <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
         <h2>Item in Cart</h2>
      </div><!--end of colm-->      
    </div><!--end of row-->    
    </div><!--end of container-->
  <div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12">
  <div class="table-responsive">
     <?php
     if(isset($_GET['sucess'])){
      echo "<h4 style='color:red;'>Checkout Successfully Done.</h4>";
     } 
     if(isset($_GET['cancel'])){
      echo "<h4 style='color:red;'>Checkout cancel successfully.</h4>";
     } 

 if($_SESSION['productDetail']['count']>0){
    ?>
<table width="865" class="table">
  <thead>
    <tr class="tb_hdr">
      <TH width="44" class="blank">Sr. No.</TH>
      <TH width="480" class="min_first">ProductName</TH>
      <TH width="71"  class="min">MPN</TH>
      <TH width="84"  class="min">Piece</TH>
      <TH width="118"  class="min">Price</TH>
      <TH width="118"  class="min">Checkout</TH>
    </tr>
   </thead>
<tbody> 
<?php
   for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
        $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
        foreach($product as $live){
        ?>
          <tr class="countTr">
            <td class="blank">
              <?php echo $i+1 ; ?>
           </td>
            <td class="min_first">
              <?php echo $live->ProductName; ?></td>
            <td class="mina"><?php echo $live->MPN; ?></td>
            <td class="mina">1</td>
            <td class="mina"><?php echo trim($live->Price,'$'); ?></td>
            <td class="mina">
              <div class="outr">
    <?php if($this->session->userdata('userId')!=""){ 
        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $paypal_id = 'gagandeep_seller@revinfotech.com';
    ?>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="get">
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $live->ProductName; ?>">
        <input type="hidden" name="item_number" value="<?php echo $live->ListID; ?>">
        <input type="hidden" name="amount" value="<?php echo trim($live->Price,'$'); ?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type='hidden' name='notify_url' value='<?php echo base_url(); ?>/index.php/site/addtocart'>
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value="<?php echo base_url('/index.php/site/addtocart?cancel') ; ?>">
    <input type='hidden' name='return' value='<?php echo base_url('/index.php/site/success') ; ?>'>
           <input type="submit" value="Checkout">
           <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
            </form>
              <?php }else{ 
                ?>
              <input data-toggle="modal" data-target="#myModal_login" type="button" value="Checkout">
              <?php
              } ?>
              </div>
            </td>
          </tr>
        <?php 
      }
    }
?> 
</tbody>
</table>
  <?php  
    }
    else
    {
      echo "<h4>No Records Found.</h4>";
    }
  ?> 
</div>
<!--end of glob-->
  </div><!--end col12-->
  </div><!--end of row-->
  </div>
</section>


<section>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
     <div class="chackout_penal_heading">
      <h4>EQUIPMENT IN YOUR CART</h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->

  <div class="row chackout_penal">
    <div class="col-md-3 col-sm-3 col-xs-4">
      <div class="cart_product_img"><img src="<?php echo base_url('public/assets/images/chackout_product_img.png'); ?>" alt=""/></div>
    </div><!--end colm-->

    <div class="col-md-9 col-sm-9 col-xs-8">
      <div class="row chack_out_product_content">
        <div class="col-md-6 col-sm-6 padd_no_web"><h4>Life Fitness Insignis Series Treadmill</h4></div>
        <div class="col-md-6 col-sm-6 padd_no_web">
        <div class="parice_check">$2,785.00</div>
        <div class="chack_increment_decrement">
        <form id='myform' method='POST' action='#'>
            <input type='button' value='+' class='qtyplus' field='quantity' />
            <input type='text' name='quantity' value='0' class='qty' />
            <input type='button' value='-' class='qtyminus' field='quantity' />
        </form>
        </div>
        <div class="parice_check_total">$2,785.00</div>
        </div>

      </div>

      <div class="row chack_out_product_content_bottom">
        <div class="col-md-6 col-sm-6 padd_no_web">
          <h5>Available to Ship: 1 Week</h5>
          <p>LS95T-ENG</p>
      </div>
      <div class="col-md-6 col-sm-6 padd_no_web">
        <div class="line_res">
        <div class="chack_increment_decrement_responsive">
        <form id='myform' method='POST' action='#'>
            <input type='button' value='+' class='qtyplus' field='quantity' />
            <input type='text' name='quantity' value='0' class='qty' />
            <input type='button' value='-' class='qtyminus' field='quantity' />
        </form>
        </div>

          <h4 class="deleat_from_chart">Delete from Cart</h4>
          </div>
      </div>
      </div>

    </div><!--end colm-->

  </div><!--end row-->


<div class="row chackout_penal_bottom">
    <div class="col-md-12 col-sm-12">
        <div class="row align_right">
          <div class="col-md-8 col-sm-7 padd_no_web">
              <div class="continue_button"><a href="">Continue Shopping</a></div>
              <div class="chat_and_chack_responsive">
            <div class="chat"><a href="">Chat Now</a></div>
          </div>
          </div><!--end colm-->
          <div class="col-md-4 col-sm-5 padd_no_web">
          <div class="parice_check">Subtotal</div>
          <div class="parice_check_total">$2,785.00</div>
          <div class="parice_check_total_responsive">$2,785.00</div>
          <p class="shipin_para">Shipping & taxes calculated upon checkout</p>

          <div class="chat_and_chack">
            <div class="chat"><a href="">Chat</a></div>
            <div class="chackout_box_buton"><a href="">Checkout</a></div>
          </div>
          <div class="total_price"><span>Total</span>$2,785.00</div>
          <div class="chackout_box_buton_responsive"><a href="">Checkout</a></div>
          <div class="continue_button_responsive"><a href="">Continue Shopping</a></div>
          
        </div>

      </div>
    </div>
 </div>
 

<div class="row chackoutpage_bg_space"></div>
<div class="row chackout_penal">
  <div class="col-md-12 col-sm-12">
    <div class="chackout_penal_heading">
        <h4>RECOMENDATIONS</h4>
      </div><!--end sign-->
  </div>
  
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="row recomnd">
        <div class="col-md-4 col-sm-4 textcenter">
          <a href=""><img src="<?php echo base_url('public/assets/images/chack_out_img.png'); ?>" alt=""/></a>
        </div>
        <div class="col-md-8 col-sm-8">
          <h4>Premium Treadmill Warranty - 10 Years</h4>
          <div class="parice_check">$2,785.00</div>
          <div class="addtocart_buton"><a href="">Add to Cart</a></div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="row recomnd">
        <div class="col-md-4 col-sm-4 textcenter">
          <a href=""><img src="<?php echo base_url('public/assets/images/chack_out_img.png'); ?>" alt=""/></a>
        </div>
        <div class="col-md-8 col-sm-8">
          <h4>Premium Treadmill Warranty - 10 Years</h4>
          <div class="parice_check">$2,785.00</div>
          <div class="addtocart_buton"><a href="">Add to Cart</a></div>
        </div>
      </div>
    </div>

  




    
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="row recomnd">
        <div class="col-md-4 col-sm-4 textcenter">
          <a href=""><img src="<?php echo base_url('public/assets/images/chack_out_img.png'); ?>" alt=""/></a>
        </div>
        <div class="col-md-8 col-sm-8">
          <h4>Premium Treadmill Warranty - 10 Years</h4>
          <div class="parice_check">$2,785.00</div>
          <div class="addtocart_buton"><a href="">Add to Cart</a></div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="row recomnd">
        <div class="col-md-4 col-sm-4 textcenter">
          <a href=""><img src="<?php echo base_url('public/assets/images/chack_out_img.png'); ?>" alt=""/></a>
        </div>
        <div class="col-md-8 col-sm-8">
          <h4>Premium Treadmill Warranty - 10 Years</h4>
          <div class="parice_check">$2,785.00</div>
          <div class="addtocart_buton"><a href="">Add to Cart</a></div>
        </div>
      </div>
    </div>
    
  
</div>

  </div><!--end of container-->
</section>