<section>
<div class="container-fluid">
  <div class="row PADD_ThREee">
    <div class="col-md-12 col-sm-12">
     <div class="chackout_penal_heading">
      <h4>EQUIPMENT IN YOUR CART</h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->
 <form class="PADD_ThREee" action="" method="post">
  <?php
      $rk = 1;
      $rs = 1;
      $rss = 10;
      if($_SESSION['productDetail']['count']>0){
        $totalPrice=0;
        $products = $_SESSION['productDetail']['myextracart'];

      if($_SESSION['productDetail']['counting']>0){
        if(isset($products) && !empty($products)){
         foreach($products as $live){


          if(trim($live->Price,'$')==""){
            $live->Price = 0;
          }
            $totalPrice += preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
            //$link  = str_replace(" ", "-",$live->ProductName);
            $link  = str_replace("-", "*",$live->Name);
            $link  = str_replace(" ", "-",$link);

            //$link  = rawurlencode($live->ProductName) ;
          ?>
             <div class="row chackout_penal">
                <div class="col-md-3 col-sm-3 col-xs-4">
                  <div class="img-responsive cart_product_img "><img  src="<?php
                if($live->IsWarranty ==1){
                 echo base_url('/public/assets/images/warranty_img_bottom.png');}else{
                   echo base_url().'/'.$live->Expr1;
                 }
                  ?>"  alt="<?php echo $live->Name; ?>" class='img-responsive'/></div>
                </div><!--end colm-->

                <div class="col-md-9 col-sm-9 col-xs-8">
                  <div class="row chack_out_product_content">
                    <div class="col-md-6 col-sm-6 padd_no_web"><h4>
                    <?php if($live->KingdomContingent=="Cardio"){ ?>
                        <a rel ="nofollow"  href="<?php echo base_url('/cardio').'/'.$link; ?>"><?php echo $live->Name; ?></a>
                        <?php
                      }
                      else
                      {
                        ?>
                        <a rel ="nofollow"  href="<?php echo base_url('/strength').'/'.$link; ?>"><?php echo $live->Name; ?></a>
                        <?php
                      }
                    ?>

                    </h4></div>
                    <div class="col-md-6 col-sm-6 padd_no_web">
                    <div class="parice_check" ><?php echo $live->Price;

                    // preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
                     ?>
                      <input type="hidden" id="quantity<?php echo $rss; ?>" value="<?php echo preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); ?>"></div>
                    <div class="chack_increment_decrement">

                        <input type='button' value='+' class='qtyplus' field='quantity<?php echo $rss; ?>' />
                        <input type='text' readOnly name='quantities[]' altname="quantity<?php echo $rss; ?>" value='1' class='qty' />
                        <input type='button' value='-' class='qtyminus' field='quantity<?php echo $rss; ?>' />

                    </div>
                    <div class="parice_check_total">$ <span class="quantity<?php echo $rss; ?>"><?php
                    // echo   $live->Price;
                    // echo "$". number_format($live->Price,2,".",",");
                     echo preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
                     ?></span></div>
                    </div>

                  </div>

                  <div class="row chack_out_product_content_bottom">
                   <!--  <div class="col-md-6 col-sm-6 padd_no_web">
                      <h5>Available to Ship: <?php echo $live->LeadTime;?></h5>
                      <p>MPN : <?php echo $live->MPN; ?></p>
                  </div> -->
                  <div class="col-md-12 col-sm-12 padd_no_web">
                    <div class="line_res">
<!--                     <div class="chack_increment_decrement_responsive">

                        <input type='button' value='+' class='qtyplus' field='quantity<?php// echo $rss; ?>' />
                        <input type='text' readOnly name='ddd' altname="quantity<?php //echo $rss; ?>" value='1' class='qty' />
                        <input type='button' value='-' class='qtyminus' field='quantity<?php// echo $rss; ?>' />

                    </div> -->

                      <h4 class="deleat_from_chart"><a rel ="nofollow"  href="<?php echo base_url('/site/deleting'); ?>/<?php echo ($rs-1); ?>">Delete From Cart</a></h4>
                       <!-- <div class="chackout_box_buton_responsive"><a href="">Checkout</a></div>   -->
                      </div>
                  </div>
                 </div>
                </div>
              </div>
              <?php
              $rss++;
            $rs++;
           }
          }
        }

        for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
        $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
        foreach($product as $live){

          if(trim($live->Price,'$')==""){
            $live->Price = 0;
          }
            $totalPrice += preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
            //$link  = str_replace(" ", "-",$live->ProductName);
            $link  = str_replace("-", "*",$live->ProductName);
            $link  = str_replace(" ", "-",$link);

            //$link  = rawurlencode($live->ProductName) ;
          ?>
             <div class="row chackout_penal">
                <div class="col-md-3 col-sm-3 col-xs-4">
                  <div class="img-responsive cart_product_img "><img src="<?php echo base_url().'/'.$live->ImageURL; ?>" alt="<?php echo $live->ProductName; ?>" title="<?php echo $live->MetaDetailPageTitleTag; ?>" class='img-responsive'/></div>
                </div><!--end colm-->

                <div class="col-md-9 col-sm-9 col-xs-8">
                  <div class="row chack_out_product_content">
                    <div class="col-md-6 col-sm-6 padd_no_web"><h4>
                    <?php if($live->Kingdom=="Cardio"){ ?>
                        <a rel ="nofollow" href="<?php echo base_url('/cardio').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
                        <?php
                      }
                      else
                      {
                        ?>
                        <a  rel ="nofollow"  href="<?php echo base_url('/strength').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
                        <?php
                      }
                    ?>

                    </h4></div>
                    <div class="col-md-6 col-sm-6 padd_no_web">
                    <div class="parice_check" ><?php echo $live->Price;

                    // preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
                     ?>
                      <input type="hidden" id="quantity<?php echo $rk; ?>" value="<?php echo preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); ?>"></div>
                    <div class="chack_increment_decrement">

                        <input type='button' value='+' class='qtyplus' field='quantity<?php echo $rk; ?>' />
                        <input type='text' readOnly name='quantity[]' altname="quantity<?php echo $rk; ?>" value='1' class='qty' />
                        <input type='button' value='-' class='qtyminus' field='quantity<?php echo $rk; ?>' />

                    </div>
                    <div class="parice_check_total">$ <span class="quantity<?php echo $rk; ?>"><?php
                    // echo   $live->Price;
                    // echo "$". number_format($live->Price,2,".",",");
                     echo preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
                     ?></span></div>
                    </div>

                  </div>

                  <div class="row chack_out_product_content_bottom">
                    <div class="col-md-6 col-sm-6 padd_no_web">
                      <h5>Available to Ship: <?php echo $live->LeadTime;?></h5>
                      <p>MPN : <?php echo $live->MPN; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 padd_no_web">
                    <div class="line_res">
<!--                     <div class="chack_increment_decrement_responsive">

                        <input type='button' value='+' class='qtyplus' field='quantity<?php// echo $rk; ?>' />
                        <input type='text' readOnly name='ddd' altname="quantity<?php //echo $rk; ?>" value='1' class='qty' />
                        <input type='button' value='-' class='qtyminus' field='quantity<?php// echo $rk; ?>' />

                    </div> -->

                      <h4 class="deleat_from_chart"><a rel ="nofollow"  href="<?php echo base_url('/site/delete'); ?>/<?php echo $_SESSION['productDetail']['addtocart'][$i]; ?>">Delete From Cart</a></h4>
                       <!-- <div class="chackout_box_buton_responsive"><a href="">Checkout</a></div>   -->
                      </div>
                  </div>
                 </div>
                </div>
              </div>
              <?php
            $rk++;
          }
        }

    }
    else{
       ?>
          <div class="row  chackout_penal">
            <div class="col-md-7 col-sm-7 col-xs-8">
              <h3 style='color:red;'>No Item In Cart.</h3>
            </div><!--end colm-->
          </div>
       <?php
    }
 ?>



<div class="row ">
    <div class="col-md-12 col-sm-12 chackout_penal_bottom1">
        <div class="row align_right">
        <?php
          if($_SESSION['productDetail']['count']>0){
        ?>
          <div class="col-md-8 col-sm-7 padd_no_web">
              <div class="continue_button"><a rel ="nofollow"  href="<?php echo base_url('/cardio'); ?>">Continue Shopping</a></div>
              <div class="chat_and_chack_responsive">
            <div class="chat"><a rel ="nofollow"  href="">Chat Now</a></div>
          </div>
          </div>
          <div class="col-md-4 col-sm-5 padd_no_web">
          <?php
          if($live->ishanding == 1){
            $Handlingfees = 4;

            ?> <input type ="hidden" id ="yes" value ="1"></input>
           <div class="parice_check">Handling Fees</div><div class="parice_check_total">$ <span id='Handling'><?php
          echo $Handlingfees;
          // echo "$". number_format($totalPrice,2,".",",");
          ?></span></div>
              <div class="parice_check">Subtotal</div><input type="hidden" id="orgsubtotal" value="<?php $totalPrice; ?>">
          <div class="parice_check_total">$ <span id="subtotal"><?php
          echo $totalPrice = $totalPrice + $Handlingfees;
          $_SESSION['Handlingfees'] = 4;
          // print_r($_SESSION['totalPrice']);die();
          // echo "$". number_format($totalPrice,2,".",",");
          ?></span></div>
          <?php   } else{ ?>
          <div class="parice_check">Subtotal</div><input type="hidden" id="orgsubtotal" value="<?php $totalPrice; ?>">
          <div class="parice_check_total">$ <span id="subtotal"><?php
          echo $totalPrice;
          // echo "$". number_format($totalPrice,2,".",",");
          ?></span></div>
          <?php } ?>
          <!-- <div class="parice_check_total_responsive">$<?php echo $totalPrice; ?></div> -->
          <p class="shipin_para">Shipping & Taxes Calculated Upon Checkout</p>

          <div class="chat_and_chack">
            <div class="chat"><a rel ="nofollow"  href="">Chat</a></div>
            <div class="chackout_box_buton">
              <?php  /* if($this->session->userdata('userId')!=""){
                ?>
                 <a href="<?php echo base_url('/site/step2'); ?>">Checkout</a>
                <?php
                    }
                    else{ ?>
                      <a href="<?php echo base_url('/site/step1'); ?>">Checkout</a>
                <?php } */ ?>
                <input type="hidden" name="cartcheckout" value="">
                <input type="submit" class="btn btn-default" value="Checkout" >
            </div>
          </div>
          <!-- <div class="total_price"><span>Total</span>$<?php echo $totalPrice; ?></div> -->

          <div class="continue_button_responsive"><a rel ="nofollow" href="<?php echo base_url('/cardio'); ?>">Continue Shopping</a></div>

        </div>
        <?php
          }
          else
          {
            ?>
               <div class="col-md-8 col-sm-7 padd_no_web">
                <div class="continue_button"><a rel ="nofollow" href="<?php echo base_url('/cardio'); ?>">Continue Shopping</a></div>
               </div>
            <?php
          }
          ?>
      </div>
    </div>
 </div>

    </form>


        <div class="row PADD_ThREee">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chackoutpage_bg_space">
            </div>
        </div>


<div class="row PADD_ThREee">
  <div class="col-md-12 col-sm-12 chackout_penal">
    <div class="chackout_penal_heading">
        <h4>RECOMMENDATIONS</h4>
      </div><!--end sign-->
  </div>
  <?php
  $checkkk = 1;

  $s=0;
$t=10;
      foreach($l_product as $products){

            //$link2  = str_replace(" ", "-",$products->ProductName);
          $link2  = str_replace("-", "*",$products->ProductName);
          $link2  = str_replace(" ", "-",$link);
          //$link2  = rawurlencode($products->ProductName) ;
        $heckcount = 0;
          // if(isset($_SESSION['productDetail']['addtocart'])){
          //   if(in_array($products->ListID,$_SESSION['productDetail']['addtocart'])){
          //     $heckcount = 1;
          //   }
          // }

        ?>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="row recomnd">
              <div class="col-md-4 col-sm-4 textcenter">
              <a  rel ="nofollow"  data-toggle="modal" <?php
                if($products->IsWarranty ==1){
                  echo "data-target='#myModal_Warrenty".$t."'";
                }else{
                  echo "data-target='#myModal_UpsellProduct".$s."'";
                }

                ?>  href=""> <img class='img-responsive immmdm' src="<?php
                if($products->IsWarranty ==1){
                 echo base_url('/public/assets/images/warranty_img_bottom.png');}else{
                   echo base_url().'/'.$products->Expr1;
                 }
                  ?>" alt=""/></a>
              </div>
              <div class="col-md-8 col-sm-8">
                <h4><a rel ="nofollow"  data-toggle="modal"
                <?php
                if($products->IsWarranty ==1){
                  echo "data-target='#myModal_Warrenty".$t."'";
                }else{
                  echo "data-target='#myModal_UpsellProduct".$s."'";
                }

                ?>
                   href=""><?php echo $products->Name ;  ?></a></h4>
                <div class="parice_check"><?php
                 if($products->Price != NULL){

                               echo "$ ".$products->Price;
                 } else{
                  echo "Price Not Available";
                 }
                 // preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price) ;  ?></div>
                <div class="addtocart_buton">
                  <?php
                  // if($heckcount==0){
                    ?>
                  <!-- if(trim($detail[0]->Price,'$') === 'Please Enquire' ){ ?> -->
                  <?php

                  //    if(trim($live->Price,'$') === 'Please Enquire' ){ ?>
                   <!-- <a class="btn drop_ad" href='#' id='email_to' name='email_to'> Email me </a>  -->
                  <?php// }else{ ?>
                  <!--    <a href="<?php // echo base_url('/site/addcart').'/'.$products->ListID ; ?>">Add to Cart</a> -->
                   <?php// } }
                  // else{
                  //   echo "Already Add In Cart";
                  // }
                ?>
                </div>
              </div>
            </div>
          </div>
            <?php
          // $checkkk++;
       $s++;$t++;
      }
   ?>
  </div>
 </div>
</section>
<script type="text/javascript">
  jQuery(document).ready(function(){
     // Increment Code
     $('.qtyplus').click(function(e){
      var fees = 4;
      var yes = $('#yes').val();

        e.preventDefault();
        fieldName = $(this).attr('field');
        var currentVal = parseInt($('input[altname='+fieldName+']').val());
        $newtext = $("#"+fieldName).val();
        if (!isNaN(currentVal)) {
          $('input[altname='+fieldName+']').val(currentVal + 1);
           if(yes ==1){
            var hello = fees*(currentVal+1);
            $("#Handling").text(hello);
            $("."+fieldName).text($newtext*$('input[altname='+fieldName+']').val());
            $("#subtotal").text(parseFloat($("#subtotal").text())+parseFloat($newtext)+fees);
          }else{
            var hello = fees*(currentVal+1);

            $("."+fieldName).text($newtext*$('input[altname='+fieldName+']').val());
            $("#subtotal").text(parseFloat($("#subtotal").text())+parseFloat($newtext));

          }
        }else{
            $('input[altname='+fieldName+']').val(1);
            $("."+fieldName).text($newtext);
        }
    });
     // Decrement Code
    $(".qtyminus").click(function(e) {
        e.preventDefault();
         var fees = 4;
         var yes = $('#yes').val();
        fieldName = $(this).attr('field');
        var currentVal = parseInt($('input[altname='+fieldName+']').val());
      $newtext = $("#"+fieldName).val();
        if(!isNaN(currentVal) && currentVal > 1) {
            $('input[altname='+fieldName+']').val(currentVal - 1);
            if(yes == 1){
                     $("."+fieldName).text($newtext*$('input[altname='+fieldName+']').val());
               var hello = fees*(currentVal-1);
             $("#subtotal").text(parseFloat($("#subtotal").text())-parseFloat($newtext)-fees);
            $("#Handling").text(hello);
          }else{
             $("."+fieldName).text($newtext*$('input[altname='+fieldName+']').val());
             $("#subtotal").text(parseFloat($("#subtotal").text())-parseFloat($newtext));


          }
        } else {
            $('input[altname='+fieldName+']').val(1);
            $("."+fieldName).text($newtext);
        }
    });
});
</script>
<?php
$s=0;
$t=10;
$my = 0;
      foreach($l_product as $products){
        // echo "<pre>";print_r($products);
           if($products->IsWarranty ==1){


        ?>
<div class="modal fade myModal_Warrenty" id="myModal_Warrenty<?php echo $t; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_Warrenty" aria-hidden="true">
    <div class="modal-dialog myModal_Warrenty">
        <div class="modal-content">
            <div class="modal-header">
                <div class="paddingg">
                    <div class="Email_auttoo">
                        <h4 class="modal-title" id="myModalLabel" style="color:#545454 !important;"><?php echo $products->Name; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="row inner_product_discription ">
                                <div class="col-md-6 col-sm-6 img_penal_l all_center">
                                    <img src="<?php echo base_url() ?>/public/assets/images/warranty_img.png">
                                </div>

                                <div class="col-md-6 col-sm-6 all_center BOddr">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="price_box">
                                          <meta itemprop="priceCurrency" content="USD" />
                                          <?php if($products->Price!="Please Enquire"){ echo "$";}  $helo = trim($products->Price,'$');  ?>
                                          <span itemprop="price" content="<?php print_r(str_replace(",","",$helo)); ?>">
                                            <?php echo trim($products->Price,'$'); ?>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dropdown ">

                                             <a rel ="nofollow"  class="btn drop_ad " title="Click here to add this <?php echo $products->ProductName; ?> to your shopping cart" href="<?php echo base_url('/site/addingtocart').'/'.$products->ListID.'/'.$my ; ?>" id="addcart">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 all_center">
                                            <div class="PRICe_bottom_PEnal">
                                                <h5 style="color:#0066ff">Comprehensive Coverage</h5>
                                                <h5 style="color:#333333">Covers Labor, Parts and more...</h5>
                                            </div>
                                            <div class="product_penal_content">
                                                <p><?php echo $detail[0]->WarrantyBlurb; ?></p>
                                                <div class="product_penal__question">
                                                    <div class="question_heding">
                                                        <img src="<?php echo base_url('public/assets/images/renameq.jpg'); ?>">Have Questions?
                                                    </div>
                                                    <ul class="product_penal__question_boxX">
                                                        <li>
                                                            <span style="color:#f00">
                                                                <?php
                                                                if(isset($_SESSION['errorto']) && ($_SESSION['errorto']!=1)){
                                                                  echo $_SESSION['errorto'];
                                                                  unset($_SESSION['errorto']);
                                                                }
                                                                ?>
                                                            </span>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click to chat about this <?php echo $detail[0]->ProductName; ?>" data-target="" class="btn btn-link" href="#">Live Chat</a>
                                                            <br>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click here to contact Global Fitness about this <?php echo $detail[0]->ProductName; ?>" data-target="#emailUs" class="btn btn-link" href="#">Email Us</a>
                                                            <br>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click here to request a call and discuss this <?php echo $detail[0]->ProductName; ?>" data-target="#requestacall" class="btn btn-link" href="#">Click to Call</a>
                                                            <!-- <a class="btn btn-link" title="Read reviews on the <?php echo $detail[0]->ProductName; ?>" id="reviewlink_c" href="#top">Reviews</a> -->
                                                            <!-- <div class="question_heding" style="color: #007fff">More Options</div>
                                                            <a data-toggle="modal" title="Are you interested in renting this <?php echo $detail[0]->ProductName; ?>" data-target="#myModal_RentProduct" class="btn btn-link" href="">Rent this <?php echo $detail[0]->CategoryName; ?></a>
                                                            <a data-toggle="modal" title="Sell your <?php echo $detail[0]->ProductName; ?> to GlobalFitness here" data-target="#myModal_SellProduct" class="btn btn-link" href="">Sell your <?php echo $detail[0]->CategoryName; ?></a> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 style="color:#333333 !important;">Warranty Details</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h4 style="color:#555555 !important;">Overview</h4>
                                    <p><?php echo $products->Description; ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h4 style="color:#555555 !important;">Coverages</h4>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <h4 style="color:#007fff !important;">10 Year Premium Warranty</h4>
                                    <ul class="wranty_UL">
                                        <li>Frames: 10 years of coverage (paint exluded)</li>
                                        <li>Motors & Alternator: 1 year of coverage</li>
                                        <li>Electrical Parts: 1 year of coverage</li>
                                        <li>Mechanical Parts: 1 year of coverage </li>
                                        <li>Wear Items: 6 months of coverage</li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <h4 style="color:#007fff !important;">Lifetime Signature Warranty</h4>
                                    <ul class="wranty_UL">
                                        <li>Frames: Lifetime of coverage (paint exluded)</li>
                                        <li>Motors & Alternator: 2 years of coverage</li>
                                        <li>Electrical Parts: 2 years of coverage</li>
                                        <li>Mechanical Parts: 2 years of coverage </li>
                                        <li>Wear Items: 6 months of coverage</li>
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h4 style="color:#555555 !important;">Notes</h4>
                                    <ul class="wranty_UL">
                                        <li>Treadmill motor & MCB warranties include labor to match the parts warranty period.</li>
                                        <li>Global Fitness does not warrant the heart rate system performance on its products, as the heart rate system performance varies, based on a user's physiology, fitness level, age, method of use and other actors.</li>
                                        <li>Wear items are defined as and are not limited to treadmill deck, running belt, motor brushes, drive belts, seats, pedal covers and hand grips.</li>
                                        <li>LCD TV’s are warrantied for 6 Months Only.</li>
                                    </ul>
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
                <div class="Email_bottom_foter">
                    <h3 style="color:#333333 !important;">Exclusions</h3>
                    <div class="Email_bottom_foter_content">
                        <p>Running belt tracking and tension adjustments and other preventive maintenance procedures are the purchaser's
                            responsibility and are not covered by this warranty. This warranty does not apply to appearance items of the product, the
                            exterior of which has been damaged or defaced, which has been subject to abuse, misuse, accident, negligence, lack of
                            normal maintenance, abnormal service or handling as specified for this model, improper installation, or which has been
                            altered or modified in design or construction. Global Fitness is not liable for incidental or consequential damages of any kind
                            resulting from defect(s) in the product.</p>
                            <p>The limited warranty described above is in addition to whatever implied warranties may be granted purchaser by law. To the
                            extent permitted by applicable law, ALL IMPLIED WARRANTIES INCLUDING THE WARRANTIES OF MERCHANTABILITY
                            AND FITNESS FOR USE ARE LIMITED TO A PERIOD OF ONE YEAR FROM THE DATE OF PURCHASE.</p>
                            <p>Some states do not allow limitation on how long an implied warranty lasts. No one is authorized to change, modify or extend the terms of
                            this warranty on behalf of Global Fitness.</p>
                            <p>The warranties described above shall be the sole and exclusive remedy available to the purchaser. Correction of defects, in
                            the manner and for the period of time described above, shall constitute complete fulfillment of all liabilities and
                            responsibilities of Global Fitness to the purchaser with respect to the product, and shall constitute full satisfaction of all
                            claims, whether based on contract, negligence, strict liability or otherwise. In no event shall Global Fitness be liable or in any
                            other way responsible for damages or defects in the product which were caused by repairs or attempted repairs performed
                            by anyone other than a Global Fitness Technical Representative or Authorized service Contractor. Nor shall Global Fitness
                            be liable or in any way responsible for any incidental or consequential economic or property damage. Some states do not
                            allow the exclusion of incidental or consequential damage, so the above exclusion may not apply to you.</p>
                            <p>THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS. YOU MAY HAVE OTHER RIGHTS IN SOME U.S. states</p>
                    </div>
                    <!--<div class="row footer_bottom">
                        <div class="col-md-12 col-sm-12">
                            <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<?php }else{ ?>
  <div class="modal fade myModal_UpsellProduct" id="myModal_UpsellProduct<?php echo $s; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_Warrenty" aria-hidden="true">
    <div class="modal-dialog myModal_UpsellProduct">
        <div class="modal-content">
            <div class="modal-header">
                <div class="paddingg">
                    <div class="Email_auttoo">
                        <h4 class="modal-title" id="myModalLabel" style="color:#545454 !important;"><?php echo $products->Name ; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="row inner_product_discription ">
                                <div class="col-md-6 col-sm-6 img_penal_l all_center">
                                    <img src="<?php echo base_url() ?>/<?php echo $products->Expr1; ?>">
                                </div>

                                <div class="col-md-6 col-sm-6 all_center BOddr">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="price_box">
                                          <?php if($products->Price == NULL){
                                            echo "Price Not Available";
                                          }else{
                                            echo "$ ".$products->Price;
                                          }
                                          ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dropdown ">
                                          <?php  if($products->Price ==NULL){ ?>
                  <button class="btn btn-default Emailwala" data-toggle="modal" data-target="#myModal_email">
                                      Email me</button>
                  <?php }else{ ?>
                 <a rel ="nofollow"  class="btn drop_ad " title="Click here to add this <?php echo $products->ProductName; ?> to your shopping cart" href="<?php echo base_url('/site/addingtocart').'/'.$products->ListID.'/'.$my ; ?>" id="addcart">Add To Cart</a>
                   <?php }?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 all_center">
                                            <div class="PRICe_bottom_PEnal">
                                                <h5 style="color:#0066ff">Comprehensive Coverage</h5>
                                                <h5 style="color:#333333">Covers Labor, Parts and more...</h5>
                                            </div>
                                            <div class="product_penal_content">
                                                <p><?php echo $detail[0]->WarrantyBlurb; ?></p>
                                                <div class="product_penal__question">
                                                    <div class="question_heding">
                                                        <img src="<?php echo base_url('public/assets/images/renameq.jpg'); ?>">Have Questions?
                                                    </div>
                                                    <ul class="product_penal__question_boxX">
                                                        <li>
                                                            <span style="color:#f00">
                                                                <?php
                                                                if(isset($_SESSION['errorto']) && ($_SESSION['errorto']!=1)){
                                                                  echo $_SESSION['errorto'];
                                                                  unset($_SESSION['errorto']);
                                                                }
                                                                ?>
                                                            </span>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click to chat about this <?php echo $detail[0]->ProductName; ?>" data-target="" class="btn btn-link" href="#">Live Chat</a>
                                                            <br>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click here to contact Global Fitness about this <?php echo $detail[0]->ProductName; ?>" data-target="#emailUs" class="btn btn-link" href="#">Email Us</a>
                                                            <br>
                                                            <a rel ="nofollow"  data-toggle="modal" title="Click here to request a call and discuss this <?php echo $detail[0]->ProductName; ?>" data-target="#requestacall" class="btn btn-link" href="#">Click to Call</a>
                                                            <!-- <a class="btn btn-link" title="Read reviews on the <?php echo $detail[0]->ProductName; ?>" id="reviewlink_c" href="#top">Reviews</a> -->
                                                            <!-- <div class="question_heding" style="color: #007fff">More Options</div>
                                                            <a data-toggle="modal" title="Are you interested in renting this <?php echo $detail[0]->ProductName; ?>" data-target="#myModal_RentProduct" class="btn btn-link" href="">Rent this <?php echo $detail[0]->CategoryName; ?></a>
                                                            <a data-toggle="modal" title="Sell your <?php echo $detail[0]->ProductName; ?> to GlobalFitness here" data-target="#myModal_SellProduct" class="btn btn-link" href="">Sell your <?php echo $detail[0]->CategoryName; ?></a> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Email_bottom_foter">
                    <h3 style="color:#333333 !important;">Exclusions</h3>
                    <h4 style="color:#555555 !important;">Overview</h4>
                    <div class="Email_bottom_foter_content">
                        <p>
                        <!-- Protect your floor from sweat and machine scuff marks with our premium recycled rubber floor mat. Whether you have hardwood floors, carpet, stone or vinyl, floors can take a beating when human sweat and mechanical abrasion take action on your floor. Make a smart investment with our premium floor protection mat. Our mats are easy to clean. Use a non-solvent, green cleaning agent or warm water and soap to clean you mat. A whole lot cheaper and easier than cleaning your floor covering, not matter what it is. Most consumers don’t know that commercial gym equipment can be nosier than its counterpart, home gym equipment. The setting they usually reside tends to cover that up since gyms usually have music playing and people talking but when in your home you need to consider that noise and vibration your machine will emit. Our mats help reduce both noise and vibrations. Our premium cardiovascular mats have anti-static properties which normal surfaces do not have. Static can interfere with the accuracy of the machines electronic reading and heart rate reading. It will also prevent the discharge shock you can emit from a static charge. Our floor mats are 100% recycled rubber and have reduced vapor emissions. You can feel good about taking disposed rubber out of our landfills and making use of them in your home. When you’re done, just recycle them again. -->
                        <?php echo $products->Description; ?>

                        </p>
                    </div>
                    <!--<div class="row footer_bottom">
                        <div class="col-md-12 col-sm-12">
                            <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
            <?php    }
            $s++;
            $t++;
            $my++;
          }
             ?>
