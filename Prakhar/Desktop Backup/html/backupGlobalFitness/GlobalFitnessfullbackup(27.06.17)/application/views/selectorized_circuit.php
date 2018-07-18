<div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div itemscope itemtype="http://schema.org/Product">
        <div class="container-fluid">
            <div class=" accordin_penal_b PADD_ThREee">
                <div class="accordion cust_acc padd-no">
                    <dl>
                        <div class="top_brder">
                            <div class="padd-no">
                                <dt class="respon all_center">
                                    <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger"> <span itemprop="brand" style="display: none"><?php echo $detail[0]->BrandName; ?></span><span itemprop="name"><?php echo $detail[0]->ProductName ; ?> </span>
                                        <div class="arrw BFDBFDBD"><span class="bar top"></span><span class="bar bottom"></span></div>
                                    </a>
                                </dt>
                                <dd class="accordion-content accordionItem is-collapsed" id="#accordion1" aria-hidden="true">
                                    <div class="row inner_product_container">
                                        <div class="col-md-12 col-sm-12 padd-no">
                                            <!-- <p><?php echo $detail[0]->ProductName ; ?></p> -->
                                            <div class="product">
                                                <p>
                                                    <span itemprop="description"><?php echo $detail[0]->ProductDescription; ?></span>
                                                    <span itemprop="mpn" style="display: none"><?php  echo $detail[0]->MPN; ?> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <span itemprop="ratingValue" style="display:none"><?php echo $star_rate; ?></span>
            <span itemprop="reviewCount" style="display:none"><?php echo $star_count; ?></span>
        </span>
        <div class="container-fluid">
            <div class="top_brder PADD_ThREee">
                <div class="container-fluid1">
                    <div class="row inner_product_discription CUSTOM_reviEWS">
                        <div class="col-md-6 col-sm-6 img_penal_l all_center right_BORder">
                            <a href="">
                                <img itemprop="image" src="<?php echo base_url().$detail[0]->ImageURL; ?>" alt=" Image of a <?php echo $detail[0]->ProductName; ?>" title="<?php echo $detail[0]->ProductName; ?>">
                            </a>
                        </div>
                        <span itemprop="offers" itemscope itemtype="http://schema.org/Offer"></span>
                        <div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-0 all_center">
                            <div class="col-md-6 col-sm-6 no_padd">
                                <div class="price_box">
                                  <meta itemprop="priceCurrency" content="USD" />
                                  <?php if($detail[0]->Price!="Please Enquire"){ echo "$";}  $helo = trim($detail[0]->Price,'$');  ?>
                                  <span itemprop="price" content="<?php print_r(str_replace(",","",$helo)); ?>">
                                    <?php echo trim($detail[0]->Price,'$'); ?>
                                  </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 no_padd">
                                <div class="dropdown ">
                                    <?php                  
                                      $heckcount = 0;
                                      if(isset($_SESSION['productDetail']['addtocart'])){
                                        if(in_array($detail[0]->ListID,$_SESSION['productDetail']['addtocart'])){
                                          $heckcount = 1;
                                        }
                                      }
                                      else{
                                         $heckcount= 0;
                                      }
                                      if($heckcount==0){
                            if(trim($detail[0]->Price,'$') === 'Please Enquire' ){ ?>
                                        <button class="btn btn-default Emailwala" data-toggle="modal" data-target="#myModal_email">
                                            Email me</button>
                                        <?php }else{ 
                                                              if($detail[0]->QuantityOnHand<=0){
                                                              ?>
                                        <button class="btn btn-default Emailwala" id="waitlistMe" data-toggle="modal" data-target="#waitlistMeModal">
                                            Waitlist Me</button>
                                        <?php }else{
                                                            ?>
                                        <a rel="nofollow" class="btn drop_ad " title="Click here to add this <?php echo $detail[0]->ProductName; ?> to your shopping cart" href="<?php echo base_url('/site/addcart').'/'.$detail[0]->ListID ; ?>" id="addcart">Add To Cart</a>
                                        <?php } }  } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 all_center">
                                    <div class="product_penal_content">
                                        <div class="product_penal_shiping all_center BORDER_NON">
                                            <div class="product_penal_shiping_left all_center">Condition:
                                                <link itemprop="itemCondition" href="http://schema.org/UsedCondition" />
                                            </div>
                                            <div class="product_penal_shiping_right all_center" style="color:#0066ff;">
                                                <?php echo $detail[0]->Condition; ?>
                                            </div>
                                        </div>
                                        <p>Warranty contingent on condition ordered</p>
                                        <div class="product_penal_shiping all_center">
                                            <!-- <div class="product_penal_shiping_left all_center">Condition:
                                                <link itemprop="itemCondition" href="http://schema.org/UsedCondition" />
                                            </div>
                                            <div class="product_penal_shiping_right all_center">
                                                <?php echo $detail[0]->Condition; ?>
                                            </div> -->
                                            <div class="product_penal_shiping_left all_center">Availability:</div>
                                            <div class="product_penal_shiping_right all_center">
                                                <link itemprop="availability" href="http://schema.org/InStock" />
                                                <?php 
                                                                  if($detail[0]->QuantityOnHand<=0){
                                                                    ?><span class="outstock">Out of Stock</span>
                                                <?php
                                                                  }
                                                                  else if(($detail[0]->QuantityOnHand>0) && ($detail[0]->QuantityOnHand<3)){
                                                                    echo "< 3";
                                                                  }else{
                                                                    ?>
                                                    <span class="inerstock">In Stock</span></span>
                                                    <?php 
                                                                } ?>
                                            </div>
                                            <div class="product_penal_shiping_left all_center">Lead Time:</div>
                                            <div class="product_penal_shiping_right all_center"><span> <?php echo $detail[0]->LeadTime; ?></span></div>
                                        </div>
                                        <div class="Upholstery_penal_color">
                                            <div class="Upholstery_penal_left">
                                                <h4>Upholstery:</h4>
                                            </div>
                                            <div class="Upholstery_penal_Right">
                                                <ul>
                                                    <li><input class="COLOR_change Red_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change White_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Blue_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Black_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Gray_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="Upholstery_penal_color">
                                            <div class="Upholstery_penal_left">
                                                <h4>Frame Color:</h4>
                                            </div>
                                            <div class="Upholstery_penal_Right">
                                                <ul>
                                                    <li><input class="COLOR_change Red_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change White_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Blue_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Black_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                    <li><input class="COLOR_change Gray_Colr" type='text' name='colorchnage' value='' disabled></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_penal__question">
                                            <div class="question_heding"><img alt="name" src="<?php echo base_url('public/assets/images/renameq.jpg'); ?>">Have Questions?</div>
                                            <ul>
                                                <!-- <li><a href="">Live Chat</a></li> -->
                                                <li>
                                                    <span style="color:#f00">
                                                                        <?php 
                                                                        if(isset($_SESSION['errorto']) && ($_SESSION['errorto']!=1)){
                                                                          echo $_SESSION['errorto'];
                                                                          unset($_SESSION['errorto']);
                                                                        }
                                                                        ?>
                                                                      </span>
                                                    <a data-toggle="modal" title="Click to chat about this <?php echo $detail[0]->ProductName; ?>" data-target="" class="btn btn-link" href="#">Live Chat</a>
                                                    <br>
                                                    <a data-toggle="modal" title="Click here to contact Global Fitness about this <?php echo $detail[0]->ProductName; ?>" data-target="#emailUs" class="btn btn-link" href="#">Email Us</a>
                                                    <br>
                                                    <a data-toggle="modal" title="Click here to request a call and discuss this <?php echo $detail[0]->ProductName; ?>" data-target="#requestacall" class="btn btn-link" href="#">Request To Call</a>
                                                    <br>
                                                    <a class="btn btn-link" title="Read reviews on the <?php echo $detail[0]->ProductName; ?>" id="reviewlink_c" href="#top">Reviews</a>
                                                    <br>
                                                    <br>
                                                    <div class="question_heding" style="color: #007fff">More Options</div>
                                                    <a data-toggle="modal" title="Are you interested in renting this <?php echo $detail[0]->ProductName; ?>" data-target="#myModal_RentProduct" class="btn btn-link" href="">Rent this <?php echo $detail[0]->CategoryName; ?></a>
                                                    <a data-toggle="modal" title="Sell your <?php echo $detail[0]->ProductName; ?> to GlobalFitness here" data-target="#myModal_SellProduct" class="btn btn-link" href="">Sell your <?php echo $detail[0]->CategoryName; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false">
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr_line"></div>
                        <h2 class="foter_heding_acordin">Product Details<font>: <?php echo $detail[0]->ProductName ; ?></font></h2>
                        <div class="row1">
                            <div class="col-md-8 col-sm-8">
                                <h3>General Specifications </h3>
                                <ul class="product_inner">
                                    <li>
                                       Manufacturer Part Number: <?php echo $detail[0]->MPN ;  ?>
                                    </li>
                                    <li>
                                      Brand Name: <?php echo $detail[0]->BrandName ;  ?>
                                    </li>
                                    <li>
                                      <?php echo $detail[0]->VersionName ; echo " ".$detail[0]->PieceCategory;  ?>
                                    </li>
                                    <li>
                                      <?php echo $detail[0]->TrainingZone ;  ?>
                                    </li>
                                     
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h3>What Do You Recieve?</h3>
                                <ul class="product_inner">
                                    <li>
                                        <?php echo $detail[0]->ProductName ; ?>
                                    </li>
                                    <li>Warranty Registration Card</li>
                                    <li>AC power cord</li>
                                </ul>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3>Technical Specifications</h3>
                                <ul class="product_inner">
                                    <li>
                                        <?php echo $detail[0]->Dimensions; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Weight; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->WeightStackCapacity; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature1; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature2; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature3; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature4; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature5; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature6; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature7; ?>
                                    </li>
                                    <li>
                                        <?php echo $detail[0]->Feature8; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h3>Warranty Details : <?php echo $detail[0]->Warranty ; ?></h3>
                                <ul class="product_inner">                                    
                                    <li>
                                        <?php echo $detail[0]->WarrantyBlurb2; ?>
                                    </li><li>
                                        <?php echo $detail[0]->WarrantyBlurb3; ?>
                                    </li>
                                    <li>
                                       Extended Warranties available upon checkout.
                                    </li>

                                </ul>

                                <div class="COntenTTE">
                                    <h3>Warranty Details for the : <?php echo $detail[0]->ProductName ; ?></h3>
                                    <ul class="product_inner">                                    
                                        <li>
                                            <?php echo $detail[0]->ProductDescription; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row PADD_ThREee">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4 class="HEading_Tittle"><font><?php echo $detail[0]->ProductName ; ?></font></h4>
                </div>
            </div>
            <div class="row PADD_ThREee">
                <?php   

  if(count($MPN)>0){
                foreach($MPN as $products) {
                     $link  = str_replace(" ", "-",$products->ProductName);
                     $link  = strtolower($link);
                    ?>
                <div class="col-md-4 col-sm-4 col-xs-6 none_magrgen">
                    <div class="img_block">
                       <?php if($ptype=="0"){ 
            ?>   
             <div class="pp_img"><i><a href="<?php echo base_url('/cardio').'/'.$link; ?>">
              <img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>" 
               src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i></div>
            <?php
          }
          else{
            ?>
             <div class="pp_img"><i><a href="<?php echo base_url('/strength').'/'.$link; ?>"><img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>"  src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i></div>
            <?php
          }
      ?>                       <div class="img_content">
       <h5><?php echo $products->ProductName; ?></h5>
        <p><?php if($products->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($products->Price,"$"); ?><p> 
                            <p>
                            </p>
                             <?php 
         $id=$products->ListID;
         $rate =  $this->Site_model->getrating($id);
        // print_r($rates); die;
            $add='';
          foreach ($rate as $rates) 
          {
              $add += $rates->star_rate;
          }
              $divide=count($rate);
              if($divide <1){
                $divide =1;
              }
              else{
                              $avg_rate=$add/$divide;            
              }
      ?>
                            <div class="col-md-9 col-sm-9 padd-no">
                               <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" 
        value='<?php echo $avg_rate; ?>' data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
                            </div>
                            <p>Available to ship:
                              
              <?php 
              if($products->QuantityOnHand<=0){
                      ?><span class="outstock">Out of Stock</span><?php
                    }
                    else if(($products->QuantityOnHand>0) && ($products->QuantityOnHand<3)){
                      echo "< 3";
                    }else{
                      ?>
                      <span class="inerstock">In Stock</span>
                    <?php 
                    } ?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php 
                } 
            }
                else{
                     echo  "<h4 style='color:red'>No Result Found.</h4>";
                    }
                    ?>
            </div>
        </div>
    </div>
 </div>
</div>